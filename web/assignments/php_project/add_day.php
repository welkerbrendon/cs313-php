<?php
    require_once("check_if_logged_in.php");
    check_if_logged_in();

    require_once("connect_to_db.php");
    $db = connect();

    $statement = $db->query("SELECT type_name FROM activity_type");

    $activity_type_html = "";
    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $row){
        $type_name = $row["type_name"];
        $activity_type_html .= "<input type='radio' name='type' value='$type_name'>$type_name  ";
    }

    $productive_html = "<input type='radio' name='productive' value='true'>True<br>
                        <input type='radio' name='productive' value='false'>False";

    $start_time_options = "<select name='start_time'>";
    $end_time_options = "<select name='end_time'>";
    for($i = 0; $i <= 1440; $i += 30){
        $hour = intval($i / 60);
        $am_pm = $hour < 12 ? "am" : "pm";
        $hour = $hour == 0 ? 12 : ($hour > 12 ? $hour - 12 : $hour);

        $minutes = ($i % 60 == 0) ? "00" : "30";

        $time = "$hour:$minutes $am_pm";
        $time_as_option = "<option value='$time'>$time</option>";

        $start_time_options .= $time_as_option;
        $end_time_options .= $time_as_option;
    }

    $start_time_options .= "</select>";
    $end_time_options .= "</select>";

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
                        for($i = 0; $i < 6; $i++){
                            echo 
                            "<tr>
                                <td>$start_time_options</td>
                                <td>$end_time_options</td>
                                <td>$productive_html</td>
                                <td>$activity_type_html</td>
                                <td>
                                    <label for='note'>Notes: <br></label>
                                    <textarea name='note' id='note' rows='4' cols='50'></textarea>
                                </td>
                            </tr>";
                        }
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>