<?php
    if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        setcookie("username", $_COOKIE["username"], time() + (60 * 30));
        setcookie("password", $_COOKIE["password"], time() + (60 * 30));
    }
    else {
        header("Location: sign_in.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Schedule Tracker</title>
        <link rel="stylesheet" href="/home/navbar.css">
        <script src="view_schedule_data.js"></script>
    </head>
    <body>
        <?php include '../../home/nav.php';?>
        <h1>Please fill out form in order to see desired history</h1>
        <form action="display.php" method="post" id="form">
            <input type="radio" name="time_period" onclick="noInput()" value="MostRecentDay">Most Recent Day<br>
            <input type="radio" name="time_period" onclick="day()" value="day">Selected Day<br>
            <input type="radio" name="time_period" onclick="week()" value="week">Past Week<br>
            <input type="radio" name="time_period" onclick="month()" value="month">Past Month<br>
            <input type="radio" name="time_period" onclick="custom()" value="custom">Custom Time Period<br>
            <label for="custom_input">Start Date</label>
            <label for="custom_input_month">Desired Month</label>
            <label for="second_custom_input">End Date</label>
            <input type="submit">
        </form>
    </body>
</html>