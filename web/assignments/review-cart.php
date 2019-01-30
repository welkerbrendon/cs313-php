<?php
    session_start();
    
    if(!is_array($_SESSION["items"])){
        $_SESSION["items"] = array();
    }

    $_SESSION["total"] = 0;
    //$_SESSION["items"] = array_unique($_SESSION["items"]);
    foreach($_POST as $item){
        switch ($item){
            case "1964.5 Convertable: $25,000":
                if(!in_array($item, $_SESSION["item"])){
                    array_push($_SESSION["items"], $item);
                }
                $_SESSION["total"] += 25000;
                break;
            case "1965 GT350: $45,000":
                if(!in_array($item, $_SESSION["item"])){
                    array_push($_SESSION["items"], $item);
                }
                $_SESSION["total"] += 45000;
                break;
            case "1967 GT500: $65,000":
                if(!in_array($item, $_SESSION["item"])){
                    array_push($_SESSION["items"], $item);
                }
                $_SESSION["total"] += 65000;
                break;
            case "1969 Boss 429: $300,000":
                if(!in_array($item, $_SESSION["item"])){
                    array_push($_SESSION["items"], $item);
                }
                $_SESSION["total"] += 300000;
                break;
            default:
                break;
        }
    }

    $form;
    foreach($_SESSION["items"] as $item){
        $form .= "$item<br><input type=checkbox name=items[] value=$item checked>Deselect to remove from purchase<br>";
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