<?php
if (!session_id()) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

include('menu.php'); 


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment_submit'])) {
    header("Location: payment_confirmation.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card Payment</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Credit Card Payment</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="card_name">Name on Card:</label><br>
            <input type="text" id="card_name" name="card_name" required><br><br>

            <label for="card_number">Card Number:</label><br>
            <input type="text" id="card_number" name="card_number" required><br><br>

            <label for="expiry_date">Expiry Date:</label><br>
            <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required><br><br>

            <label for="cvv">CVV:</label><br>
            <input type="text" id="cvv" name="cvv" required><br><br>

            <input type="submit" name="payment_submit" value="Pay Now">
        </form>
    </div>
</body>

</html>
