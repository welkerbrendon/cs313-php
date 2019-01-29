<?php
    $form = "";
    foreach ($_SESSION["items"] as $item_added){
        $form .= "$item_added<input type='checkbox' value=$item_added name='items_to_remove'>'Select for removal from cart";
    }
?>
<!DOCTYPE html>
<head>
    <title>Brendon Welker's Store: Review Purchases</title>
    <link rel="stylesheet" href="../home/navbar.css">
</head>
<body>
    <?php include '../home/nav.php';
    echo "<form action='checkout.php' method='post'>";
    echo($form);
    echo"<input type='submit' value='checkout'></form>?>";?>

</body>
</html>