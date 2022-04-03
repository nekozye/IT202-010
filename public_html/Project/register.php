<?php
require(__DIR__ . "/../../partials/nav.php");
reset_session();
?>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email</label>
        <input type="email" id="useremail" name="email" required />
    </div>
    <div>
        <label for="username">Username</label>
        <input type="text" id="dsusername" name="username" required maxlength="30" />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div>
        <label for="confirm">Confirm</label>
        <input type="password" id="confirmpw" name="confirm" required minlength="8" />
    </div>
    <input type="submit" value="Register" />
</form>


<script src="<?php echo get_url('helpers.js'); ?>"></script>

<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        let useremail = form.useremail;
        let username = form.dsusername;
        let password = form.pw;
        let confirm = form.confirmpw;

        let isValid = true;

        refresh_flash();
        
        if((useremail.value === undefined)) { isValid = false; flash("Requires Email","danger");}
        if((username.value === undefined)) { isValid = false; flash("Requires Username","danger");}
        if((password.value === undefined)) { isValid = false; flash("Requires Password","danger");}
        if((confirm.value === undefined)) { isValid = false; flash("Requires Confirm","danger");}

        if(!isValid)
        {
            return false;
        }

        if(!validate_email(useremail.value))
        {
            isValid = false;
            flash("Email is not Valid", "danger");
        }

        if(!validate_username(username.value))
        {
            isValid = false;
            flash("Username must only contain 3-30 characters a-z, 0-9, _, or -", "danger");
        }

        if(password.value.length < 8)
        {
            isValid = false;
            flash("Password is too short", "danger");
        }

        

        if(confirm.value != password.value)
        {
            isValid = false;
            flash("Password and Confirm must match.", "danger");
        }


        document.blur();
        return isValid;
    }
</script>

<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se(
        $_POST,
        "confirm",
        "",
        false
    );
    $username = se($_POST, "username", "", false);
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!is_valid_username($username)) {
        flash("Username must only contain 3-30 characters a-z, 0-9, _, or -", "danger");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty", "danger");
        $hasError = true;
    }
    if (!is_valid_password($password)) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (
        strlen($password) > 0 && $password !== $confirm
    ) {
        flash("Password and Confirm must match", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
            flash("Successfully registered!", "success");

            die(header("Location: login.php"));
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>