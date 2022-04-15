<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<div class="h-100">
    <div class="fadeIn large-floating-wrapper-multiple mx-auto align-items-center rounded form-floating">
        <div class="container-fluid">
            <h1>Leaderboard</h1>
            <?php

            /*if (is_logged_in(true)) {
            //echo "Welcome home, " . get_username();
            //comment this out if you don't want to see the session variables
            error_log("Session data: " . var_export($_SESSION, true));
        }*/
            ?>

            <?php
            $separation = true;
            //this is day which is the default
            require(__DIR__ . "/../../partials/scores_table.php");
            ?>
            <?php
            $separation = true;
            $duration = "week";
            require(__DIR__ . "/../../partials/scores_table.php");
            ?>
            <?php
            $separation = true;
            $duration = "month";
            require(__DIR__ . "/../../partials/scores_table.php");
            ?>
            <?php
            $separation = true;
            $duration = "lifetime";
            require(__DIR__ . "/../../partials/scores_table.php");
            ?>
        </div>
    </div>

    <div class="fadeIn large-floating-wrapper-multiple mx-auto align-items-center rounded form-floating">
        <div class="container-fluid">
            <h1>Games</h1>

            <?php
            $separation = true;
            //this is day which is the default
            require(__DIR__ . "/../../partials/game_list.php");
            ?>
        </div>
    </div>
</div>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>