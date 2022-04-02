<?php
    require(__DIR__."/../../partials/nav.php");
?>
<h1>Home</h1>
<?php
//edited to use user_helpers.php
    if(is_logged_in()){
        flash("Welcome, " . get_user_email());
    }
    else{
        flash("You're not logged in");
    }
?>