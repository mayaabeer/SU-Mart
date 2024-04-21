<?php
if (!session_id()) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Payment</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>QR Payment</h2>
        <img src="img/sumartqr.png" alt="QR Code">
        <p>Please scan the QR code and complete the payment process.</p>
    </div>
</body>

</html>
