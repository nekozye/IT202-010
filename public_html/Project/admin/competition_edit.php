<?php
require_once(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    //die(header("Location: $BASE_PATH" . "home.php"));
    redirect("home.php");
}

is_logged_in(true);
$db = getDB();
//handle join
if (isset($_POST["join"])) {
    $user_id = get_user_id();
    $comp_id = se($_POST, "comp_id", 0, false);
    $cost = se($_POST, "join_cost", 0, false);
    join_competition($comp_id, $user_id, $cost);
}
$id = se($_GET, "id", -1, false);
if ($id < 1) {
    flash("Invalid competition", "danger");
    redirect("competition_list.php");
}

//payout option pull
$payout_options = [];
$stmt = $db->prepare("SELECT id, CONCAT(first_place,'% - ', second_place, '% - ', third_place, '%') as place FROM Shootup_Payout_Options");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $payout_options = $r;
    }
} catch (PDOException $e) {
    flash("There was a problem fetching first, second, third place options", "danger");
    error_log("Error Getting Places: " . var_export($e, true));
}



//handle page load
$stmt = $db->prepare("SELECT Shootup_Comps.id , title, min_participants, current_participants, payout_option, current_reward, expires, creator_id, min_score, join_cost, IF(competition_id is null, 0, 1) as joined,  CONCAT(first_place,'% - ', second_place, '% - ', third_place, '%') as place FROM Shootup_Comps
JOIN Shootup_Payout_Options on Shootup_Payout_Options.id = Shootup_Comps.payout_option
LEFT JOIN (SELECT * FROM Shootup_UserComps where Shootup_UserComps.user_id = :uid) as t on t.competition_id = Shootup_Comps.id WHERE Shootup_Comps.id = :cid");
$row = [];
$comp = "";
try {
    $stmt->execute([":uid" => get_user_id(), ":cid" => $id]);
    $r = $stmt->fetch();
    if ($r) {
        $row = $r;
        $comp = se($r, "title", "N/A", false);
    }
} catch (PDOException $e) {
    flash("There was a problem fetching competitions, please try again later", "danger");
    error_log("List competitions error: " . var_export($e, true));
}
//$scores = get_top_scores_for_comp($id);
?>
<div class="h-100">
    <div class="fadeIn large-floating-wrapper-multiple mx-auto align-items-center rounded form-floating">
        <div class="container-fluid">
            <h1>Edit Competition: <?php se($comp); ?></h1>
            <div class="fadeIn large-floating-wrapper-multiple mx-auto align-items-center rounded form-floating">
                <form>
                    <div class="bg-light rounded form-floating">
                        <table class="table text-dark">
                            <thead>
                                <th>Title</th>
                                <th>Participants</th>
                                <th>Reward Payout</th>
                                <th>Min Score</th>
                                <th>Expires</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php if (count($row) > 0) : ?>
                                    <td>
                                        <div class="mb-3">
                                            <input id="title" name="title" class="form-control" value="<?php se($row, "title"); ?>" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-3 form-group">
                                            <?php se($row, "current_participants"); ?> /
                                            <input id="min_participants" name="min_participants" class="form-control form-tiny" value="<?php se($row, "min_participants"); ?>" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-3">
                                            <select id="po" name="payout_option" class="form-control">
                                                <?php foreach ($payout_options as $po) : ?>
                                                    <?php error_log(($row['place']))?>
                                                    <option value="<?php se($po, 'id'); ?>" <?php if($po['id'] === $row['payout_option']): ?><?php se("selected") ?><?php endif;?> >
                                                        <?php se($po, 'place'); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-3">
                                            <input id="ms" name="min_score" type="datetime-local" class="form-control" value="<?php se($row, "min_score"); ?>" placeholder=">= 1" min="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-3">
                                            <input id="title" type="datetime-local" name="title" class="form-control" value="<?php se($row, "expires", "-"); ?>"/>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if (se($row, "joined", 0, false)) : ?>
                                            <button class="btn btn-primary disabled" onclick="event.preventDefault()" disabled>Already Joined</button>
                                        <?php else : ?>
                                            <form method="POST">
                                                <input type="hidden" name="comp_id" value="<?php se($row, 'id'); ?>" />
                                                <input type="hidden" name="cost" value="<?php se($row, 'join_cost', 0); ?>" />
                                                <input type="submit" name="join" class="btn btn-primary" value="Join (Cost: <?php se($row, "join_cost", 0) ?>)" />
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="100%">No active competitions</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <?php
            //$scores is defined above
            $title = $comp . " Top Scores";
            $comp_id = $id;
            $duration = "competition";
            include(__DIR__ . "/../../../partials/scores_table.php");
            ?>
        </div>
    </div>
</div>
<?php
require(__DIR__ . "/../../../partials/footer.php");
?>