<?php  
    require('obtaining_data_functions.php');

    $data = NULL;
    if($_GET["time_period"] == "MostRecentDay"){
        $data = get_most_recent_day($_COOKIE["username"], $_COOKIE["password"]);
    }
    else if($_GET["time_period"] == "day") {
        if($_GET["day"]){
            $data = get_given_day($_COOKIE["username"], $_COOKIE["password"], $_GET["day"]);
        }
        else {
            header("Location: view_schedule_data.php");
        }
    }
    else if ($_GET["time_period"] == "week"){
        if($_GET["start_of_week"]){
            $start_of_week = $_GET["start_of_week"];
            $end_of_week = new DateTime($start_of_week);
            $end_of_week->add(new DateInterval('P6D'));
            $end_of_week = date_format($end_of_week, "Y-m-d");

            $data = get_days_in_window($_COOKIE["username"], $_COOKIE["password"], $start_of_week, $end_of_week);
        }
        else {
            header("Location: view_schedule_data.php");
        }
    }
    else if ($_GET["time_period"] == "month"){
        if($_GET["month"]){
            $start_of_month = $_GET["month"] . "-01";

            $end_of_month = NULL;
            $month = intval(date_format(new DATETIME($_GET["month"]), "m"));
            switch($month){
                case 2:
                    $end_of_month = $_GET["month"] . "-28";
                    break;
                case 4:
                case 6:
                case 9:
                case 11:
                    $end_of_month = $_GET["month"] . "-30";
                    break;
                default:
                    $end_of_month = $_GET["month"] . "-31";
                    break;
            }

            $data = get_days_in_window($_COOKIE["username"], $_COOKIE["password"], $start_of_month, $end_of_month);
        }
        else {
            header("Location: view_schedule_data.php");
        }
    }
    else {
        if($_GET["start_date"] && $_GET["end_date"]){
            $data = get_days_in_window($_COOKIE["username"], $_COOKIE["password"], $_GET["start_date"], $_GET["end_date"]);
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
                        echo "</table><button onclick='edit_day.php?day='$date'>Edit Day</button></div>";
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
                $activity_type = $row["type_name"];
                $note = $row["notes"];

                $start_time_array = explode(":", $start_time);
                $end_time_array = explode(":", $end_time);

                $start_time_hour = intval($start_time_array[0]);
                $end_time_hour = intval($end_time_array[0]);
                        
                $start_time = $start_time_hour == 0 ? 12 : ($start_time_hour > 12 ? $start_time_hour - 12 : $start_time_hour);
                $start_time .= ":" . $start_time_array[1];
                $start_time .= $start_time_hour < 12 || $start_time_hour == 24 ? "am" : "pm";

                $end_time = $end_time_hour == 0 ? 12 : ($end_time_hour > 12 ? $end_time_hour - 12 : $end_time_hour);
                $end_time .= ":" . $end_time_array[1];
                $end_time .= $end_time_hour < 12 || $end_time_hour == 24 ? "am" : "pm";

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