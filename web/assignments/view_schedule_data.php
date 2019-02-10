<!DOCTYPE html>
<html>
    <head>
        <title>Schedule Tracker</title>
        <link rel="stylesheet" href="../home/navbar.css">
    </head>
    <body>
        <?php include '../home/nav.php';?>
        <h1>Please fill out form in order to see desired history</h1>
        <form action="" method="post">
            Username:<input type="text" maxlength="255" size="25" name="username"><br><br>
            Password:<input type="password" maxlength="255" size="25" name="password"><br><br>
            <input type="radio" name="time_period" id="day">Most Recent Day Entered<br>
            <input type="radio" name="time_period" id="week">Past Week<br>
            <input type="radio" name="time_period" id="month">Past Month<br>
            <input type="radio" name="time_period" id="custom">Custom Time Period<br>
        </form>
    </body>
</html>