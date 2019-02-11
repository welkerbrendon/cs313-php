<?php
    $signed_in = "<a href='view_schedule_data.php'><button>View History</button></a>
    <a href='add_day.php'><button>Add New Day</button></a>";
    $not_signed_in = "<a href='sign_in'><button>Sign In</button></a>";
    $page_to_show = "";
    if(isset($_POST["username"])){
        setcookie("username", $_POST["username"], time() + (60 * 30);
        $page_to_show = $signed_in;
    }
    else {
        $page_to_show = $not_signed_in;
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