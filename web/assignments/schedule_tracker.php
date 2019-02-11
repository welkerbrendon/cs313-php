<?php
    $logged_in = "<a href='view_schedule_data.php'><button>View History</button></a>
    <a href='add_day.php'><button>Add New Day</button></a>";

    $not_logged_in = "<h2>Please Sign In</h2>
    <form action='schedule_tracker.php' method='POST'>
    username: <input type='text' name='username' maxlength='255' size='25'><br><br>
    password: <input type='password' name='password' maxlength='255' size='25'><br><br>
    <input type='submit' value='Sign In'>
    </form>";

    $page_to_show = "";

    if(in_array("username", $_POST) || in_array("username", $_COOKIE)){
        $page_to_showpage = $logged_in;
        setcookie("username", $_POST["username"], time() + (30));
    }
    else {
        $page_to_show = $not_logged_in;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Schedule Tracker</title>
        <link rel="stylesheet" href="../home/navbar.css">
    </head>
    <body>
        <?php include '../home/nav.php';?>
        <h1>Welcome to Your Schedule Tracker!</h1>
        <?php echo $page_to_show; ?>
    </body>
</html>