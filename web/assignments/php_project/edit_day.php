<?php
    require('obtaining_data_functions.php');
    $data = get_given_day($_COOKIE["username"], $_COOKIE["password"], $_GET["day"]);
    echo print_r($data);
    /*$given_day = $date[0]["given_dat"];
    $given_day = DateTime::createFromFormat("Y-m-d", $date);
    $given_day = $given_day->format("F d, Y");
?>
<!DOCTYPE HTML>
<html>
    <head> 
        <title>Edit Day</title>
        <link rel="stylesheet" href="/home/navbar.css">
    </head>
    <body>
        <?php include '../../home/nav.php'; ?>
        <div>
            <h1><?php echo $given_day ?></h1>
            <table>
                <tr>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Productive</th>
                    <th>Activity Type</th>
                    <th>Notes</th>
                </tr>
                <?php
                    foreach($data as $row){

                    }
                ?>
            </table>
    </body>
</html>*/?>