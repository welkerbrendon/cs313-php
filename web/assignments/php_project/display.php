<?php  
    if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        setcookie("username", $_COOKIE["username"], time() + (60 * 30));
        setcookie("password", $_COOKIE["password"], time() + (60 * 30));
    }
    else {
        header("Location: sign_in.php");
        exit;
    }
    require('obtaining_data_functions.php');

    $data = NULL;
    if($_POST["time_period"] == "MostRecentDay"){
        $data = get_most_recent_day($_COOKIE["username"], $_COOKIE["password"]);
    }
    else if($_POST["time_period"] == "day") {
        $data = get_given_day($_COOKIE["username"], $_COOKIE["password"], $_POST["day"]);
    }
    else if ($_POST["time_period"] == "week"){
        $start_of_week = $_POST["start_of_week"];
        $end_of_week = new DateTime($start_of_week);
        $end_of_week->add(new DateInterval('P6D'));
        $end_of_week = date_format($end_of_week, "Y-m-d");

        $data = get_days_in_window($_COOKIE["username"], $_COOKIE["password"], $start_of_week, $end_of_week);
    }
    else if ($_POST["time_period"] == "month"){
        $start_of_month = $_POST["month"] . "-01";
        $end_of_month = $_POST["month"] . "-31";

        $data = get_days_in_window($_COOKIE["username"], $_COOKIE["password"], $start_of_month, $end_of_month);
    }
    else {
        $data = get_days_in_window($_COOKIE["username"], $_COOKIE["password"], $_POST["start_date"], $_POST["end_date"]);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View History</title>
        <link rel="stylesheet" href="/home/navbar.css">
    </head>
    <body>
        <?php 
            include '../../home/nav.php';
            $date = NULL;
            foreach($data as $row){
                if($row["given_day"] != $date){
                    if($date != NULL){
                        echo "</table>";
                    }
                    $date = $row["given_day"];
                    echo "<h1>$date</h1><table border='1'>
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