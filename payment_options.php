<?php
if (!session_id()) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment_submit'])) {
    $payment_option = $_POST['payment_option'];
    header("Location: thank_you.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        <?php include "styles.css" ?>
    </style>
</head>

<body>
    <div class="container_payment">
        <h2>Payment Options</h2>
        <div class="payment-buttons">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="tooltip">
                <button type="button" class="unclickable">Credit Card</button>
                <span class="tooltiptext">Credit card payment is not available yet due to security reasons</span>
            </div><br>

            <div class="tooltip">
                <button type="button" class="unclickable">QR Code</button>
                <span class="tooltiptext">QR code payment is not available yet due to security reasons</span>
            </div><br>
            <div>
            <button type="submit" class="input" name="payment_submit" value="cash">Cash</button><br><br>
            </div>
        </form>
        </div>
    </div>
</body>

</html>
