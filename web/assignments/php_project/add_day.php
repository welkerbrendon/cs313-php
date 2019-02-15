<?php
    require("connect_to_db.php");
    $db = connect();

    $names = $db->query("SELECT type_name FROM activity_type");
    echo print_r($names);
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
                        // for($i = 0; $i < 1440 ; $i += 30){
                        //     $hour = intval($i / 60);
                        //     $hour = ($hour < 1) ? 12 : $hour;
                        //     $minutes = $i % 60;

                        // }
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>