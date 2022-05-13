<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

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
    $balance = get_account_balance();
    join_competition($comp_id, $user_id, $cost);
}


$per_page = 5;
paginate("SELECT count(1) as total FROM Shootup_Comps WHERE expires > current_timestamp() AND did_payout < 1 AND did_calc < 1");
//handle page load

$stmt = $db->prepare("SELECT Shootup_Comps.id as comp_id, title, min_participants, current_participants, current_reward, expires, creator_id, min_score, join_cost, IF(competition_id is null, 0, 1) as joined,  CONCAT(first_place,'% - ', second_place, '% - ', third_place, '%') as place FROM Shootup_Comps
JOIN Shootup_Payout_Options on Shootup_Payout_Options.id = Shootup_Comps.payout_option
LEFT JOIN (SELECT * FROM Shootup_UserComps WHERE user_id = :uid) as uc ON uc.competition_id = Shootup_Comps.id ORDER BY expires asc");
$results = [];
try {
    $stmt->execute([":uid" => get_user_id()]);
    $r = $stmt->fetchAll();
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    flash("There was a problem fetching competitions, please try again later", "danger");
    error_log("List competitions error: " . var_export($e, true));
}
?>
<div class="large-floating-wrapper mx-auto align-items-center h-100">
    <div class="bg-light rounded form-floating">
        <div class="container-fluid">
            <h1>Edit Competition - Selection List</h1>
            <table class="table">
                <thead>
                    <th>Title</th>
                    <th>Participants</th>
                    <th>Reward</th>
                    <th>Min Score</th>
                    <th>Expires</th>
                    
                    <th>Expired?</th>

                    <th>Paid?</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php if (count($results) > 0) : ?>
                        <?php foreach ($results as $row) : ?>
                            <tr>
                                <td><?php se($row, "title"); ?></td>
                                <td><?php se($row, "current_participants"); ?>/<?php se($row, "min_participants"); ?></td>
                                <td><?php se($row, "current_reward"); ?><br>Payout: <?php se($row, "place", "-"); ?></td>
                                <td><?php se($row, "min_score"); ?></td>
                                <td><?php se($row, "expires", "-"); ?></td>
                                <td>
                                    <?php if (competition_is_alive($row["comp_id"])) : ?>
                                        Alive
                                    <?php else : ?>
                                        Dead
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (already_paid($row["comp_id"])) : ?>
                                        Paid
                                    <?php else : ?>
                                        Waiting
                                    <?php endif; ?>
                                </td>
                                <td>

                                    <?php if (already_paid($row["comp_id"])) : ?>
                                        <a class="btn btn-secondary">Done</a>
                                    <?php else : ?>
                                        <a class="btn btn-primary" href="competition_edit.php?id=<?php se($row, 'comp_id'); ?>">Edit</a>
                                    <?php endif; ?>

                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="100%">No active competitions</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php include(__DIR__ . "/../../../partials/pagination.php"); ?>
        </div>
    </div>
</div>

<?php
calc_winners();
require(__DIR__ . "/../../../partials/footer.php");
?>