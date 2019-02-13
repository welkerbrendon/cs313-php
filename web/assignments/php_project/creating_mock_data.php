<?php
    require("connect_to_db.php");
    $db = connect();

    $select_statement = $db->prepare("SELECT user_id FROM user_info WHERE username='welkerbrendon'");
    $select_statement->execute();
    $uuid = $select_statement->fetch(PDO::FETCH_ASSOC);

    $given_day = NULL;
    $starting_statement = "INSERT INTO day (given_day, user_id, update_time, creation_time) VALUES ";
    for($i = 0; $i < 43; $i++){
        $given_day = date('d.m.y', strtotime("-$i days"));
        $now = time();
        $full_statement = $starting_statement . " ($given_day, " . $uuid['user_id'] . ", $now, $now)";
        echo $full_statement;
        //$insert_statement = $db->prepare($full_statement);
        //$insert_statement->execute();

        $select_statement = $db->prepare("SELECT * FROM day");
        $select_statement->execute();
        $days = $select_statement->fetchAll(PDO::FETCH_ASSOC);
        echo print_r($days["given_day"]);
        echo "->";
        echo print_r($days["user_id"]);
        echo "<br>";
    } 
?>