<?php
    session_start();
    
    $_SESSION["items"] = array();

    $_SESSION["total"] = 0;
    foreach($_POST as $item){
        switch ($item){
            case "1964.5 Convertable: $25,000":
                array_push($_SESSION["items"], $item);
                $_SESSION["total"] += 25000;
                break;
            case "1965 GT350: $45,000":
                array_push($_SESSION["items"], $item);
                $_SESSION["total"] += 45000;
                break;
            case "1967 GT500: $65,000":
                array_push($_SESSION["items"], $item);
                $_SESSION["total"] += 65000;
                break;
            case "1969 Boss 429: $300,000":
                array_push($_SESSION["items"], $item);
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
    <title>Brendon Welker's Store: Checkout</title>
    <link rel="stylesheet" href="../home/navbar.css">
</head>
<body>
    <?php include '../home/nav.php';?>
    <h2>Please enter you mailing address for shipment of the following items:</h2>
    <table>
        <?php foreach($_SESSION["item"] as $item){
            echo"<tr><td colspan='2'>$item</td></tr>";
        } 
        echo"<tr><td colspan='2'>Total: $" . number_format($_SESSION["total"], 2) . "</tr></td>";?>
    </table>
    <form action="thankyou.html">
        <table>
            <tr>
                <td>Full Name:</td>
                <td><input type="text" size="50" maxlenth="50"></td>
            </tr>
            <tr>
                <td>Stree Address:</td>
                <td><input type="text" size="50" maxlenth="50"></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input type="text" size="2" maxlength="2"></td>
            </tr>
            <tr>
                <td>Zip Code:</td>
                <td><input type="text" size="5" maxlength="5"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>