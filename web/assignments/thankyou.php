<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thank you for shopping!</title>
        <link rel="stylesheet" href="../home/navbar.css">
    </head>
    <body>
        <?php include '../home/nav.php';?>
        <h1> <?php echo(array_values($_SESSION["items"])) ?> </h1>
        <h1> <?php echo(array_values($_POST)) ?> </h1>
        <h1>Thank You!</h1>
    </body>
</html>