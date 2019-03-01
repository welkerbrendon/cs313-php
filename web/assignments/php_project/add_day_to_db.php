<?php
    require_once("obtaining_data_functions.php");
    $db = connect();

    $day = $_POST["date"];
    $start_times = $_POST["start_time"];
    $end_times = $_POST["end_time"];
    $productive_array = $_POST["productive"];
    $activity_type = $_POST["activity_type"];
    $notes = $_POST["notes"];

    $srt_eq_end = sizeOf($start_times) == sizeof($end_times);
    $prod_eq_act = sizeof($productive_array) == sizeof($activity_type);
    $end_eq_prod = sizeOf($end_times) == sizeof($productive_array);
    $act_eq_srt = sizeof($activity_type) == sizeOf($start_times);

    if($srt_eq_end && $prod_eq_act && $end_eq_prod){
        $user_id = get_user_id($_COOKIE["username"], $_COOKIE["password"], $db);

        /*$day_id = */insert_new_day($user_id, $day, $db);}
        /*$type_id = NULL;
        $start = NULL;
        $end = NULL;
        $productive = NULL;
        $note = NULL;

        $activity_statement = $db->prepare("INSERT INTO activity (id, user_id, day_id, activity_type_id, start_time, end_time, productive, notes, last_updated, created_at)
                                            VALUES (uuid_generate_v4(), :user_id, :day_id, :type_id, :start_time, :end_time, :productive, :note, now(), now())");

        $activity_statement->bindValue(":user_id", $user_id, PDO::PARAM_STR);
        $activity_statement->bindValue(":day_id", $day_id, PDO::PARAM_INT);

        $activity_statement->bindParam(":type_id", $type_id, PDO::PARAM_INT);
        $activity_statement->bindParam(":start_time", $start, PDO::PARAM_STR);
        $activity_statement->bindParam(":end_time", $end, PDO::PARAM_STR);
        $activity_statement->bindParam(":productive", $productive, PDO::PARAM_STR);
        $activity_statement->bindParam(":note", $note, PDO::PARAM_STR);

        for($i = 0; $i < sizeOf($start_times); $i++){
            $type_id = get_type_id($activity_type[$i], $db);
            $start = $start_times[$i];
            $end = $end_times[$i];
            $productive = $productive_array[$i];
            $note = $notes[$i];

            $activity_statement->execute();
        }

        header("Location: schedule_tracker.php");
        exit;
    }
    else if ($srt_eq_end && $act_eq_srt && !$prod_eq_act){
        setcookie("bad_input", "productive", time() + 2);
        header("Location: add_day.php");
        exit;
    }
    else if(!$srt_eq_end){
        setcookie("bad_input", "times", time() + 2);
        header("Location: add_day.php");
        exit;
    }
    else if($srt_eq_end && $end_eq_prod && !$act_eq_srt){
        setcookie("bad_input", "activity_type", time() + 2);
        header("Location: add_day.php");
        exit;
    }
    else if($prod_eq_act && !$act_eq_srt){
        setcookie("bad_input", "start_time", time() + 2);
        header("Location: add_day.php");
        exit;
    }
    else if($prod_eq_act && !$end_eq_prod){
        setcookie("bad_input", "end_time", time() + 2);
        header("Location: add_day.php");
        exit;
    }
    else if(!$day){
        setcookie("bad_input", "no_date", time() + 2);
        header("Location: add_day.php");
        exit;
    }
    else {
        setcookie("bad_input", "unknown", time() + 2);
        header("Location: add_day.php");
        exit;
    }*/

    function insert_new_day($user_id, $day, $db){
        $day_already_exists = $db->prepare("SELECT id FROM day WHERE id=:day_id");
        $day_already_exists->bindValue(":day_id", "$day_id-$user_id", PDO::PARAM_STR);
        $day_already_exists->execute();

        echo $day_already_exists->fetch(PDO::FETCH_NUM);
        if($day_already_exists->fetch(PDO::FETCH_NUM)){
            setcookie("bad_input", "already_exists", time() + 2);
            setcookie("day", $day, time() + 2);
            header("Location: add_day.php");
            exit;
        }/*
        $day_statement = $db->prepare("INSERT INTO day (id, given_day, user_id, created_at, last_updated)
                                       VALUES (:day_id, :date, :user_id, now(), now())");
        $day_statement->bindValue(":day_id", "$day-$user_id", PDO::PARAM_STR);
        $day_statement->bindValue(":date", $day, PDO::PARAM_STR);
        $day_statement->bindValue(":user_id", $user_id, PDO::PARAM_STR);

        $day_statement->execute();

        $day_statement = $db->prepare("SELECT id 
                                       FROM day 
                                       WHERE given_day=:day
                                       AND user_id=:user_id");
        $day_statement->bindValue(":day", $day, PDO::PARAM_STR);
        $day_statement->bindValue(":user_id", $user_id, PDO::PARAM_STR);

        $day_statement->execute();

        return $day_statement->fetch(PDO::FETCH_NUM)[0];*/
    }

    function get_type_id($type_name, $db){
        $type_statement = $db->prepare("SELECT id 
                                        FROM activity_type 
                                        WHERE type_name='$type_name'");
        $type_statement->execute();
        return $type_statement->fetch(PDO::FETCH_NUM)[0];
    }
?>