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
    
    $uuid_query = $db->prepare("SELECT user_id 
                                FROM user_info 
                                WHERE username='$username' 
                                AND account_password='$password'");
    $uuid_query->execute();
    $user_id_array = $uuid_query->fetch(PDO::FETCH_ASSOC);
    $user_id = $user_id["user_id"];

    echo($user_id_array);
    //echo($user_id);

    // $data = NULL;
    // if($_POST["time_period"] == "MostRecentDay"){
    //     $most_recent_given_day = NULL;
    //     $i = -1;
    //     while($most_recent_given_day == NULL){
    //         $i++;
    //         $comparable_date = date('Y-m-d', strtotime("-$i days"));
    //         $find_day = $db->prepare("SELECT given_day 
    //                                   FROM activity 
    //                                   WHERE given_day='$comparable_date'");
    //         $find_day->execute();
    //         $most_recent_given_day = $find_day->fetch(PDO::FETCH_ASSOC);
    //         $most_recent_given_day = $most_recent_given_day["given_day"];
    //     }
    //     try{
    //     $query = $db->prepare("SELECT start_time, end_time, productive 
    //                            FROM activity 
    //                            WHERE user_id=Cast('" . $user_id . "' as UUID) 
    //                            AND given_day=Cast('$most_recent_given_day' as Date)");

    //     $query->execute();
    //     $data = $query->fetchAll(PDO::FETCH_ASSOC);

    //     echo print_r($data);
    //     }
    //     catch (Exception $e){
    //         echo($e);
    //     }
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