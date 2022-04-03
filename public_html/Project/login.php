<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email</label>
        <input type="email" id="useremail" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <input type="submit" value="Login" />
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        let useremail = form.useremail;
        let password = form.pw;

        let isValid = true;

        refresh_flash();
        
        if((useremail.value === undefined)) { isValid = false; flash("Requires Email","danger");}
        if((password.value === undefined)) { isValid = false; flash("Requires Password","danger");}

        if(!isValid)
        {
            return false;
        }

        if(!validate_email(useremail.value))
        {
            isValid = false;
            flash("Email is not Valid", "danger");
        }

        if(password.value.length < 8)
        {
            isValid = false;
            flash("Password is too short", "danger");
        }

        document.blur();

        return isValid;

    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty");
        $hasError = true;
    }
    //sanitize
    //$email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = sanitize_email($email);
    //validate
    /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        flash("Invalid email address");
        $hasError = true;
    }*/
    if (!is_valid_email($email)) {
        flash("Invalid email address");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty");
        $hasError = true;
    }
    if (!is_valid_password($password)) {
        flash("Password too short");
        $hasError = true;
    }
    if (!$hasError) {
        //flash("Welcome, $email");
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password from Users where email = :email");
        try {
            $stmt->execute([":email" => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $hash = $user["password"];
                
                if (password_verify($password, $hash)) {
                    flash("Login Successful!", "success");
                    unset($user["password"]);


                    //saving the user information
                    $_SESSION["user"] = $user;

                    

                    //setup for user role setup

                    $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                    JOIN UserRoles on Roles.id = UserRoles.role_id 
                    WHERE UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");

                    $stmt->execute([":user_id" => $user["id"]]);
                    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($roles) {
                        $_SESSION["user"]["roles"] = $roles;
                    } else {
                        $_SESSION["user"]["roles"] = [];
                    }

                    die(header("Location: home.php"));
                } else {
                    flash("Password does not match", "warning");
                }
            } else {
                flash("Email not found" , "warning");
            }
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
