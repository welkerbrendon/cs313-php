<?php
    require("connect_to_db.php");
    $db = connect();

    $statement = $db->query("SELECT type_name FROM activity_type");

    $activity_type_html = "";
    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $row){
        $type_name = $row["type_name"];
        $activity_type_html .= "<input type='radio' name='type' value='$type_name'>$type_name  ";
    }

    $productive_html = "<input type='radio' name='productive' value='true'>True<br>
                        <input type='radio' name='productive' value='false'>False";

    $table = "";
    for($i = 0; $i < 1440; $i = $end_time_in_minutes){
        $end_time_in_minutes = $i + 30;
        $hour = intval($i / 60);
        $am_pm = ($hour < 12) ? "am" : "pm";
        $hour = abs(($hour < 1) ? 12 : ($hour > 12) ? ($hour - 12) : $hour);
        echo "$hour<br>";
        $minutes = ($i % 60 == 0) ? "00" : "30";
        $start_time = "$hour:$minutes $am_pm";

        $hour = intval($end_time_in_minutes / 60);
        $am_pm = ($hour < 12 || $hour == 24) ? "am" : "pm";
        $hour = ($hour == 0) ? 12 : ($hour > 12) ? $hour - 12 : $hour;
        echo "$hour<br>";
        $minutes = ($end_time_in_minutes % 60 == 0) ? "00" : "30";
        $end_time = "$hour:$minutes $am_pm";

        $table .= 
        "<tr>
            <td>$start_time</td>
            <td>$end_time</td>
            <td>$productive_html</td>
            <td>$activity_type_html</td>
            <td><label for='notes'>Notes about activity</label><br><textarea name='notes' id='notes'></textarea></td>
        </tr>";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Schedule Tracker</title>
        <link rel="stylesheet" href="/home/navbar.css">
        <link rel="stylesheet" href="add_day.css">
    </head>
    <body>
        <?php include '../../home/nav.php'; ?>
        <div>
            <h1>Fill in the following information and click submit when done.</h1>
            <form>
                <label for="date"><h3>Date of Activities</label>
                <input type="date" id="date" name="date"></h3><br>
                <table border=1>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Productive</th>
                        <th>Activity Type</th>
                        <th>Notes</th>
                    </tr>
                    <?php
                        echo $table;
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>