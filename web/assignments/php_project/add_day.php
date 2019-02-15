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
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Schedule Tracker</title>
        <link rel="stylesheet" href="/home/navbar.css">
    </head>
    <body>
        <div>
            <?php include '../../home/nav.php'; ?>
            <h1>Fill in the following information and click submit when done.</h1>
            <form>
                <label for="date">Date of Activities</label>
                <input type="date" id="date" name="date"><br>
                <table border=1>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Productive</th>
                        <th>Activity Type</th>
                        <th>Notes</th>
                    </tr>
                    <?php
                        for($i = 0; $i < 1440; $i += 30){
                            $end_time_in_minutes = $i + 30;
                            $hour = intval($i / 60);
                            $am_pm = ($hour < 12) ? "am" : "pm";
                            $hour = ($hour < 1) ? 12 : $hour;
                            $minutes = $i % 60;
                            $start_time = "$hour:$minutes $am_pm";
                            $hour = intval($end_time_in_minutes / 60);
                            $am_pm = ($hour < 12) ? "am" : "pm";
                            $hour = ($hour < 1) ? 12 : $hour;
                            $minutes = $end_time_in_minutes % 60;
                            $end_time = "$hour:$minutes $am_pm";
                            echo 
                            "<tr>
                                <td>$start_time</td>
                                <td>$end_time</td>
                                <td>$productive_html</td>
                                <td>$activity_type_html</td>
                                <td><label for='notes'>Notes about activity</label><br><textarea name='notes' id='notes'></td>
                            </tr>";
                        }
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>