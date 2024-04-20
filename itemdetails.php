<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('menu.php');
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "shopping"; 
    
$conn = new mysqli($servername, $username, $password, $database);
    
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$session_id = null;

if (isset($_SESSION['user_id'])) {
    $session_id = $_SESSION['user_id'];
}

$code = $_REQUEST['itemcode'];
$query = "SELECT item_code, item_name, description, imagename, price, user_id FROM products WHERE item_code = '$code'";
$results = mysqli_query($conn, $query) or die(mysql_error());
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
extract($row);

$itemname = urlencode($item_name);
$itemprice = $price;
$itemdescription = $description;
$pfquery = "SELECT feature1, feature2, feature3, feature4, feature5, feature6 FROM productfeatures WHERE item_code = '$code'";                                        
$pfresults = mysqli_query($conn, $pfquery) or die(mysql_error());
$pfrow = mysqli_fetch_array($pfresults, MYSQLI_ASSOC);
extract($pfrow);
?>

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

<div class="item-details-container" style="margin-top: 200px;">
    <div class="item-image">
        <img class="product_img" src="img/<?php echo $imagename; ?>" alt="Image of product">
    </div>
    <div class="item-info">
        <h2><?php echo $item_name; ?></h2>

        <h2><?php if ($session_id ==! null && $session_id == $user_id) {
            echo '<a href="#" onclick="editProduct()">Edit product</a>';
        }
        ?></h2>


        <div class="description">
            <p><b>Description:</b></p>
            <p><?php echo $itemdescription; ?></p>
        </div>
        <div class="features">
            <span class="feature"><?php echo $feature1; ?></span>
            <span class="feature"><?php echo $feature2; ?></span>
            <span class="feature"><?php echo $feature3; ?></span>
            <span class="feature"><?php echo $feature4; ?></span>
            <span class="feature"><?php echo $feature5; ?></span>
            <span class="feature"><?php echo $feature6; ?></span>
        </div>
        <div class="add-to-cart">
            <form id="addToCartForm" method="POST" action="cart.php?action=add&icode=<?php echo $item_code; ?>&iname=<?php echo $itemname; ?>&iprice=<?php echo $itemprice; ?>">
                <div class="quantityselector">
                    <button type="button" onclick="dec()"><i class='bx bx-minus'></i></button>
                    <input class="num" type="number" id="quantityInput" name="quantity" value="1">
                    <button type="button" onclick="inc()"><i class='bx bx-plus'></i></button>
                </div>
                <input type="hidden" name="selectedQuantity" id="selectedQuantity" value="1">
                <span class="price"><h2>Price: <?php echo $itemprice; ?></h2></span>
                <input type="submit" name="buynow" value="Buy Now" class="buy-now">
                <input type="submit" name="addtocart" value="Add To Cart" class="add-to-cart-button" onclick="updateQuantity()">
            </form>
        </div>
    </div>
</div>

<div id="editForm" style="display: none;">
    <h2>Edit Product: <?php echo $item_name; ?></h2>
    <form method="POST" action="update_product.php">
        <input type="hidden" name="item_code" value="<?php echo $item_code; ?>">
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" value="<?php echo $item_name; ?>"><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo $description; ?></textarea><br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $price; ?>"><br>
        <label for="feature1">Feature 1:</label>
        <input type="text" id="feature1" name="feature1" value="<?php echo $feature1; ?>"><br>
        <label for="feature2">Feature 2:</label>
        <input type="text" id="feature2" name="feature2" value="<?php echo $feature2; ?>"><br>
        <label for="feature3">Feature 3:</label>
        <input type="text" id="feature3" name="feature3" value="<?php echo $feature3; ?>"><br>
        <label for="feature4">Feature 4:</label>
        <input type="text" id="feature4" name="feature4" value="<?php echo $feature4; ?>"><br>
        <label for="feature5">Feature 5:</label>
        <input type="text" id="feature5" name="feature5" value="<?php echo $feature5; ?>"><br>
        <label for="feature6">Feature 6:</label>
        <input type="text" id="feature6" name="feature6" value="<?php echo $feature6; ?>"><br>

        <input type="submit" name="update_product" value="Update Product">
    </form>
</div>



<script>
    function dec() {
        let num = document.querySelector('#quantityInput');
        if (parseInt(num.value) > 1) {
            num.value = parseInt(num.value) - 1;
            updateHiddenInputValue();
        }
    }

    function inc() {
        let num = document.querySelector('#quantityInput');
        num.value = parseInt(num.value) + 1;
        updateHiddenInputValue();
    }

    function updateHiddenInputValue() {
        let selectedQuantity = document.querySelector('#selectedQuantity');
        let quantityInput = document.querySelector('#quantityInput');
        selectedQuantity.value = quantityInput.value;
    }

    function updateQuantity() {
        updateHiddenInputValue();
    }

    function editProduct() {
        document.getElementById("editForm").style.display = "block";
        document.querySelector(".item-info").style.display = "none";
    }
</script>
</body>
</html>
