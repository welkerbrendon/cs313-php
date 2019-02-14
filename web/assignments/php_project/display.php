<?php  
    require('obtaining_data_functions.php');

    $data = NULL;
    if($_POST["time_period"] == "MostRecentDay"){
        $data = get_most_recent_day($_COOKIE["username"], $_COOKIE["password"]);
    }
    else if($_POST["time_period"] == "day") {
        if($_POST["day"]){
            $data = get_given_day($_COOKIE["username"], $_COOKIE["password"], $_POST["day"]);
        }
        else {
            header("Location: view_schedule_data.php");
        }
    }
    else if ($_POST["time_period"] == "week"){
        if($_POST["start_of_week"]){
            $start_of_week = $_POST["start_of_week"];
            $end_of_week = new DateTime($start_of_week);
            $end_of_week->add(new DateInterval('P6D'));
            $end_of_week = date_format($end_of_week, "Y-m-d");

            $data = get_days_in_window($_COOKIE["username"], $_COOKIE["password"], $start_of_week, $end_of_week);
        }
        else {
            header("Location: view_schedule_data.php");
        }
    }
    else if ($_POST["time_period"] == "month"){
        if($_POST["month"]){
            $start_of_month = $_POST["month"] . "-01";
            $end_of_month = $_POST["month"] . "-31";

            $data = get_days_in_window($_COOKIE["username"], $_COOKIE["password"], $start_of_month, $end_of_month);
        }
        else {
            header("Location: view_schedule_data.php");
        }
    }
    else {
        if($_POST["start_date"] && $_POST["end_date"]){
            $data = get_days_in_window($_COOKIE["username"], $_COOKIE["password"], $_POST["start_date"], $_POST["end_date"]);
        }
        else {
            header("Location: view_schedule_data.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View History</title>
        <link rel="stylesheet" href="/home/navbar.css">
        <link rel="stylesheet" href="display_data.css">
    </head>
    <body>
        <?php 
            include '../../home/nav.php';
            $date = NULL;
            foreach($data as $row){
                if($row["given_day"] != $date){
                    if($date != NULL){
                        echo "</table></div>";
                    }
                    $date = $row["given_day"];
                    $date_time = DateTime::createFromFormat("Y-m-d", $date);
                    echo "<h1>" . $date_time->format("F d, Y") . "</h1><div id='table'><table border='solid black 1px'>
                    <tr><th>Start Time</th>
                    <th>End Time</th>
                    <th>Productive</th>
                    <th>Activity Type</th>
                    <th>Notes</th></tr>";
                }
                $start_time = $row["start_time"];
                $end_time = $row["end_time"];
                $productive = $row["productive"] == 1 ? "True" : "False";
                $activity_type = $row["activity_type"];
                $note = $row["notes"];

                echo "<tr>
                <td>$start_time</td>
                <td>$end_time</td>
                <td>$productive</td>
                <td>$activity_type</td>
                <td>$note</td>
                </tr>";
            }
        ?>
    </body>
</html>