<?php
//TODO 1: require db.php
require_once(__DIR__ . "/db.php");


//helper for redirecting project path.
$BASE_PATH = "/Project";


//Global variable that is required on multiple website files
require(__DIR__ . "/global_setups.php");




//TODO 4: Flash Message Helpers, moved to be used for all required php setups
require(__DIR__ . "/flash_messages.php");


//require safer_echo.php
require(__DIR__ . "/safer_echo.php");
//TODO 2: filter helpers
require(__DIR__ . "/sanitizers.php");

//basic sql requesting helpers
require(__DIR__ . "/sql_helpers.php");



//TODO 3: User helpers
require(__DIR__ . "/user_helpers.php");






//score helpers
require(__DIR__ . "/score_helpers.php");

//duplicate email/username testing
require(__DIR__ . "/duplicate_user_details.php");

//reset session
require(__DIR__ . "/reset_session.php");

//account helpers
require(__DIR__ . "/account_helpers.php");

//competition related helpers
require(__DIR__ . "/competition_helpers.php");

//shop helpers
require(__DIR__ . "/shop_helpers.php");


require(__DIR__ . "/php_helpers.php");

//url getting functionality helpers
require(__DIR__ . "/get_url.php");



?>