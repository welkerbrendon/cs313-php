<!DOCTYPE html>
<html>
    <head>
        <title>Schedule Tracker</title>
        <link rel="stylesheet" href="/home/navbar.css">
    </head>
    <body>
        <div>
            <?php include '../../home/nav.php';
                $time = DateTime::createFromFormat("i", 30);
                echo $time;
            ?>
            <h1>Fill in the following information and click submit when done.</h1>
            <form>
                <label for="date">Date of Activities</label>
                <input type="date" id="date" name="date">
                <table border=1>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Productive</th>
                        <th>Activity Type</th>
                        <th>Notes</th>
                    </tr>
                    <?php
                        // for($i = 0; $i < 48; $i++){
                        //     echo 
                        //     "<tr>
                        //         <td>"
                        // }
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>