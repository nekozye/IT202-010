<?php
  require(__DIR__."/../../partials/nav.php");
?>

<form onsubmit="return validate(this)" method="POST">
  <div>
    <label for="username">Username</label>
    <input type="text" name="username" required maxlength="30" />
  </div>
  <div>
    <label for="email">Email</label>
    <input type="email" name="email" required />
  </div>
  <div>
    <label for="pw">Password</label>
    <input type="password" id="pw" name="password" required minlength="8" />
  </div>
  <div>
    <label for="confirm">Confirm</label>
    <input type="password" name="confirm" required minlength="8" />
  </div>
  <input type="submit" value="Register" />
</form>
<script>
  function validate(form) {
    //TODO 1: implement JavaScript validation
    // Javascript can be disabled easily, so make sure to validate on server side
    //ensure it returns false for an error and true for success
    //validation of special cases

    if(count($_POST) == 0 || !isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["confirm"]))
    {
      return false;
    }
    
    return true;
  }
</script>
<?php

  if(count($_POST) == 0)
  {
    return;
  }
//TODO 2: assign the post value for easier access
  if(isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["confirm"]))
  {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se($_POST, "confirm", "", false);
    $username = se($_POST, "username", "", false);
  };

  //TODO 3: validation on php side
  $has_error = false;


  //Email Validation
  if(empty($email))
  {
    flash("Email cannot be blank.");
    $has_error = true;
  }

  //edited to use the user_helper.php
  $email = sanitize_email($email);

  if(!is_valid_email($email))
  {
    flash("Invalid email address");
    $hasError = true;
  }

  //Password Validation
  if(empty($password))
  {
    flash("Password cannot be blank.");
    $has_error = true;
  }
  if(empty($confirm))
  {
    flash("Please re-enter the password in confirm slot.");
    $has_error = true;
  }
  if(strlen($password) < 8)
  {
    flash("Password is too short.");
    $has_error = true;
  }
  if(strlen($password) > 0 && $password !== $confirm)
  {
    flash("The confirm slot must match password.");
    $has_error = true;
  }

  if(!preg_match('/^[a-z0-9_-]{3,30}/$', $username)) {
    flash (
      "Username must be lowercase, alphanumerical with only special characters being _ and -", "warning"
    );

    $hasError = true;
  }

  
  if(!$has_error)
  {
    flash("Welcome, $email");

    //password hashing
    $pw_hash = password_hash($password, PASSWORD_BCRYPT);
    $db = getDB();

    $prep_stmt = $db->prepare("INSERT INTO Users(email, password, username) VALUES(:email, :password, :username)");
    try{
      $prep_stmt->execute([":email" => $email, ":password" => $pw_hash, ":username" => $username]);
      flash("Registration Successful!");
    }
    catch(Exception $e)
    {
      flash("There was a problem registering.");
      flash("<pre>" .var_export($e,true)."</pre>");
    }
  }
  

  
?>