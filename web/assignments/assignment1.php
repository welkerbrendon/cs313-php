<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Brendon Welker's Store: Pick Your Car(s)</title>
        <link rel="stylesheet" href="../home/navbar.css">
        <link rel="stylesheet" href="./assignment1helpers/assignment1.css">
    </head>
    <body>
        <?php include '../home/nav.php';?>
        <div id="shopping-cart">
            <a href="review-cart.php"><img src="../pictures/shopping-cart.jpg" class="shopping-cart"></a>
            <div class="dropdown-content" id="cart">
                <form action="review-cart.php" method="post">
                    <?php
                        foreach($_SESSION["items"] as $selectedItem){
                            $string_length = strlen($selectedItem);
                            $total_number_formated = number_format($_SESSION["total"], 2);?>
                            <input disabled name="items[]" value="<?php echo($selectedItem) ?>" size="<?php echo($string_length) ?>" maxlength="<?php echo($string_length) ?>"><br>
                        <?php } ?>
                        <input disabled size='20' id='total' value='Total: $<?php echo($total_number_formated) ?>' name='cart-total'><br>
                    <input type="submit" value="Checkout">
                </form>
            </div>
        </div>
        <h1>Welcome to the greatest selection of classic Fords ever assembled!</h1>
        <form action="review-cart.php" method="post">
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
                        $25,000.00
                        <?php
                            if(!in_array("1964.5 Convertable: $25,000", $_SESSION["items"])){
                                echo("<input type='checkbox' name='items' value='1964.5 Convertable: $25,000'>Select for Cart");
                            }
                        ?>
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
                    <td colspan="2">
                        $45,000.00
                        <?php
                            if(!in_array("1965 GT350: $45,000", $_SESSION["items"])){
                                echo("<input type='checkbox' name='items' value='1965 GT350: $45,000'>Select for Cart");
                            }
                        ?>
                    </td>
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
                    <td colspan="2">
                        $65,000.00
                        <?php
                            if(!in_array("1967 GT500: $65,000", $_SESSION["items"])){
                                echo("<input type='checkbox' name='items' value='1967 GT500: $65,000'>Select for Cart");
                            }
                        ?>
                    </td>
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
                    <td colspan="2">
                        $300,000.00
                        <?php
                            if(!in_array("1969 Boss 429: $300,000", $_SESSION["items"])){
                                echo("<input type='checkbox' name='items' value='1969 Boss 429: $300,000'>Select for Cart");
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Add to Cart" class="submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>