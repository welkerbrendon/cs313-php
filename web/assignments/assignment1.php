<?php
    session_start();
    $_Session["items"] = array();
    /*$_Session["total"] = 0;
    if(isset($_POST)){
        foreach($_POST as $item){
            switch($item){
                case "25000":
                    array_push($_SESSION["items"], "1964.5 Convertable: $25,000";
                    break;
                case "45000":
                    array_push($_SESSION["items"], "1965 GT350: $45,000";
                    break;
                case "65000":
                    array_push($_SESSION["items"], "1967 GT500: $65,000";
                    break;
                case "300000":
                    array_push($_SESSION["items"], "1969 Boss 429: $300,000";
                    break;
                default:
                    break;
            }
            $_SESSION["total"] += (int) $item;
        }
    }*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Brendon Welker: Assignment1</title>
        <link rel="stylesheet" href="../home/navbar.css">
        <link rel="stylesheet" href="./assignment1helpers/assignment1.css">
    </head>
    <body>
        <?php include '../home/nav.php';?>
        <div id="shopping-cart">
            <img src="../pictures/shopping-cart.jpg" class="shopping-cart">
            <div class="dropdown-content" id="cart">
                <form action="assignment1helpers/checkout.php" methor="post" id="cart-form">
                    <?php
                        /*foreach($_SESSION["items"] as $selectedItem){
                            echo("<p>$selectedItem</p>");
                        }
                        if(!empty($_SESSION["total"]))
                            echo("<p id='total' value='" . $_SESSION["total"] . "' name='cart-total'>Total: $" . $_SESSION["total"] . ":00</p>");
                        else
                            echo("<p id="total" value="0" name="cart-total">Total: $0:00</p>");*/
                    ?>
                    <input type="submit" value="Checkout">
                </form>
            </div>
        </div>
        <h1>Welcome to the greatest selection of classic Fords ever assembled!</h1>
        <table>
            <tr class="seperate">
                <th colspan="2"><h2>Mustangs<h2></th>
            </tr>
            <tr>
                <td><img src="../pictures/car-shopping/convertable.jpg" class="item"></td>
                <td><p>1964 1/2 Ford Mustang Convertable</p>
                    <p>300 CID Straight 6 Engine</p>
                    <p>3 Speed C4 Automatic Transmission</p>
                    <p>4 Manual Drum Brakes</p>
                    <p>Power Steering</p>
                </td>
            </tr>
            <tr class="seperate">
                <td colspan="2">
                    <form action="assignment1.php" method="post">
                        $25,000.00
                        <?php
                            /*if(!in_array("1964.5 Convertable: $25,000"), $_SESSION["items"]){
                                echo("<input type='submit' class='add' value='Add To Cart' name='25000'>")
                            }*/
                        ?>
                    </form>
                </td>
            </tr>
            <tr>
                <td><img src="../pictures/car-shopping/shelby350.jpg" class="item"></td>
                <td><p>1965 Ford Mustang Shelby GT350</p>
                    <p>271 HP 289 CID V8 Engine</p>
                    <p>4 Speed Toploader Manual Transmission</p>
                    <p>Front Disc Rear Drum Manual Brakes</p>
                    <p>Manual Steering</p>
                </td>
            </tr>
            <tr class="seperate">
                <td colspan="2">$45,000.00<button class="add" onclick="addToCart(this)" value="45000">Add ToCart</button></td>
            </tr>
            <tr>
                <td><img src="../pictures/car-shopping/shelby500.jpg" class="item"></td>
                <td><p>1967 Ford Mustang Shelby GT500</p>
                    <p>355 HP 427 CID V8 Engine</p>
                    <p>4 Speed Toploader Manual Transmission</p>
                    <p>Front Disc Rear Drum Power Brakes</p>
                    <p>Power Steering</p>
                </td>
            </tr>
            <tr class="seperate">
                <td colspan="2">$65,000.00<button class="add" onclick="addToCart(this)" value="1967 GT500: $65,000">Add To Cart</button></td>
            </tr>
            <tr>
                <td><img src="../pictures/car-shopping/boss429.png" ></td>
                <td><p>1969 Ford Mustang Boss 429</p>
                    <p>375 HP 429 CID V8 Engine</p>
                    <p>4 Speed Toploader Manual Transmission</p>
                    <p>4 Power Disc Brakes</p>
                    <p>Power Steering</p>
                </td>
            </tr>
            <tr class="seperate">
                <td colspan="2">$300,000.00<button class="add" onclick="addToCart(this)" value="1969 Boss 429: $300,000">Add To Cart</button></td>
            </tr>   
        </table>
    </body>
</html>