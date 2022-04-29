<?php
//TODO 1: require db.php
require_once(__DIR__ . "/db.php");


//helper for redirecting project path.
$BASE_PATH = "/Project";


//TODO 4: Flash Message Helpers, moved to be used for all required php setups
require(__DIR__ . "/flash_messages.php");

//require safer_echo.php
require(__DIR__ . "/safer_echo.php");
//TODO 2: filter helpers
require(__DIR__ . "/sanitizers.php");
//TODO 3: User helpers
require(__DIR__ . "/user_helpers.php");


//score helpers
require(__DIR__ . "/score_helpers.php");

//duplicate email/username testing
require(__DIR__ . "/duplicate_user_details.php");
//reset session
require(__DIR__ . "/reset_session.php");



//url getting functionality helpers
require(__DIR__ . "/get_url.php");



?>