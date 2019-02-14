<?php
    require('obtaining_data_functions.php');
    $db = connect();

    if(isset($_POST["username"]) && isset($_POST["password"])){
        setcookie("username", htmlspecialchars($_POST["username"]), time() + (60 * 30));
        setcookie("password", htmlspecialchars($_POST["password"]), time() + (60 * 30));
        $user_id = get_user_id($_POST["username"], $_POST["password"], $db);
        if($user_id["user_id"]){
            setcookie("valid_user", "True", time() + (60 * 30));
        }
        else {
            setcookie("valid_user", "False", time() + (60 * 30));
            header("Location: sign_in.php");
        }
    }
    else if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        setcookie("username", $_COOKIE["username"], time() + (60 * 30));
        setcookie("password", $_COOKIE["password"], time() + (60 * 30));
        $user_id = get_user_id($_COOKIE["username"], $_COOKIE["password"], $db);
        if($user_id["user_id"]){
            setcookie("valid_user", "True", time() + (60 * 30));
        }
        else {
            setcookie("valid_user", "False", time() + (60 * 30));
            header("Location: sign_in.php");
        }
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
        <link rel="stylesheet" href="schedule_tracker.css">

    </head>
    <body>
        <?php include '../../home/nav.php';?>
        <div class="not_nav">
        <h1>Welcome to Your Schedule Tracker!</h1>
            <a href='view_schedule_data.php'><button>View History</button></a>
            <a href='add_day.php'><button>Add New Day</button></a>
        </div>
    </body>
</html>