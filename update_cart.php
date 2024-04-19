

<?php
// Check if the action parameter is set to update
if(isset($_GET['action']) && $_GET['action'] === 'update') {
    // Check if the item code and quantity are provided
    if(isset($_POST['itemcode']) && isset($_POST['quantity'])) {
        $itemcode = $_POST['itemcode'];
        $quantity = $_POST['quantity'];

        // Sanitize input to prevent SQL injection
        $itemcode = mysqli_real_escape_string($conn, $itemcode);
        $quantity = mysqli_real_escape_string($conn, $quantity);

        // Update the cart with the new quantity
        $update_query = "UPDATE cart SET cart_quantity = '$quantity' WHERE cart_itemcode = '$itemcode'";
        $update_result = mysqli_query($conn, $update_query);

        // Check if the update was successful
        if($update_result) {
            echo "Quantity updated successfully.";
            // Redirect back to the cart page
            header("Location: cart.php");
            exit();
        } else {
            echo "Error updating quantity: " . mysqli_error($conn);
        }
    } else {
        echo "Item code and quantity are required.";
    }
} else {
    echo "Invalid action.";
}
?>