<!DOCTYPE html>

<?php
include('menu.php');
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "shopping"; 
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $code=$_REQUEST['itemcode'];
    $query = "SELECT item_code, item_name, description, imagename, price FROM products " . "where item_code like '$code'";
    $results = mysqli_query($conn, $query) or die(mysql_error());
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
    extract($row);

    $itemname=urlencode($item_name);
    $itemprice=$price;
    $itemdescription=$description;
    $pfquery = "SELECT feature1, feature2, feature3, feature4, feature5, feature6 FROM productfeatures " . "where item_code like '$code'";                                        
    $pfresults = mysqli_query($conn, $pfquery) or die(mysql_error());
    $pfrow = mysqli_fetch_array($pfresults, MYSQLI_ASSOC);
    extract($pfrow);
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

    <div class="item-details-container" style="margin-top: 200px;">
        <div class="item-image">
            <img class="product_img" src="img/<?php echo $imagename; ?>" alt="Image of product"></img>
        </div>
        <div class="item-info">
            <h2>
                <?php
                    echo $item_name;
                ?>
            </h2>
            <div class="description">
                <p><b>Description:</b></p>
                <p>
                <?php
                    echo $itemdescription;
                ?>
                </p>
                
            </div>
            <div class="features">
                <span class="feature">
                    <?php
                        echo $feature1;
                    ?>
                </span>
                <span class="feature">
                
                    <?php
                        echo $feature2;
                    ?>
                </span>
                <span class="feature">
                    
                    <?php
                        echo $feature3;
                    ?>
                </span>
                <span class="feature">
        
                    <?php
                        echo $feature4;
                    ?>
                </span>
                <span class="feature">
                    <?php
                        echo $feature5;
                    ?>
                </span>
                <span class="feature">
                    <?php
                        echo $feature6;
                    ?>
                </span>
            </div>
            <div class="add-to-cart">
    <form id="addToCartForm" method="POST" action="cart.php?action=add&icode=<?php echo $item_code; ?>&iname=<?php echo $itemname; ?>&iprice=<?php echo $itemprice; ?>">
        <div class="quantityselector">
            <button type="button" onclick="dec()"><i class='bx bx-minus'></i></button>
            <input class="num" type="number" id="quantityInput" name="quantity" value="1">
            <button type="button" onclick="inc()"><i class='bx bx-plus'></i></button>
        </div>
        <input type="hidden" name="selectedQuantity" id="selectedQuantity" value="1">
        <span class="price">
            <h2>Price: <?php echo $itemprice; ?></h2>
        </span>
        <input type="submit" name="buynow" value="Buy Now" class="buy-now">
        <input type="submit" name="addtocart" value="Add To Cart" class="add-to-cart-button" onclick="updateQuantity()">
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
    </script>
</body>
</html>
