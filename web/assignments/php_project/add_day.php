<?php
    require_once("check_if_logged_in.php");
    check_if_logged_in();

    require_once("connect_to_db.php");
    $db = connect();

    $statement = $db->query("SELECT type_name FROM activity_type");

    $activity_type_html = "<select name='activity_type[]'><option value='' selected disabled hidden>--Choose Activity Type--</option>";
    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $row){
        $type_name = $row["type_name"];
        $activity_type_html .= "<option value='$type_name'>$type_name</option>";
    }

    $productive_html = "<input type='checkbox' name='productive[]' value='true'>True<br>
                        <input type='checkbox' name='productive[]' value='false'>False";

    $start_time_options = "<select name='start_time[]'><option value='' selected disabled hidden>--Start Time--</option>";
    $end_time_options = "<select name='end_time[]'><option value='' selected disabled hidden>--End Time--</option>";
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

    $error_message = NULL;
    if(isset($_COOKIE["bad_input"])){
        $error_message = "<h3 id='error'>";
        switch ($_COOKIE["bad_input"]){
            case "productive":
                $error_message .= "*Please make sure to select one and only one option for whether an activity is productive.*</h3>";
                break;
            case "times":
            case "start_time":
            case "end_time":
                $error_message .= "*Please make sure to give a start AND end time for each activity entered.*</h3>";
                break;
            case "activity_type":
                $error_message .= "*Please make sure to select an activity type for each activity entered.*</h3>";
                break;
            case "already_exists":
                $day = $_COOKIE["day"];
                $error_message .= "*That day has already been entered at some point.*</h3><p>If you wish to edit that day
                please use this link: <a href='edit_day.php?day=" . $day . ">Edit</a></p>";
                break;
            case "unknown":
                $error_message .= "*Please make sure each activity entered has a start time, end time, activity type, and 
                is either labeled as productive or unproductive.*</h3>";
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Day</title>
        <link rel="stylesheet" href="/home/navbar.css">
        <link rel="stylesheet" href="add_day.css">
        <script src="add_day.js"></script>
    </head>
    <body>
        <?php include '../../home/nav.php'; ?>
        <div>
            <h1>Fill in the following information and click save when done.</h1>
            <?php echo $error_message; ?>
            <form action="add_day_to_db.php" method="post">
                <label for="date"><h2>Date of Activities</label>
                <input type="date" id="date" name="date"></h2><br>
                <table border=1 id="table">
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
                            "<tr id='tr'>
                                <td>$start_time_options</td>
                                <td>$end_time_options</td>
                                <td>$productive_html</td>
                                <td>$activity_type_html</td>
                                <td>
                                    <label for='note'>Notes: (optional)<br></label>
                                    <textarea name='notes[]' id='note' rows='4' cols='75'></textarea>
                                </td>
                            </tr>";
                        }
                    ?>
                </table>
                <p><button onclick="return add_row()">Add Row</button><button onclick="return delete_row()">Delete Row</button></p>
                <input id="submit" type="submit" value="Save">
            </form>
        </div>
    </body>
</html>