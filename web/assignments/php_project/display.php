<?php  
    if(!isset($_COOKIE["username"])){
        header("Location: sign_in.php");
    }
    require('connect_to_db.php');
    $db = connect();

    $data = NULL;
    if($_POST["time_period"] == "MostRecentDay"){
        $given_day = $db->lastInsertId("day_given_day");
        $query = $db->prepare("SELECT start_time end_time productive FROM activity 
        INNER JOIN user_info ON user_info.user_name = '" . $_COOKIE["username"] . "', activity.user_id = user_info.user_id, activity.given_day = $given_day");

        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        echo print_r($data);
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