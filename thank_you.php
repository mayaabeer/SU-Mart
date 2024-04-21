<?php
if (!session_id()) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = ""; 
$database = "shopping"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sessid = session_id();
$query = "SELECT * FROM cart WHERE cart_sess = '$sessid'";
$results = mysqli_query($conn, $query) or die(mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="media/css/boxicons.min.css" rel='stylesheet'>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            }

            th, td {
            border: 1px solid #787A91;
            padding: 8px;
            }

            th {
            background-color: #F3F4F6;
            }

            tr:nth-child(even) {
            background-color: #fff;
            }

    </style>
</head>

<body>
    <div class="container_thankyou">
        <img class="logo" src="media/SU-Mart_logo.png" alt="SU-Mart Logo">

        <p style="text-align: left;">Below is your receipt:</p>
        <div class="receipt">
            <table>
                <tr>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price (Rp)</th>
                    <th>Total Price (Rp)</th>
                </tr>
                <?php
                $total_due = 0; // Initialize total due
                while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                    extract($row);
                    $totalprice = $cart_price * $cart_quantity;
                    $total_due += $totalprice; // Add to total due
                    echo "<tr><td>";
                    echo $cart_itemcode;
                    echo "</td><td>";
                    echo $cart_item_name;
                    echo "</td><td>";
                    echo $cart_quantity;
                    echo "</td><td>";
                    echo "Rp" . number_format($cart_price, 0, ',', '.'); // Format price as Indonesian Rupiah
                    echo "</td><td>";
                    echo "Rp" . number_format($totalprice, 0, ',', '.'); // Format total price as Indonesian Rupiah
                    echo "</td></tr>";
                }
                ?>
            </table>
        </div>
        <p style="text-align: right; font-weight: 600;">Total Due: Rp<?php echo number_format($total_due, 0, ',', '.'); ?></p>
        <p>Thank you for shopping with us! <br>Please save and show this receipt during pick up or receiving delivery.</p>
        <form action="index.php">
            <input type="submit" value="Exit Receipt" class="input">
        </form>
    </div>
</body>

</html>
