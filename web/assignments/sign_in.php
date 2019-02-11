<!DOCTYPE html>
<html>
    <head>
        <title>Schedule Tracker</title>
        <link rel="stylesheet" href="../home/navbar.css">
    </head>
    <body>
        <?php include '../home/nav.php';?>
        <h1>Please Sign In</h1>
        <form action="schedule_tracker.php" method="POST">
            username: <input type="text" maxlength="255" size="25"><br><br>
            password: <input type="password" maxlength="255" size="25"><br><br>
            <input type="submit" value="Sign In">
        </form>
    </body>
</html>