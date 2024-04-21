<?php
// include ('menu.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {
    $checkout_option = $_POST['checkout_option'];
    if ($checkout_option == 'shipping') {
        header("Location: shipping_info.php");
        exit;
    } elseif ($checkout_option == 'pickup') {
        header("Location: pickup_options.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        <?php include "styles.css" ?>
    </style>
</head>

<body>
    <div class="container-checkout" style="margin-top: 200px">
        <h2 style="text-align: center">Checkout</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="checkout_option" style="text-align: center">Select checkout option:</label><br><br>
            <div class="wrapper" style="transform: translateX(40px);">
                <input type="radio" name="checkout_option" id="shipping" value="shipping" checked>
                <label for="shipping" class="option shipping">
                    <div class="dot"></div>
                    <span>Shipping</span>
                </label>
                <input type="radio" name="checkout_option" id="pickup" value="pickup">
                <label for="pickup" class="option pickup">
                    <div class="dot"></div>
                    <span>Pickup</span>
                </label>
            </div>
            <input type="submit" name="checkout" value="Proceed" style="transform: translate(50px, 100px);" class="input">
        </form>
    </div>
</body>

</html>
