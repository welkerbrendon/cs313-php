<?php
    require('obtaining_data_functions.php');
    $db = connect();

    if(isset($_POST["username"]) && isset($_POST["password"])){
        echo "in if<br>";
        setcookie("username", htmlspecialchars($_POST["username"]), time() + (60 * 30));
        setcookie("password", htmlspecialchars($_POST["password"]), time() + (60 * 30));
        $user_id = get_user_id($_COOKIE["username"], $_COOKIE["password"], $db);

        if($user_id["user_id"] != NULL){
            echo "in if in if<br>";
            setcookie("valid_user", "True", time() + (60 * 30));
        }
        else {
            echo "in else in if<br>";
            setcookie("valid_user", "False", time() + (60 * 30));
            //header("Location: sign_in.php");
        }
    }
    else if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        echo "in else if<br>";
        setcookie("username", $_COOKIE["username"], time() + (60 * 30));
        setcookie("password", $_COOKIE["password"], time() + (60 * 30));
        $user_id = get_user_id($_COOKIE["username"], $_COOKIE["password"], $db);
        if($user_id["user_id"]){
            echo "in if in else if<br>";
            setcookie("valid_user", "True", time() + (60 * 30));
        }
        else {
            echo "in else in else if<br>";
            setcookie("valid_user", "False", time() + (60 * 30));
            //header("Location: sign_in.php");
        }
    }
    else {
        echo "in else<br>";
        //header("Location: sign_in.php");
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