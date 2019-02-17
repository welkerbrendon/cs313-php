<?php
    require("connect_to_db.php");
    $db = connect();

    $select_statement = $db->prepare("SELECT id FROM user_info WHERE username='welkerbrendon'");
    $select_statement->execute();
    $uuid = $select_statement->fetch(PDO::FETCH_STR)[0];

    // $select_statement = $db->prepare("SELECT id FROM day");
    // $select_statement->execute();
    // $days = $select_statement->fetchAll(PDO::FETCH_ASSOC);
    // $list_of_days = array();
    // foreach($days as $index){
    //     array_push($list_of_days, $index["id"]);
    // }

    // $uuid = $uuid["id"];
    // $activity_type = NULL;
    // $start_time = NULL;
    // $end_time = NULL;
    // $day_id = NULL;
    // $activity_type_id = NULL;
    // $note = NULL;
    // $productive = NULL;

    // $random_note = "This is a random note. It would take way too much work to create a bunch of different notes to be matched up randomly so here is one blanket, fake note.";

    // $insert_statement = $db->prepare("INSERT INTO activity (id, user_id, day_id, activity_type_id, start_time, end_time, productive, notes, last_updated, created_at) 
    //                                   VALUES (uuid_generate_v4(), :user_id, :day_id, :activity_type_id, :start_time, :end_time, :productive, :note, now(), now())");
    // $insert_statement->bindValue(":user_id", $uuid, PDO::PARAM_STR);
    // $insert_statement->bindParam(":day_id", $day_id, PDO::PARAM_INT);
    // $insert_statement->bindParam(":activity_type_id", $activity_type_id, PDO::PARAM_INT);
    // $insert_statement->bindParam(":start_time", $start_time, PDO::PARAM_STR);
    // $insert_statement->bindParam(":end_time", $end_time, PDO::PARAM_STR);
    // $insert_statement->bindParam(":productive", $productive, PDO::PARAM_STR);
    // $insert_statement->bindParam(":note", $note, PDO::PARAM_STR);
    // foreach($list_of_days as $id){
    //     $day_id = $id;
    //     $hour = 20;
    //     for($i = 0; $i < 12; $i++){
    //         $productive = (rand(0, 1) == 1);
    //         $note = (rand(0, 1) == 1) ? $random_note : NULL;
    //         $activity_type_id = rand(4, 15);
    //         $start_hour = $hour - $i - 1;
    //         $end_hour = $hour - $i;
    //         $end_time =  "$end_hour:00";
    //         $start_time = "$start_hour:00";
            
    //         try{
    //             $insert_statement->execute();
    //             echo "Successfully add row!<br>";
    //         }
    //         catch (Exception $e){
    //             echo "$e<br>";
    //         }
    //     }

    // }

    $given_day = NULL;
    $id = NULL;

    $insert_statement = $db->prepare("INSERT INTO day (id, given_day, user_id, last_updated, created_at) 
                                      VALUES (:id, :day, :user_id, now(), now())");

    $insert_statement->bindValue(":user_id", $uuid, PDO::PARAM_STR);

    $insert_statement->bindParam(":id", $id, PDO::PARAM_STR);
    $insert_statement->bindParam(":day", $given_day, PDO::PARAM_STR);

    for($i = 1; $i < 45; $i++){
        $given_day = date('Y-m-d', strtotime("-$i days"));
        $id = "$given_day-$uuid";
        
        $insert_statement->execute();
    } 

    echo "Check db!";
?>