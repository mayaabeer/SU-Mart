<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('menu.php');
$servername = "localhost";
$username = "mayq2814_maya";
$password = "sTcycAU8KDSMcXJ"; 
$database = "mayq2814_shopping"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['itemcode'])) {
    $item_code = $_GET['itemcode'];
    
    // Delete from products table
    $delete_product_query = "DELETE FROM products WHERE item_code = '$item_code'";
    $result_product = mysqli_query($conn, $delete_product_query);

    // Delete from productfeatures table
    $delete_feature_query = "DELETE FROM productfeatures WHERE item_code = '$item_code'";
    $result_feature = mysqli_query($conn, $delete_feature_query);

    if ($result_product && $result_feature) {
        // Deletion successful
        header("Location: allitemslist.php");
        exit;
    } else {
        // Deletion failed
        echo "Error: " . $conn->error;
    }
}
?>
