<?php  
    if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        setcookie("username", $_COOKIE["username"], time() + (60 * 30));
        setcookie("password", $_COOKIE["password"], time() + (60 * 30));
    }
    else {
        header("Location: sign_in.php");
        exit;
    }
    require('connect_to_db.php');
    $db = connect();

    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    try{
    $uuid_query = $db->prepare("SELECT user_id FROM user_info WHERE username=$username, account_password=$password");
    $uuid_query->execute();
    $user_id = $uuid_query->fetch(PDO::FETCH_ASSOC);

    echo($user_id["user_id"]);
    }
    catch (Exception $e){
        echo $e;
    }

    // $data = NULL;
    // if($_POST["time_period"] == "MostRecentDay"){
    //     $most_recent_given_day = NULL;
    //     $i = -1;
    //     while(!$most_recent_given_day){
    //         $i++;
    //         $comparable_date = date('Y-m-d', strtotime("-$i days"))
    //         $find_day = $db->prepare("SELECT given_day FROM activity WHERE given_day=$comparable_date,")
    //     }
    //     $query = $db->prepare("SELECT start_time end_time productive FROM activity 
    //     INNER JOIN user_info ON user_info.user_name = '" . $_COOKIE["username"] . "', activity.user_id = user_info.user_id, activity.given_day = $given_day");

    //     $query->execute();
    //     $data = $query->fetchAll(PDO::FETCH_ASSOC);

    //     echo print_r($data);
    // }
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