<?php
    require("connect_to_db.php");
    $db = connect();

    $select_statement = $db->prepare("SELECT user_id FROM user_info WHERE username='welkerbrendon'");
    $select_statement->execute();
    $uuid = $select_statement->fetch(PDO::FETCH_ASSOC);

    //$given_day = NULL;
    //$string_insert_statement = "INSERT INTO day VALUES ($given_day, $uuid['user_id'], now(), now())";
    // for($i = 0; $i < 12; $i++){
    //     $given_day = date('d.m.y', strtotime("-$i days"));
    //     echo "$given_day<br>";
    // } 
?>