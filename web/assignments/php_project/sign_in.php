<!DOCTYPE html>
<html>
    <head>
        <title>Schedule Tracker</title>
        <link rel="stylesheet" href="/home/navbar.css">
    </head>
    <body>
        <?php include '../../home/nav.php';?>
        <h1>Please Sign In</h1>
        <?php
            if($_COOKIE["valid_user"] == "False"){
                echo "<h3>The given username and/or password does not match any account we currently have.
                Feel free to use the link below to create a new account.</h3>";
            }
        ?>
        <form action="schedule_tracker.php" method="POST">
            username: <input type="text" name="username" maxlength="255" size="25"><br><br>
            password: <input type="password" name="password" maxlength="255" size="25"><br><br>
            <input type="submit" value="Sign In">
        </form>
        <br>
        <a href="create_account.php"><button>Create Account</button></a>
    </body>
</html>