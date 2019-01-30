<?php
    session_start();
    
    if(!is_array($_SESSION["items"])){
        $_SESSION["items"] = array();
    }

    $_SESSION["total"] = 0;
    foreach($_POST as $item){
        switch ($item){
            case "1964.5 Convertable: $25,000":
                if(!in_array($item, $_SESSION["item"])){
                    array_push($_SESSION["items"], $item);
                }
                break;
            case "1965 GT350: $45,000":
                if(!in_array($item, $_SESSION["item"])){
                    array_push($_SESSION["items"], $item);
                }
                break;
            case "1967 GT500: $65,000":
                if(!in_array($item, $_SESSION["item"])){
                    array_push($_SESSION["items"], $item);
                }
                break;
            case "1969 Boss 429: $300,000":
                if(!in_array($item, $_SESSION["item"])){
                    array_push($_SESSION["items"], $item);
                }
                break;
            default:
                break;
        }
    }

    $form = array();
    foreach($_SESSION["items"] as $item){
        switch ($item){
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
?>
<!DOCTYPE html>
<head>
    <title>Brendon Welker's Store: Review Purchases</title>
    <link rel="stylesheet" href="../home/navbar.css">
    <link rel="stylesheet" href="assignment1helpers.css">
</head>
<body>
    <?php include '../home/nav.php';
    echo"<form action='checkout.php' method='post'><table>";
    foreach($_SESSION["items"] as $item){
        echo"<tr><td>$item</td><td><input type='checkbox' name='$item'>Deselect to remove from cart</td></tr>";
    }
    echo("<tr><td colspan='2'><input type='submit' value='checkout'></td></tr></table></form>");?>

</body>
</html>