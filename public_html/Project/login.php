<?php
  require(__DIR__."/../../partials/nav.php");
?>

<form onsubmit="return validate(this)" method="POST">
  <div>
    <label for="email">Email</label>
    <input type="email" name="email" required />
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
    // Javascript can be disabled easily, so make sure to validate on server side
    //ensure it returns false for an error and true for success
    //validation of special cases

    if(count($_POST) == 0 || !isset($_POST["email"]) || !isset($_POST["password"]))
    {
      return false;
    }
    
    return true;
  }
</script>
<?php
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
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  //validate
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      flash("Invalid email address");
      $hasError = true;
  }
  if (empty($password)) {
      flash("password must not be empty");
      $hasError = true;
  }
  if (strlen($password) < 8) {
      flash("Password too short");
      $hasError = true;
  }
  if (!$hasError) {
      //TODO 4
      $db = getDB();
      $stmt = $db->prepare("SELECT id, email, password from Users where email = :email");
      try {
          $r = $stmt->execute([":email" => $email]);
          if ($r) {
              $user = $stmt->fetch(PDO::FETCH_ASSOC);
              if ($user) {
                  $hash = $user["password"];
                  unset($user["password"]);
                  if (password_verify($password, $hash)) {
                      flash("Weclome $email");
                  } else {
                      flash("Invalid password");
                  }
              } else {
                  flash("Email not found");
              }
          }
      } catch (Exception $e) {
          flash("<pre>" . var_export($e, true) . "</pre>");
      }
  }
}
  
?>