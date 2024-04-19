<!DOCTYPE html>

<?php
if (!isset($totalamount)) {
    $totalamount = 0;
}
$totalquantity = 0;
if (!session_id()) {
    session_start();
}
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "shopping"; 
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$sessid = session_id();
$query = "SELECT * FROM cart WHERE cart_sess = '$sessid'";
$results = mysqli_query($conn, $query) or die(mysqli_error($conn));



?>

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
        <?php if (mysqli_num_rows($results) == 0) { ?>
            <div class="emptycart"><h2>Your Cart is Empty.</h2></div>
        <?php }else { while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) 
            extract($row);
            
            $totalquantity = $totalquantity + $cart_quantity;
            $totalprice = number_format($cart_price * $cart_quantity, 2);
            $totalamount = $totalamount + ($cart_price * $cart_quantity);
            ?>
        
        <div class="cart-item">
        <div><img class="product_img" src="img/<?php echo $imagename?>" alt="Image of product"></img> </div>
            <div class="cart-item-info">
                <h2><?php echo $cart_item_name; ?></h2>
                <p><?php echo $cart_itemcode; ?></p>
                <p><?php echo $cart_price; ?></p>
                <form method="POST" action="cart.php?action=change&icode=$cart_itemcode">
                    <input type="number" name="modified_quantity" size="2" value="<?php echo $cart_quantity; ?>">
                    <input type="submit" name="Submit"  value="Update"></form>
            </div>

            <div class="cart-item-info">
                <form method="POST" action="cart.php?action=delete&icode=XYZ123">
                    <button type="submit" name="Submit" class="delete-button">
                        <i class='bx bx-x-circle'></i>
                    </button>
                </form>
                <h2 class="price" style="transform: translate(40%, 150%);"><?php echo $totalprice; ?></h2>
            </div>
        </div>
        <?php } ?>

        <!--totalquantity, totalamount-->
        <div class="cartinfo">
            <p>You have <?php echo $totalquantity; ?> products in your cart.</p>
            <h2>Total : <?php echo $totalamount; ?></h2>
        
            <button type="submit" name="Submit" class="submitemptycart" value="Empty Cart">Empty Cart</button>

            <button type="submit" name="Submit" class="checkout" value="Checkout">Checkout</button>
        </div>
        
        
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const plus = document.querySelector(".plus");
            const minus = document.querySelector(".minus");
            const quantity = document.querySelector(".num");

            let currentQuantity = <?php echo $cart_quantity; ?>;

            plus.addEventListener("click", () => {
                currentQuantity++;
                quantity.innerText = currentQuantity;
                updateQuantity(currentQuantity);
            });

            minus.addEventListener("click", () => {
                if (currentQuantity > 1) {
                    currentQuantity--;
                    quantity.innerText = currentQuantity;
                    updateQuantity(currentQuantity);
                }
            });

            function updateQuantity(quantity) {
                const quantityInput = document.getElementById("quantity");
                quantityInput.value = quantity;
            }
        });
    </script>

</body>
</html>


