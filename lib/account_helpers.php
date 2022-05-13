<?php
function refresh_account_balance()
{
    if (is_logged_in()) {
        $query = "UPDATE Accounts set balance = (SELECT IFNULL(SUM(diff), 0) from Churu_History WHERE src = :src) where id = :src";
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":src" => get_user_account_id()]);
            get_or_create_account(); //refresh session data
        } catch (PDOException $e) {
            error_log(var_export($e->errorInfo, true));
            flash("Error refreshing churu balance", "danger");
        }

        //updates the user table with the calculated and saved accounts table
        $query = "UPDATE Users set balance = (SELECT balance from Accounts WHERE id = :src) where id = (SELECT user_id from Accounts WHERE id = :src)";
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":src" => get_user_account_id()]);
            error_log("checkout, user updated");
            get_or_create_account(); //refresh session data
        } catch (PDOException $e) {
            error_log(var_export($e->errorInfo, true));
            flash("Error refreshing churu balance - user side", "danger");
        }

    }
    
}

function get_or_create_account()
{
    if (is_logged_in()) {
        //let's define our data structure first
        //id is for internal references, account_number is user facing info, and balance will be a cached value of activity
        $account = ["id" => -1, "account_number" => false, "balance" => 0];
        //this should always be 0 or 1, but being safe
        $query = "SELECT id, account, balance from Accounts where user_id = :uid LIMIT 1";
        $db = getDB();
        $stmt = $db->prepare($query);
        $created = false;
        try {
            $stmt->execute([":uid" => get_user_id()]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                //account doesn't exist, create it
                try {
                    //my table should automatically create the account number so I just need to assign the user
                    $query = "INSERT INTO Accounts (user_id) VALUES (:uid)";
                    $user_id = get_user_id(); //caching a reference
                    $stmt = $db->prepare($query);
                    $stmt->execute([":uid" => $user_id]);
                    $account["id"] = $db->lastInsertId();
                    //this should mimic what's happening in the DB without requiring me to fetch the data
                    $account["account_number"] = str_pad($user_id, 12, "0");
                    flash("Welcome! Your account has been created successfully", "success");
                    if (give_gems(10, "welcome", -1, $account["id"], "Welcome bonus!")) {
                        flash("Enjoy 10 bonus churus as a welcome bonus!", "success");
                    }
                    $created = true;
                } catch (PDOException $e) {
                    flash("An error occurred while creating your account", "danger");
                    error_log(var_export($e, true));
                }
            } else {
                //$account = $result; //just copy it over
                $account["id"] = $result["id"];
                $account["account_number"] = $result["account"];
                $account["balance"] = $result["balance"];
            }
        } catch (PDOException $e) {
            flash("Technical error: " . var_export($e->errorInfo, true), "danger");
        }
        $_SESSION["user"]["account"] = $account; //storing the account info as a key under the user session
        if (isset($created) && $created) {
            refresh_account_balance();
        }
        //Note: if there's an error it'll initialize to the "empty" definition around line 42

    } else {
        flash("You're not logged in", "danger");
    }
}


function get_account_balance()
{
    if (is_logged_in() && isset($_SESSION["user"]["account"])) {
        
        refresh_account_balance();


        return (int)se($_SESSION["user"]["account"], "balance", 0, false);
    }
    return 0;
}

function get_user_account_id()
{
    if (is_logged_in() && isset($_SESSION["user"]["account"])) {
        return (int)se($_SESSION["user"]["account"], "id", 0, false);
    }
    return 0;
}

function give_gems($churus, $reason, $losing = -1, $gaining = -1, $details = "")
{
    //I'm choosing to ignore the record of 0 point transactions
    if ($churus > 0) {
        $query = "INSERT INTO Churu_History (src, dest, diff, reason, details) 
            VALUES (:acs1, :acd1, :pc, :r,:m), 
            (:acs2, :acd2, :pc2, :r, :m)";
        //I'll insert both records at once, note the placeholders that are kept the same and the ones changed.
        $params[":acs1"] = $losing;
        $params[":acd1"] = $gaining;
        $params[":r"] = $reason;
        $params[":m"] = $details;
        $params[":pc"] = ($churus * -1);

        $params[":acs2"] = $gaining;
        $params[":acd2"] = $losing;
        $params[":pc2"] = $churus;
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute($params);
            //Only refresh the balance of the user if the logged in user's account is part of the transfer
            //this is needed so future features don't waste time/resources or potentially cause an error when a calculation
            //occurs without a logged in user
            if ($losing == get_user_account_id() || $gaining == get_user_account_id()) {
                refresh_account_balance();
            }
            return true;
        } catch (PDOException $e) {
            error_log(var_export($e->errorInfo, true));
            flash("There was an error transfering churus", "danger");
        }
    }
    return false;
}