<?php
require_once(__DIR__ . "/../../../lib/functions.php");
error_log("game_backend received data: " . var_export($_REQUEST, true));
//cell template for structure/defaults


if (isset($_POST["type"])) {
    $type = $_POST["type"];
    error_log("type: " . $type);
    if ($type === "game_end_save") {
        
        $resp = save_game($_POST["data"]);
        echo json_encode($resp);
        error_log(var_export($resp, true));
        die();
    }
}

function save_game($score){
    require_once(__DIR__ . "/save_score.php");
    
    return save_score($score, false);
}