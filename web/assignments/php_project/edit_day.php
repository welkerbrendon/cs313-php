<?php
    require('obtaining_data_functions.php');
    $data = get_given_day($_COOKIE["username"], $_COOKIE["password"], $_GET["day"]);
    
    echo print_r($data);
    ?>
    <?php
    /*$date = DateTime::createFromFormat("Y-m-d", $data[0]["given_day"]);
    $date = $date->format("F d, Y");

    $start_time_options = "";
    $end_time_options = "";
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

    $db = connect();

    $statement = $db->query("SELECT type_name FROM activity_type");

    $activity_type_html = "";
    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $row){
        $type_name = $row["type_name"];
        $activity_type_html .= "<option value='$type_name'>$type_name</option>";
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit day</title>
    </head>
    <body>
    <form>
        <div>
            <table>
                <?php
                    echo "<h1>$date</h1>";
                    echo "<tr><th>Start Time</th>
                        <th>End Time</th>
                        <th>Productive</th>
                        <th>Activity Type</th>
                        <th>Notes</th></tr>";
                    
                    foreach($data as $row){
                        $start_time = $row["start_time"];
                        $end_time = $row["end_time"];
                        $productive = $row["productive"];
                        $activity_type = $row["type_name"];
                        $note = $row["notes"];

                        $start_time_options = "<select name='start_time[]'><option value='' selected disabled hidden>$start_time</option>" . $start_time_options;
                        $end_time_options = "<select name='end_time[]'><option value='' selected disabled hidden>$end_time</option>" . $end_time_options;
                        
                        $productive_html = "";
                        if($productive == 1){
                            $productive_html = "<input type='checkbox' name='productive[]' value='true' checked>True<br>
                                <input type='checkbox' name='productive[]' value='false'>False";
                        }
                        else {
                            $productive_html = "<input type='checkbox' name='productive[]' value='true'>True<br>
                                <input type='checkbox' name='productive[]' value='false' checked>False";
                        }

                        $activity_type_html = "<select name='activity_type[]'><option value='' selected disabled hidden>$activity_type</option>" . $activity_type_html;

                        echo "<tr>
                        <td>$start_time_options</td>
                        <td>$end_time_options</td>
                        <td>$productive_html</td>
                        <td>$activity_type_html</td>
                        <td>
                            <label for='note'>Notes: (optional)<br></label>
                            <textarea name='notes[]' id='note' rows='4' cols='75'>$note</textarea>
                        </td>
                        </tr>";
                    }
                ?>
                <input type="submit">
            </table>
        </div>
    </form>
    </body>
</html>