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

    if($_POST["time_period"] == "MostRecentDay"){
        $data = get_most_recent_day($_COOKIE["username"], $_COOKIE["password"]);
        echo $data;
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