<?php
    require(__DIR__."/../../partials/nav.php");
?>
<h1>Home</h1>

<?php
//edited to use user_helpers.php
    if(is_logged_in(true)){
        error_log("session data: " . var_export($_SESSION, true));
        echo "welcome, ".$_SESSION["user"]["username"]."!";
    }
?>

<?php require_once(__DIR__."/../../partials/flash.php"); ?>