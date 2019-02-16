<?php
    require_once("connect_to_db.php");
    $db = connect();

    $start_times = $_POST["start_time"];
    $end_times = $_POST["end_time"];
    $productive = $_POST["productive"];
    $activity_type = $_POST["activity_type"];
    $notes = $_POST["notes"];

    echo "$start_times<br>";
    echo "$end_times<br>";
    echo "$productive<br>";
    echo "$activity_type<br>";
    echo "$notes<br>";

?>