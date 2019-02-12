<?php
    if(isset($_POST["username"]) || isset($_COOKIE["username"])){
        setcookie("username", $_POST["username"], time() + (60 * 30));
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
        <?php include '/home/nav.php';?>
        <h1>Welcome to Your Schedule Tracker!</h1>
        <a href='view_schedule_data.php'><button>View History</button></a>
        <a href='add_day.php'><button>Add New Day</button></a>
    </body>
</html>