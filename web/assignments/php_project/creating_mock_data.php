<?php
    require("connect_to_db.php");
    $db = connect();

    $select_statement = $db->prepare("SELECT user_id FROM user_info WHERE username='welkerbrendon'");
    $select_statement->execute();
    $uuid = $select_statement->fetch(PDO::FETCH_ASSOC);

    $select_statement = $db->prepare("SELECT day_id FROM day");
    $select_statement->execute();
    $days = $select_statement->fetchAll(PDO::FETCH_ASSOC);
    $list_of_days = array();
    foreach($days as $index){
        array_push($list_of_days, $index["day_id"]);
    }

    $activity_types = array("work", "class", "homework", "exercise", "eat", "play", "church", "relax", "sleep", "dates", "errands", "chores", "family");
    $random_note = "This is a random note. It would take way too much work to create a bunch of different notes to be matched up randomly so here is one blanket, fake note.";

    $starting_statement = "INSERT INTO activity (activity_id, user_id, day_id, start_time, end_time, productive, activity_type, notes, last_updated, created_at) VALUES ";
    foreach($list_of_days as $day_id){
        $hour = 20;
        for($i = 0; $i < 12; $i++){
            $productive = "false";
            if(rand(0, 1) == 1){
                $productive = "true";
            }
            $note = NULL;
            if(rand(0, 1) == 1){
                $note = $random_note;
            }
            $type_selected = $activity_types[rand(0, 12)];
            $start_hour = $hour - $i - 1;
            $end_hour = $hour - $i;
            $end_time =  "$end_hour:00";
            $start_time = "$start_hour:00";
            $final_statement = $starting_statement . "(uuid_generate_v4(), 
                                                       Cast('" . $uuid["user_id"] . "' as UUID), 
                                                       Cast('$day_id' as Date), 
                                                       Cast('$start_time' as Time), 
                                                       Cast('$end_time' as Time), 
                                                       Cast('$productive' as Boolean),
                                                       $type_selected, $note, now(), now())";
            
            $insert_statement = $db->prepare($final_statement);
            try{
            $insert_statement->execute();
            }
            catch (Exception $e){
                echo "$e<br>";
            }

            echo "Successfully add row.<br>";
        }

    }

    // $given_day = NULL;
    // $starting_statement = "INSERT INTO day (given_day, user_id, created_at, last_updated) VALUES ";
    // for($i = 1; $i < 45; $i++){
    //     $given_day = date('Y-m-d', strtotime("-$i days"));
    //     $formatted_day = date_format($given_day, "YYYY-MM-DD");
    //     $full_statement = $starting_statement . " (Cast('" . $given_day . "' as Date), Cast('" . $uuid['user_id'] . "' as UUID), now(), now())";
    //     $insert_statement = $db->prepare($full_statement);
    //     try {
    //     $insert_statement->execute();
    //     }
    //     catch (Exception $e) {
    //         echo($e);
    //         echo("<br>");
    //     }

    //     $select_statement = $db->prepare("SELECT * FROM day");
    //     $select_statement->execute();
    //     $days = $select_statement->fetchAll(PDO::FETCH_ASSOC);
    //     echo "Success!";
    // } 
?>