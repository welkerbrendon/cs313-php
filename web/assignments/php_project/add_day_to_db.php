<?php
    require_once("obtaining_data_functions.php");
    $db = connect();

    $day = $_POST["date"];
    $start_times = $_POST["start_time"];
    $end_times = $_POST["end_time"];
    $productive = $_POST["productive"];
    $activity_type = $_POST["activity_type"];
    $notes = $_POST["notes"];

    echo "$day<br>";
    echo "$start_times<br>";
    echo "$end_times<br>";
    echo "$productive<br>";
    echo "$activity_type<br>";
    echo "$notes<br>";

    /*if(sizeOf($start_times) == sizeof($end_times) && sizeof($productive) == sizeof($activity_type) && sizeOf($end_times) == sizeof($productive)){
        $user_id = get_user_id($_COOKIE["username"], $_COOKIE["password"], $db);

        $day_id = insert_new_day($user_id, $db);
        $type_id = NULL;
        $start = NULL;
        $end = NULL;
        $productive = NULL;
        $note = NULL;

        $activity_statement = $db->prepare("INSERT INTO activity (id, user_id, day_id, activity_type_id, start_time, end_time, productive, notes, last_updated, created_at)
                                            VALUES ('uuid_generate_v4()', :user_id, :day_id, :type_id, :start_time, :end_time, :productive, :note, now(), now())");

        $activity_statement->bindValue(":user_id", $user_id, PDO::PARAM_STR);
        $activity_statement->bindValue(":day_id", $day_id, PDO::PARAM_INT);

        $activity_statement->bindParam(":type_id", $type_id, PDO::PARAM_INT);
        $activity_statement->bingParam(":start_time", $start, PDO::PARAM_STR);
        $activity_statement->bingParam(":end_time", $end, PDO::PARAM_STR);
        $activity_statement->bingParam(":productive", $productive, PDO::PARAM_STR);
        $activity_statement->bingParam(":note", $note, PDO::PARAM_STR);

        for($i = 0; $i < sizeOf($start_times); $i++){
            $type_id = get_type_id($activity_type[$i], $db);
            $start = $start_times[$i];
            $end = $end_times[$i];
            $productive = $productive[$i];
            $note = $notes[$i];

            $activity_statement->execute();
        }

        header("Location: add_day.php");
        exit;
    }
    else {
        echo "Way to go! You done messed up!";
    }

    function insert_new_day($user_id, $db){
        $day_statement = $db->prepare("INSERT INTO day (given_day, user_id, created_at, last_updated)
                                       VALUES (:date, :user_id, now(), now())");
        $day_statement->bindValue(":date", $day, PDO::PARAM_STR);
        $day_statement->bindValue(":user_id", $user_id, PDO::PARAM_STR);

        $day_statement->execute();
        return $day_statement->lastInsertId();
    }

    function get_type_id($type_name, $db){
        $type_statement = $db->prepare("SELECT id 
                                        FROM activity_type 
                                        WHERE type_name='$type_name'
                                        AND universal='true'");
        $type_statement->execute();
        return $type_statement->fetch(PDO::FETCH_INT);
    }*/
?>