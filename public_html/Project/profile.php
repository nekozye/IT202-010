<?php
require_once(__DIR__ . "/../../partials/nav.php");
?>


<?php

is_logged_in(true);

$user_id = (int)se($_GET, "id", get_user_id(), false);

$isMe = $user_id == get_user_id();
$edit = isset($_GET["edit"]);


$db = getDB();

refresh_account_balance();
?>

<?php
if (isset($_POST["save_username"])) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $vis = isset($_POST["vis"]) ? 1 : 0;
    $params = [":email" => $email, ":username" => $username, ":id" => get_user_id(), ":vis" => $vis];

    $stmt = $db->prepare("UPDATE Users set email = :email, username = :username, visibility = :vis where id = :id");
    try {
        $stmt->execute($params);
        flash("Profile saved", "success");
    } catch (Exception $e) {
        if ($e->errorInfo[1] === 1062) {
            //https://www.php.net/manual/en/function.preg-match.php
            preg_match("/Users.(\w+)/", $e->errorInfo[2], $matches);
            if (isset($matches[1])) {
                flash("The chosen " . $matches[1] . " is not available.", "warning");
            } else {
                //TODO come up with a nice error message
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            //TODO come up with a nice error message
            echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        }
    }
}
if (isset($_POST["save_password"])) {
    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password)) {
        if (!empty($new_password) && !empty($confirm_password)) {
            if ($new_password === $confirm_password) {
                //TODO validate current
                $stmt = $db->prepare("SELECT password from Users where id = :id");
                try {
                    $stmt->execute([":id" => get_user_id()]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (isset($result["password"])) {
                        if (password_verify($current_password, $result["password"])) {
                            $query = "UPDATE Users set password = :password where id = :id";
                            $stmt = $db->prepare($query);
                            $stmt->execute([
                                ":id" => get_user_id(),
                                ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                            ]);

                            flash("Password reset", "success");
                        } else {
                            flash("Current password is invalid", "warning");
                        }
                    }
                } catch (Exception $e) {
                    echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                }
            } else {
                flash("New passwords don't match", "warning");
            }
        }
        else {
            flash("Please enter the current password and confirmation to reset.", "danger");
        }
    } 
    else {
        flash("Please enter the previous password to reset.", "danger");
    }
    //select fresh data from table
}
$stmt = $db->prepare("SELECT id, email, username, visibility, created from Users where id = :id LIMIT 1");
$isVisible = false;
try {
    $stmt->execute([":id" => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if ($isMe) {
            $_SESSION["user"]["email"] = $user["email"];
            $_SESSION["user"]["username"] = $user["username"];
        }

        if (se($user, "visibility", 0, false) > 0) {
            $isVisible = true;
        }

        $email = se($user, "email", "", false);
        $username = se($user, "username", "", false);
        $joined = se($user, "created", "", false);
    } else {
        flash("User doesn't exist", "danger");
    }
} catch (Exception $e) {
    flash("An unexpected error occurred, please try again", "danger");
    //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
}

?>

<div class="h-100">
    <div class="fadeIn large-floating-wrapper-multiple rounded mx-auto align-items-center">
        <div class="container-fluid">
            <h1>Profile<?php if (!$isMe) :?> of <?php se($username); ?><?php endif; ?></h1>

            <?php if ($isMe && $edit) : ?>
                <?php if ($isMe) : ?>
                    <a class="mt-3 btn btn-info" href="<?php echo get_url("profile.php"); ?>">Change to View Mode</a>
                <?php endif; ?>

                <form method="POST" onsubmit="return validate(this);">
                    <div class="bg-light rounded inrow-class-multi form-floating">
                        <h3>
                            Email Edit
                        </h3>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" value="<?php se($email); ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" value="<?php se($username); ?>" />
                        </div>

                        

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input <?php if ($isVisible) {
                                            echo "checked";
                                        } ?> class="form-check-input" type="checkbox" role="switch" id="vis" name="vis">
                                <label class="form-check-label" for="vis">Account Public</label>
                            </div>
                        </div>

                        <input type="submit" class="mt-3 btn btn-primary" value="Update User Profile" name="save_username" />

                    </div>
                </form>

                <form method="POST" onsubmit="return validate(this);">

                    <div class="bg-light rounded inrow-class-multi form-floating">
                        <!-- DO NOT PRELOAD PASSWORD -->
                        <h3>
                            Password Reset
                        </h3>
                        <div class="mb-3">
                            <label class="form-label" for="cp">Current Password</label>
                            <input class="form-control" type="password" name="currentPassword" id="cp" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="np">New Password</label>
                            <input class="form-control" type="password" name="newPassword" id="np" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="conp">Confirm Password</label>
                            <input class="form-control" type="password" name="confirmPassword" id="conp" />
                        </div>
                        <input type="submit" class="mt-3 btn btn-primary" value="Update Password" name="save_password" />
                    </div>
                </form>
            <?php else : ?>
                <?php if ($isMe) : ?>
                    <a href="?edit" class="mt-3 btn btn-info">Change to Edit Mode</a>
                <?php endif; ?>
                <?php if ($isVisible || $isMe) : ?>
                    <div class="bg-light rounded inrow-class-multi form-floating">
                        <div class="text-best-score">
                            Best Score: <?php echo get_best_score(get_user_id()); ?>
                        </div>
                    </div>

                    <div class="bg-light rounded inrow-class-multi form-floating">
                        <div class="text-best-score">
                            Current Churu: <?php echo get_account_balance(get_user_id()); ?> Churus
                        </div>
                    </div>

                    <div class="bg-light rounded inrow-class-multi form-floating">
                        <?php
                        $duration = "latest";
                        require(__DIR__ . "/../../partials/scores_table.php");
                        ?>
                    </div>
                <?php else : ?>
                    Profile is private.
                    <?php
                    flash("Profile is private", "warning");
                    redirect("home.php");
                    ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function validate(form) {
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let isValid = true;
        //TODO add other client side validation....

        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (!isEqual(pw, con)) {
            flash("Password and Confrim password must match", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>


<?php
require_once(__DIR__ . "/../../partials/footer.php");
?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>