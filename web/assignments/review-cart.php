<?php
    session_start();
    array_push($_SESSION["items"], $_POST["items"]);
    array_unique($_SESSION["items"]);

    $_SESSION["total"] = 0;
    $_SESSION["items"] = array_unique($_SESSION["items"]);
    foreach($_SESSION["items"] as $itemForTotal){
        switch ($itemForTotal){
            case "1964.5 Convertable: $25,000":
                $_SESSION["total"] += 25000;
                break;
            case "1965 GT350: $45,000":
                $_SESSION["total"] += 45000;
                break;
            case "1967 GT500: $65,000":
                $_SESSION["total"] += 65000;
                break;
            case "1969 Boss 429: $300,000":
                $_SESSION["total"] += 300000;
                break;
            default:
                break;
        }
    }

    $form;
    foreach($_SESSION["items"] as $item){
        $form .= "<p>$item<br><input type=checkbox name=items[] value=$item checked>Deselect to remove from purchase</p>";
    }
?>
<!DOCTYPE html>
<head>
    <title>Brendon Welker's Store: Review Purchases</title>
    <link rel="stylesheet" href="../home/navbar.css">
</head>
<body>
    <?php include '../home/nav.php';
    echo("<form action='checkout.php' method='post'>");
    echo($form);
    echo("<input type='submit' value='checkout'></form>");?>

</body>
</html>