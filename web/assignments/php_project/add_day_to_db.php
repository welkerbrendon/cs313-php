<?php
    require_once("connect_to_db.php");
    $db = connect();

    $start_times = $_POST["start_time"];
    $end_times = $_POST["end_time"];
    $productive = $_POST["productive"];
    $activity_type = $_POST["activity_type"];
    $notes = $_POST["notes"];

    echo print_r($start_times);
    echo "<br>";
    echo print_r($end_times);
    echo "<br>";
    echo print_r($productive);
    echo "<br>";
    echo print_r($activity_type);
    echo "<br>";
    echo print_r($notes);
    echo "<br>";
?>