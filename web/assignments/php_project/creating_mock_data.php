<?php
    require("connect_to_db.php");
    $db = connect();

    $insert_statement = $db->prepare("INSERT INTO user_info (
        user_id, username, account_password, last_active_time, creation_time)
        VALUES (uuid(), welkerbrendon, welkerbrendon, now(), now()");
    $insert_statement->execute();
    $insert_uuid = $insert_statement->fetchAll(PDO::FETCH_ASSOC);

    $insert_statement = $db->prepare("SELECT user_id FROM user_info");
    $insert_statement->execute();
    $uuid = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo "Inserted UUID: $insert_uuid";
    echo "Recieved UUID: $uuid";
?>