<?php
    require("connect_to_db.php");
    $db = connect();

    // $select_statement = $db->prepare("SELECT user_id FROM user_info WHERE username='welkerbrendon'");
    // $select_statement->execute();
    // $uuid = $select_statement->fetch(PDO::FETCH_ASSOC);

    // $select_statement = $db->prepare("SELECT given_day FROM day");
    // $select_statement->execute();
    // $days = $select_statement->fetchAll(PDO::FETCH_ASSOC);
    // $list_of_days = array();
    // foreach($days as $index){
    //     array_push($list_of_days, $index["given_day"]);
    // }

    // $starting_statement = "INSERT INTO activity (activity_id, user_id, given_day, start_time, end_time, productive) VALUES ";
    // foreach($list_of_days as $given_day){
    //     echo "$given_day<br>";
    //     $hour = 20;
    //     for($i = 0; $i < 12; $i++){
    //         echo "$i<br>";
    //         $productive = "false";
    //         if(rand(0, 1) == 1){
    //             $productive = "true";
    //         }
    //         echo "$productive<br>";
    //         $start_hour = $hour - $i - 1;
    //         $end_hour = $hour - $i;
    //         $end_time =  "$end_hour:00";
    //         $start_time = "$start_hour:00";
    //         $final_statement = $starting_statement . "(uuid_generate_v4(), Cast('" . $uuid["user_id"] . "' as UUID), Cast('$given_day' as Date), Cast('$start_time' as Time), Cast('$end_time' as Time), Cast('$productive' as Boolean))";
            
    //         echo $final_statement;

    //         $insert_statement = $db->prepare($final_statement);
    //         try{
    //         $insert_statement->execute();
    //         }
    //         catch (Exception $e){
    //             echo "$e<br>";
    //         }
    //     }

    // }

    $given_day = NULL;
    $starting_statement = "INSERT INTO day (given_day, user_id, created_at, last_updated) VALUES ";
    for($i = 1; $i < 45; $i++){
        $given_day = date('Y-m-d', strtotime("-$i days"));
        $formatted_day = date_format($given_day, "YYYY-MM-DD");
        $full_statement = $starting_statement . " (Cast('" . $given_day . "' as Date), Cast('" . $uuid['user_id'] . "' as UUID), now(), now())";
        $insert_statement = $db->prepare($full_statement);
        try {
        $insert_statement->execute();
        }
        catch (Exception $e) {
            echo($e);
            echo("<br>");
        }

        $select_statement = $db->prepare("SELECT * FROM day");
        $select_statement->execute();
        $days = $select_statement->fetchAll(PDO::FETCH_ASSOC);
        echo "Success!";
    } 
?>