<?php
    require_once("connect_to_db.php");
    $db = connect();

    $start_times = $_POST["start_time"];
    $end_times = $_POST["end_time"];
    $productive = $_POST["productive"];
    $activity_type = $_POST["activity_type"];
    $notes = $_POST["notes"];

    if(sizeOf($start_times) == sizeof($end_times) && sizeof($productive) == sizeof($activity_type) && sizeOf($end_times) == sizeof($productive)){
        echo "Good Job!";
    }
    else {
        echo "Way to go! You done messed up!";
    }
?>