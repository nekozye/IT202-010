<?php
require_once(__DIR__ . "/../../../lib/functions.php");
error_log("save_score received data: " . var_export($_REQUEST, true));

//handle the potentially incoming post request
$score = (int)se($_POST, "data", 0, false);

//if data is valid pass it to save_score
$standalone_enabled = false; //I'm just blocking standalone since I'm using server-side score handling
if ($score > 0 && $standalone_enabled) {
    save_score($score);
}
//This demo will be setup to demonstrate a front end game
//vs one where the logic is mostly done on the back end
function save_score($score, $echo = true)
{
    $response = ["status" => 400, "message" => "Unhandled error"];
    http_response_code(400);
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (is_logged_in()) {
        //todo save
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Shoot_UP_Scores(score, user_id) VALUES (:s, :uid)");
        try {
            $stmt->execute([":s" => $score, ":uid" => get_user_id()]);
            $response["status"] = 200;
            $response["message"] = "Saved Score";
            $response["message_type"] = "success";
            http_response_code(200);
        } catch (PDOException $e) {
            error_log("Error saving score: " . var_export($e, true));
            $response["message"] = "Error saving score details";
            $response["message_type"] = "danger";
        }
    } else {
        $response["message"] = "Data is not Saved: Please log in.";
        $response["message_type"] = "warning";
        http_response_code(403);
    }
    if ($echo) {
        echo json_encode($response);
        die();
    }
    return $response;
}
