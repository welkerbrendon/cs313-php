<?php
    if(isset($_POST["username"]) && isset($_POST["password"])){
        setcookie("username", $_POST["username"], time() + (60 * 30));
        setcookie("password", $_POST["password"], time() + (60 * 30));
    }
    else if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
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
    </head>
    <body>
        <?php include '../../home/nav.php';?>
        <h1>Welcome to Your Schedule Tracker!</h1>
        <a href='view_schedule_data.php'><button>View History</button></a>
        <a href='add_day.php'><button>Add New Day</button></a>
    </body>
</html>