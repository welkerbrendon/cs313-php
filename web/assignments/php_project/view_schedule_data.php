<?php
    require_once("check_if_logged_in.php");
    check_if_logged_in();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Schedule Data</title>
        <link rel="stylesheet" href="/home/navbar.css">
        <link rel="stylesheet" href="view_schedule_data.css">
        <script src="view_schedule_data.js"></script>
    </head>
    <body>
        <?php include '../../home/nav.php';?>
        <h1>Please fill out form in order to see desired history</h1>
        <form action="display.php" method="get" id="form">
            <input type="radio" name="time_period" onclick="noInput()" value="MostRecentDay">Most Recent Day<br>
            <input type="radio" name="time_period" onclick="day()" value="day">Selected Day<br>
            <input type="radio" name="time_period" onclick="week()" value="week">Past Week<br>
            <input type="radio" name="time_period" onclick="month()" value="month">Past Month<br>
            <input type="radio" name="time_period" onclick="custom()" value="custom">Custom Time Period<br>
            <input type="submit">
        </form>
    </body>
</html>