<?php
    setcookie("valid_user", "", time() -1);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create New Account</title>
        <link rel="stylesheet" href="/home/navbar.css">
        <link rel="stylesheet" href="create_account.css">
    </head>
    <body>
        <?php include '../../home/nav.php';?>
        <div class="not_nav">
            <h1>Welcome to the Activity Tracker</h1>
            <h2>Please create a username and password below</h2>
            <?php
                if($_COOKIE["failed"]){
                    $message = "";
                    if($_COOKIE["failed"] == "exists"){
                        $message = "That account alread exists";
                    }
                    else if($_COOKIE["failed"] == "no_data"){
                        $message = "Please provide a username and password and please verify the password.";
                    }
                    else {
                        $message = "Unable to verify password.";
                    }

                    echo "<h3 id='error'>*$message*</h3>";
                }
            ?>
            <form action="put_account_in_db.php" method="post">
                <p>Username:</p><input type="text" name="new_username"><br><br>
                <p><p>Password:</p><input type="password" name="new_password"></p>
                <p>Verify Password: </p><input type="password" name="verify_password"><br><br>
                <input type="submit">
            </form>
            <br><a href="sign_in.php"><button>Sign In</button></a>
        </div>
    </body>
</html>