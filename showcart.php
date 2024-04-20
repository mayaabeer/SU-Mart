<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
            <?php include "cartstyle.css" ?>
    </style>
</head>
<body>
    <div class="cart-container">
        <?php 
            $totalamount = 0;
            $totalquantity = 0;
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sessid = session_id();
            $query = "SELECT cart.*, products.imagename FROM cart JOIN products ON cart.cart_itemcode = products.item_code WHERE cart.cart_sess = '$sessid'";
            $results = mysqli_query($conn, $query);
            if (!$results) {
                die("Error executing query: " . mysqli_error($conn));
            }
            
            if (mysqli_num_rows($results) == 0) { 
        ?>
            <div class="emptycart">
                <h2>Your Cart is Empty.</h2>
            </div>
        <?php 
            } else { 
                while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                    extract($row);
                    $totalquantity += $cart_quantity;
                    $totalprice = number_format($cart_price * $cart_quantity, 2);
                    $totalamount += $cart_price * $cart_quantity;
        ?>
                <div class="cart-item">
                    <div>
                        <img class="product_cartimg" src="img/<?php echo $imagename?>" alt="Image of product">
                    </div>
                    <div class="cart-item-right">
                        <div class="cart-item-info">
                            <h2><?php echo $cart_item_name; ?></h2>
                            <p><?php echo $cart_itemcode; ?></p>
                            <p><?php echo $cart_price; ?></p>
                            <form method="POST" action="cart.php?action=change&icode=<?php echo $cart_itemcode; ?>">
                                <div class="quantityselector">
                                    <button type="button" onclick="dec<?php echo $cart_itemcode; ?>()"><i class='bx bx-minus'></i></button>
                                    <input type="number" name="modified_quantity" id="quantityInput<?php echo $cart_itemcode; ?>" size="2" value="<?php echo $cart_quantity; ?>">
                                    <button type="button" onclick="inc<?php echo $cart_itemcode; ?>()"><i class='bx bx-plus'></i></button>
                                </div>
                                <input type="submit" name="Submit" value="Update">
                            </form>
                        </div>
                        <div class="cart-item-info-right">
                            <form method="POST" action="cart.php?action=delete&icode=<?php echo $cart_itemcode; ?>">
                                <button type="submit" name="Submit" class="delete-button">
                                    <i class='bx bx-x-circle'></i>
                                </button>
                            </form>
                            <h2 class="price" style="transform: translate(40%, 150%);"><?php echo $totalprice; ?></h2>
                        </div>
                    </div>
                </div>
                <script>
                    function dec<?php echo $cart_itemcode; ?>() {
                        let num = document.querySelector('#quantityInput<?php echo $cart_itemcode; ?>');
                        if (parseInt(num.value) > 1) {
                            num.value = parseInt(num.value) - 1;
                        }
                    }

                    function inc<?php echo $cart_itemcode; ?>() {
                        let num = document.querySelector('#quantityInput<?php echo $cart_itemcode; ?>');
                        num.value = parseInt(num.value) + 1;
                    }
                </script>
        <?php 
                }
            }
        ?>

        <!--totalquantity, totalamount-->
        <div class="cartinfo">
            <p>You have <?php echo $totalquantity; ?> products in your cart.</p>
            <h2>Total : <?php echo number_format($totalamount, 2); ?></h2>

            <div class="carinfo-buttons">
            <!-- <button type="submit" name="Submit" class="submitemptycart" value="Empty Cart">Empty Cart</button> -->
            <form  method="POST" action="cart.php?action=empty">
                    <input class="submitemptycart" type="submit" name="Submit" value="Empty Cart" >
            </form>

            <!-- <button type="submit" name="Submit" class="checkout" value="Checkout">Checkout</button> -->
            <form method="POST" action="checklogin.php">
                <input id="cartamount" name="cartamount" type="hidden" value="<?php echo $totalamount; ?>">
                <input class="checkout" type="submit" name="Submit" value="Checkout" >
            </form>
            </div>
        </div>
    </div>
</body>
</html>

