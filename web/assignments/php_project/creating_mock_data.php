<?php
    require("connect_to_db.php");
    $db = connect();

    $select_statement = $db->prepare("SELECT user_id FROM user_info WHERE username='welkerbrendon'");
    $select_statement->execute();
    $uuid = $select_statement->fetch(PDO::FETCH_ASSOC);

    $given_day = NULL;
    $starting_statement = "INSERT INTO day (given_day, user_id, last_updated, creation_time) VALUES ";
    for($i = 1; $i < 44; $i++){
        $given_day = date('Y-m-d', strtotime("-$i days"));
        echo $given_day;
        echo "<br>";
        // $formatted_day = date_format($given_day, "YYYY-MM-DD");
        // $full_statement = $starting_statement . " (Cast('" . $given_day . "' as Date), Cast('" . $uuid['user_id'] . "' as UUID), now(), now())";
        // $insert_statement = $db->prepare($full_statement);
        // try {
        // $insert_statement->execute();
        // }
        // catch (Exception $e) {
        //     echo($e);
        //     echo("<br>");
        // }

        // $select_statement = $db->prepare("SELECT * FROM day");
        // $select_statement->execute();
        // $days = $select_statement->fetchAll(PDO::FETCH_ASSOC);
        // echo print_r($days["given_day"]);
        // echo "->";
        // echo print_r($days["user_id"]);
        // echo "<br>";
    } 
?>