<?php
include('menu.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servername = "localhost";
$username = "mayq2814_maya";
$password = "sTcycAU8KDSMcXJ"; 
$database = "mayq2814_shopping"; 
    
$conn = new mysqli($servername, $username, $password, $database);
    
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$quantity = "";
$action = "";
$query = "";

if (isset($_POST['quantity'])) {
    $quantity = trim($_POST['quantity']);
}

if ($quantity == '') {
    $quantity = 1;
}

if ($quantity <= 0) {
    echo "Quantity value is invalid ";
    echo "Go Back and enter a valid value";
} else {
    if (isset($_REQUEST['icode'])) {
        $itemcode = $_REQUEST['icode'];
    }
    if (isset($_REQUEST['iname'])) {
        $item_name = $_REQUEST['iname'];
    }
    if (isset($_REQUEST['iprice'])) {
        $price = $_REQUEST['iprice'];
    }
    if (isset($_POST['modified_quantity'])) {
        $modified_quantity = $_POST['modified_quantity'];
    }
    $sess = session_id();
    if (isset($_REQUEST['action'])) {
        $action = $_REQUEST['action'];
    }

    switch ($action) {
        case "add":
            $query = "SELECT * FROM cart WHERE cart_sess = '$sess' AND cart_itemcode LIKE '$itemcode'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $qt = $row['cart_quantity'];
                $qt = $qt + $quantity;
                $query = "UPDATE cart SET cart_quantity=$qt WHERE cart_sess = '$sess' AND cart_itemcode LIKE '$itemcode'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            } else {
                $query = "INSERT INTO cart (cart_sess, cart_quantity, cart_itemcode, cart_item_name, cart_price) VALUES ('$sess', $quantity, '$itemcode', '$item_name', $price)";
                $message = "<div align=\"center\"><strong>Item added.</strong></div>";
            }
            break;
        case "change":
            if ($modified_quantity == 0) {
                $query = "DELETE FROM cart WHERE cart_sess = '$sess' AND cart_itemcode LIKE '$itemcode'";
                $message = "<div style=\"width:200px; margin:auto;\">Item deleted</div>";
            } else {
                if ($modified_quantity < 0) {
                    echo "Invalid quantity entered";
                } else {
                    $query = "UPDATE cart SET cart_quantity = $modified_quantity  WHERE cart_sess = '$sess' AND cart_itemcode LIKE '$itemcode'";
                    $message = "<div style=\"width:200px; margin:auto;\"> Quantity changed</div>";
                }
            }
            break;
        case "delete":
            $query = "DELETE FROM cart WHERE cart_sess = '$sess' AND cart_itemcode LIKE '$itemcode'";
            $message = "<div style=\"width:200px; margin:auto;\">Item deleted</div>";
            break;
        case "empty":
            $query = "DELETE FROM cart WHERE cart_sess = '$sess'";
            break;
    }

    if ($query != "") {
        $results = mysqli_query($conn, $query) or die(mysqli_error($conn));
        echo $message;
    }

    include("showcart.php");
    echo "<SCRIPT LANGUAGE=\"JavaScript\">updateCart();</SCRIPT>";
}
?>
