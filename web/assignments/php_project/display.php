<?php  
    if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        setcookie("username", $_COOKIE["username"], time() + (60 * 30));
        setcookie("password", $_COOKIE["password"], time() + (60 * 30));
    }
    else {
        header("Location: sign_in.php");
        exit;
    }
    require('obtaining_data_functions.php');

    $data = NULL;
    if($_POST["time_period"] == "MostRecentDay"){
        $data = get_most_recent_day($_COOKIE["username"], $_COOKIE["password"]);
    }
    else if($_POST["time_period"] == "day") {
        $data = get_given_day($_COOKIE["username"], $_COOKIE["password"], $_POST["day"]);

        echo print_r($data);
    }
    else if ($_POST["time_period"] == "week"){
        echo $_POST["start_of_week"];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View History</title>
        <link rel="stylesheet" href="/home/navbar.css">
    </head>
    <body>
        <?php include '../../home/nav.php';?>
    </body>
</html>