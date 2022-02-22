<form onsubmit="return validate(this)" method="POST">
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
//TODO 2: assign the post value for easier access
  if(isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["confirm"]))
  {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se($_POST, "confirm", "", false);
  };

  //TODO 3: validation on php side
  $has_error = false;

  if(empty($email))
  {
    
  }
  
?>