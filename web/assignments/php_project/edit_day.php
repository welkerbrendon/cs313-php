<?php
    require_once("check_if_logged_in.php");
    check_if_logged_in();
    
    require('obtaining_data_functions.php');
    $data = get_given_day($_COOKIE["username"], $_COOKIE["password"], $_GET["day"]);
    $given_day = $data[0]["given_day"];
    $given_day = DateTime::createFromFormat("Y-m-d", $given_day);
    $given_day = $given_day->format("F d, Y");

    $db = connect();
    $statement = $db->query("SELECT type_name FROM activity_type");
    $activity_type_names = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Edit Day</title>
        <link rel="stylesheet" href="/home/navbar.css">
        <link rel="stylesheet" href="edit_day.css">
    </head>
    <body>
        <?php include '../../home/nav.php'; ?>
        <div class="body">
            <form action="update_day.php" metho="post">
                <div id="heading"><h1><?php echo "<input type='text' value='$given_day' name='given_day' readonly>" ?><h1><div>
                <table border=1>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Productive</th>
                        <th>Activity Type</th>
                        <th>Notes</th>
                    </tr>
                    <?php
                        foreach($data as $row){
                            $start_time = $row["start_time"];
                            $end_time = $row["end_time"];
                            
                            $start_time_array = explode(":", $start_time);
                            $end_time_array = explode(":", $start_time);

                            $start_time_hour = intval($start_time_array[0]);
                            $end_time_hour = intval($end_time_array[0]);
                            
                            $start_time = $start_time_hour == 0 ? 12 : ($start_time_hour > 12 ? $start_time_hour - 12 : $start_time_hour);
                            $start_time .= ":" . $start_time_array[1];
                            $start_time .= $start_time_hour < 12 || $start_time_hour == 24 ? "am" : "pm";

                            $end_time = $end_time_hour == 0 ? 12 : ($end_time_hour > 12 ? $end_time_hour - 12 : $end_time_hour);
                            $end_time .= ":" . $end_time_array[1];
                            $end_time .= $end_time_hour < 12 || $end_time_hour == 24 ? "am" : "pm";

                            $productive = $row["productive"] == 1 ? "True" : "False";
                            $activity_type = $row["type_name"];
                            $note = $row["notes"];
                            
                            $activity_type_html = "<select name='activity_type[]'><option value='' selected disabled hidden>$activity_type</option>";
                            foreach($activity_type_names as $row){
                                $type_name = $row["type_name"];
                                $activity_type_html .= "<option value='$type_name'>$type_name</option>";
                            }
                            
                            if($productive == 1){
                                $productive_html = "<input type='checkbox' name='productive[]' value='true' checked>True<br>
                                                <input type='checkbox' name='productive[]' value='false' checked>False";
                            }
                            else {
                                $productive_html = "<input type='checkbox' name='productive[]' value='true'>True<br>
                                                <input type='checkbox' name='productive[]' value='false' checked>False";
                            }

                            $start_time_options = "<select name='start_time[]'><option value='' selected disabled hidden>$start_time</option>";
                            $end_time_options = "<select name='end_time[]'><option value='' selected disabled hidden>$end_time</option>";
                            for($i = 0; $i <= 1440; $i += 30){
                                $hour = intval($i / 60);
                                $am_pm = $hour < 12 || $hour == 24 ? "am" : "pm";
                                $adapted_hour = $hour == 0 ? 12 : ($hour > 12 ? $hour - 12 : $hour);

                                $minutes = ($i % 60 == 0) ? "00" : "30";

                                $readable_time = "$adapted_hour:$minutes $am_pm";
                                $time = "$hour:$minutes";
                                $time_as_option = "<option value='$time'>$readable_time</option>";

                                $start_time_options .= $time_as_option;
                                $end_time_options .= $time_as_option;
                            }

                            $start_time_options .= "</select>";
                            $end_time_options .= "</select>";

                            echo "<tr>
                            <td>$start_time_options</td>
                            <td>$end_time_options</td>
                            <td>$productive_html</td>
                            <td>$activity_type_html</td>
                            <td>
                                <label for='note'>Notes: (optional)<br></label>
                                <textarea name='notes[]' id='note' rows='4' cols='75'>$note</textarea>
                            </td></tr>";
                        }
                    ?>
                </table>
                <input type="submit">
            </form>
        </div>
    </body>
</html>