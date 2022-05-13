<?php
//snippet from my functions.php
function update_participants($comp_id)
{
    $db = getDB();
    $stmt = $db->prepare("UPDATE Shootup_Comps set current_participants = (SELECT IFNULL(COUNT(1),0) FROM Shootup_UserComps WHERE competition_id = :cid), 
    current_reward = IF(join_cost > 0, current_reward + CEILING(join_cost * 0.5), current_reward) WHERE id = :cid");
    try {
        $stmt->execute([":cid" => $comp_id]);
        return true;
    } catch (PDOException $e) {
        error_log("Update competition participant error: " . var_export($e, true));
    }
    return false;
}

function competition_is_alive($comp_id)
{
    $db = getDB();

    $stmt = $db->prepare("SELECT id FROM Shootup_Comps where expires > CURRENT_TIMESTAMP() AND id = :cid");

    try {
        $stmt->execute([":cid" => $comp_id]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($r)
        {
            return true;
        }
        else{
            
            return false;
        }

    } catch (PDOException $e) {
        error_log("Competition search error: " . var_export($e, true));
    }
    return false;

}



function already_paid($comp_id)
{
    $db = getDB();

    $stmt = $db->prepare("SELECT id FROM Shootup_Comps where did_payout = 1 AND id = :cid");

    try {
        $stmt->execute([":cid" => $comp_id]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($r)
        {
            return true;
        }
        else{
            
            return false;
        }

    } catch (PDOException $e) {
        error_log("Competition search error: " . var_export($e, true));
    }
    return false;

}

function add_to_competition($comp_id, $user_id)
{
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO Shootup_UserComps (user_id, competition_id) VALUES (:uid, :cid)");
    try {
        $stmt->execute([":uid" => $user_id, ":cid" => $comp_id]);
        update_participants($comp_id);
        return true;
    } catch (PDOException $e) {
        error_log("Join Competition error: " . var_export($e, true));
    }
    return false;
}


//fix
function edit_to_competition($comp_id, $user_id)
{
    $db = getDB();
    $stmt = $db->prepare("UPDATE Shootup_UserComps (user_id, competition_id) VALUES (:uid, :cid)");
    try {
        $stmt->execute([":uid" => $user_id, ":cid" => $comp_id]);
        update_participants($comp_id);
        return true;
    } catch (PDOException $e) {
        error_log("Join Competition error: " . var_export($e, true));
    }
    return false;
}

function join_competition($comp_id, $user_id, $cost)
{
    $balance = get_account_balance();
    if ($comp_id > 0) {
        if ($balance >= $cost) {
            $db = getDB();
            $stmt = $db->prepare("SELECT title, join_cost from Shootup_Comps where id = :id");
            try {
                $stmt->execute([":id" => $comp_id]);
                $r = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($r) {
                    $cost = (int)se($r, "join_cost", 0, false);
                    $name = se($r, "title", "", false);
                    if ($balance >= $cost) {
                        if (give_gems($cost, "join-comp", get_user_account_id(), -1, "Joining competition $name")) {
                            if (add_to_competition($comp_id, $user_id)) {
                                flash("Successfully joined $name", "success");
                            }
                        } else {
                            flash("Failed to pay for competition", "danger");
                        }
                    } else {
                        flash("You can't afford to join this competition", "warning");
                    }
                }
            } catch (PDOException $e) {
                error_log("Comp lookup error " . var_export($e, true));
                flash("There was an error looking up the competition", "danger");
            }
        } else {
            flash("You can't afford to join this competition", "warning");
        }
    } else {
        flash("Invalid competition, please try again", "danger");
    }
}


function get_top_scores_for_comp($comp_id, $limit = 10)
{
    $db = getDB();
    //below if a user can win more than one place
    /*$stmt = $db->prepare(
        "SELECT score, s.created, username, u.id as user_id FROM RM_Scores s 
    JOIN RM_UserComps uc on uc.user_id = s.user_id 
    JOIN RM_Competitions c on c.id = uc.competition_id
    JOIN Users u on u.id = s.user_id WHERE c.id = :cid AND s.score >= c.min_score AND s.created 
    BETWEEN uc.created AND c.expires ORDER BY s.score desc LIMIT :limit"
    );*/
    //Below if a user can't win more than one place
    //get score, user_id, created, then use dense rank to rank the scores of each user
    //outer query pulls rank 1 for each user (their best)
    //I join accounts here so I can repurpose this to payout winners. Acade project would just use the user's id.
    
    $stmt = $db->prepare("SELECT * FROM (SELECT u.username, s.user_id, s.score, s.created, a.id as account_id, DENSE_RANK() OVER (PARTITION BY s.user_id ORDER BY s.score desc) as `rank` FROM Shoot_UP_Scores s
    JOIN Shootup_UserComps uc on uc.user_id = s.user_id
    JOIN Shootup_Comps c on uc.competition_id = c.id
    JOIN Accounts a on a.user_id = s.user_id
    JOIN Users u on u.id = a.user_id
    WHERE c.id = :cid AND s.created BETWEEN uc.created AND c.expires
    )as t where `rank` = 1 ORDER BY score desc LIMIT :limit");
    $scores = [];
    try {
        $stmt->bindValue(":cid", $comp_id, PDO::PARAM_INT);
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $scores = $r;
        }
    } catch (PDOException $e) {
        flash("There was a problem fetching scores, please try again later", "danger");
        error_log("List competition scores error: " . var_export($e, true));
    }
    return $scores;
}

function calc_winners()
{
    $db = getDB();
    error_log("Starting winner calc");
    $calced_comps = [];

    //statement for winner setup
    //get id, title, first place, second place, third place, current reward for database. 
    //limit to 10 entry

    $stmt = $db->prepare("SELECT c.id, c.title, first_place, second_place, third_place, current_reward 
    from Shootup_Comps c JOIN Shootup_Payout_Options po on c.payout_option = po.id 
    where expires > CURRENT_TIMESTAMP() AND did_calc = 0 AND current_participants >= min_participants LIMIT 10");

    

    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($r) {
            $rc = $stmt->rowCount();
            error_log("Validating $rc comps");


            //get all scores for each comp

            foreach ($r as $row) {

                //calculation of the score.
                $fp = floatval(se($row, "first_place", 0, false) / 100);
                $sp = floatval(se($row, "second_place", 0, false) / 100);
                $tp = floatval(se($row, "third_place", 0, false) / 100);
                $reward = (int)se($row, "current_reward", 0, false);
                $title = se($row, "title", "-", false);
                //minimum point ceiling. never 0 for 0<score<1, instead 1
                $fpr = ceil($reward * $fp);
                $spr = ceil($reward * $sp);
                $tpr = ceil($reward * $tp);
                $comp_id = se($row, "id", -1, false);


                try {
                    $r = get_top_scores_for_comp($comp_id, 3);
                    if ($r) {
                        $atleastOne = false;
                        foreach ($r as $index => $row) {
                            $aid = se($row, "account_id", -1, false);
                            $score = se($row, "score", 0, false);
                            $user_id = se($row, "user_id", -1, false);

                            error_log("calculation for each. $index");

                            error_log("check $aid");

                            //gem given based on current score match
                            if ($index == 0) {
                                if (give_gems($fpr, "won-comp", -1, $aid, "First place in $title with score of $score")) {
                                    $atleastOne = true;
                                }
                                error_log("User $user_id First place in $title with score of $score");
                            } else if ($index == 1) {
                                if (give_gems($spr, "won-comp", -1, $aid, "Second place in $title with score of $score")) {
                                    $atleastOne = true;
                                }
                                error_log("User $user_id Second place in $title with score of $score");
                            } else if ($index == 2) {
                                if (give_gems($tpr, "won-comp", -1, $aid, "Third place in $title with score of $score")) {
                                    $atleastOne = true;
                                }
                                error_log("User $user_id Third place in $title with score of $score");
                            }
                        }
                        if ($atleastOne) {
                            array_push($calced_comps, $comp_id);
                        }
                    } else {
                        error_log("No eligible scores");
                    }
                } catch (PDOException $e) {
                    error_log("Getting winners error: " . var_export($e, true));
                }
            }
        } else {
            error_log("No competitions ready");
        }
    } catch (PDOException $e) {
        error_log("Getting Expired Comps error: " . var_export($e, true));
    }
    //closing calced comps
    
    if (count($calced_comps) > 0) {
        $query = "UPDATE Shootup_Comps set did_calc = 1, did_payout = 1 WHERE id in";
        $query .= "(" . str_repeat("?,", count($calced_comps) - 1) . "?)";
        error_log("Close query: $query");
        $stmt = $db->prepare($query);
        try {
            $stmt->execute($calced_comps);
            $updated = $stmt->rowCount();
            error_log("Marked $updated comps complete and calced");
        } catch (PDOException $e) {
            error_log("Closing valid comps error: " . var_export($e, true));
        }
    } else {
        error_log("No competitions to calc");
    }
    //close invalid comps
    $stmt = $db->prepare("UPDATE Shootup_Comps set did_calc = 1 WHERE expires <= CURRENT_TIMESTAMP() AND current_participants < min_participants AND did_calc = 0");
    try {
        $stmt->execute();
        $rows = $stmt->rowCount();
        error_log("Closed $rows invalid competitions");
    } catch (PDOException $e) {
        error_log("Closing invalid comps error: " . var_export($e, true));
    }
    error_log("Done calc winners");
}
