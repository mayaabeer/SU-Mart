<?php
// include('menu.php');

if (!session_id()) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pickup_submit'])) {

    $pickup_location = $_POST['pickup_location'];
    header("Location: payment_options.php");
    exit;
}
// ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pickup Options</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container_signin">
        <h2>Pickup Options</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="pickup_location">Select pickup location:</label><br>
            <select id="pickup_location" name="pickup_location">
                <option value="SUSU">SUSU</option>
                <option value="SL7">SL 7th floor</option>
                <option value="SL19">SL 19th floor</option>
            </select><br><br>
            <input type="submit" name="pickup_submit" value="Proceed to Payment">
        </form>
    </div>
</body>

</html>
