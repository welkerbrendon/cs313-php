<?php
    require("connect_to_db.php");
    $db = connect();

    $select_statement = $db->prepare("SELECT user_id FROM user_info WHERE username='welkerbrendon'");
    $select_statement->execute();
    $uuid = $select_statement->fetch(PDO::FETCH_ASSOC);

    $given_day = NULL;
    $string_insert_statement = "INSERT INTO day given_day, user_id, updated_time, creation_time VALUES";
    for($i = 0; $i < 43; $i++){
        $given_day = date('d.m.y', strtotime("-$i days"));
        $insert_statement = $db->prepare("$string_insert_statement" . " $given_day, $uuid['user_id'], now(), now()");
        // $insert_statement->execute();

        // $select_statement = $db->prepare("SELECT * FROM day");
        // $select_statement->execute();
        // echo print_r($select_statement->fetchAll(PDO::FETCH_ASSOC)) ;
        // echo "<br>";
    } 
?>