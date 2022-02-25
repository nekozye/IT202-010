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

  if(count($_POST) == 0)
  {
    return;
  }
//TODO 2: assign the post value for easier access
  if(isset($_POST["email"])&&isset($_POST["password"]))
  {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
  };

  //TODO 3: validation on php side
  $has_error = false;


  //Email Validation
  if(empty($email))
  {
    echo "Email cannot be blank.";
    $has_error = true;
  }

  $email = filter_var($email, FILTER_SANITIZE_EMAIL);

  if(!filter_var($email,FILTER_SANITIZE_EMAIL))
  {
    echo "Invalid Email Address.";
    $has_error = true;
  }


  //Password Validation
  if(empty($password))
  {
    echo "Password cannot be blank.";
    $has_error = true;
  }
  if(strlen($password) < 8)
  {
    echo "Password is too short.";
    $has_error = true;
  }
  
  if(!$has_error)
  {
    //TODO 4

    $DB = getDB();
    $stmt = $db->prepare("SELECT id, username, email, password from Users where email = :email");
    try{
        $r = $stmt -> execute([":email" => $email]);
        if ($r) {
            $user -> $stmt -> fetch(PDO::FETCH_ASSOC);
            if ($user) {
                $hash = $user["password"];
                unset($user["password"]);

                if (password_verify($password, $hash)){
                    echo "Welcome $email";
                } else {
                    echo "Invalid password";
                }
            }
            else{
                echo "Email not registered";
            }
        }
    }
    catch (Exception $e) {
        echo "<pre>" . var_export($e, true). "</pre>";
    }
  }
  

  
?>