<?php
    require('connect_to_db.php');
    $db = connect();

    $day = $_POST["date"];
    $start_times = $_POST["start_time"];
    $end_times = $_POST["end_time"];
    $productive_array = $_POST["productive"];
    $activity_type = $_POST["activity_type"];
    $notes = $_POST["notes"];

?>