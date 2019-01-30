<?php
    session_start();
    
    if(!is_array($_SESSION["items"])){
        $_SESSION["items"] = array();
    }

    $_SESSION["total"] = 0;
    foreach($_POST as $item){
        switch ($item){
            case "1964.5 Convertable: $25,000":
                array_push($_SESSION["items"], $item);
                break;
            case "1965 GT350: $45,000":
                array_push($_SESSION["items"], $item);
                break;
            case "1967 GT500: $65,000":
                array_push($_SESSION["items"], $item);
                break;
            case "1969 Boss 429: $300,000":
                array_push($_SESSION["items"], $item);
                break;
            default:
                break;
        }
    }

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

    array_unique($_SESSION["items"]);
?>
<!DOCTYPE html>
<head>
    <title>Brendon Welker's Store: Review Purchases</title>
    <link rel="stylesheet" href="../home/navbar.css">
    <link rel="stylesheet" href="assignment1helpers/assignment1.css">
</head>
<body>
    <?php include '../home/nav.php';?>
    <form action='checkout.php' method='post'>
        <table>
            <?php
            foreach($_SESSION["items"] as $item) { ?>
                <tr><td><?php echo($item) ?></td><td><input checked type="checkbox" name="item" value="<?php echo($item) ?>">Deselect to remove from cart</td></tr>"
            <?php } 
                    echo"<tr><td colspan='2'>Total: $" . number_format($_SESSION["total"], 2) . "</tr></td>";?>
            <tr>
                <td colspan="2">
                    <input type="submit" class="submit" value="checkout">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>