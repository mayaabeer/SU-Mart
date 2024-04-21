<?php

if (session_status() == PHP_SESSION_NONE) {
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

if (isset($_POST['update_product'])) {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $feature1 = $_POST['feature1'];
    $feature2 = $_POST['feature2'];
    $feature3 = $_POST['feature3'];
    $feature4 = $_POST['feature4'];
    $feature5 = $_POST['feature5'];
    $feature6 = $_POST['feature6'];

    // Update product details in 'products' table
    $update_products_query = "UPDATE products SET item_name='$item_name', description='$description', price='$price' WHERE item_code='$item_code'";
    $update_products_result = mysqli_query($conn, $update_products_query);

    // Update features in 'itemdetails' table
    $update_itemdetails_query = "UPDATE productfeatures SET feature1='$feature1', feature2='$feature2', feature3='$feature3', feature4='$feature4', feature5='$feature5', feature6='$feature6' WHERE item_code='$item_code'";
    $update_itemdetails_result = mysqli_query($conn, $update_itemdetails_query);

    if ($update_products_result && $update_itemdetails_result) {
        // Redirect back to itemdetails page
        header("Location: itemdetails.php?itemcode=$item_code");
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}

?>