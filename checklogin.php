<?php
include('menu.php');

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

$cartamount = 0;
$cartamount = $_POST['cartamount'];
$_SESSION['cartamount'] = $cartamount;

if (isset($_SESSION['emailaddress'])) {
    $email_address = $_SESSION['emailaddress'];
    echo "Welcome " . $email_address . ". <br/>";
}

if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
}

if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") || (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
    $sess = session_id();
    $query = "SELECT * FROM cart WHERE cart_sess = '$sess'";
    $result = mysqli_query($conn, $query) or die(mysql_error());

    if (mysqli_num_rows($result) >= 1) {
        echo "<br>If you have finished shopping ";
        echo "<a href=shipping_info.php>Click Here</a> to supply Shipping Information if you'd like the item to be delivered to you.<br>";
        echo "<a href=purchase.php>Click Here</a> to pay immediately if you want to pickup the item at SU.<br>";
        echo "Or you can do more purchasing by selecting items from the menu ";
    } else {
        echo "You can do purchasing by selecting items from the menu on left side";
    }
} else {
?>
<html>
<head>
</head>
<body>
    <h3>Not Logged in yet</h1>
    <p>
        You are currently not logged into our system.<br>
        You can do purchasing only if you are logged in.<br>
        If you have already registered,
        <a href="signin.php">click here</a> to login, or if would like to create an account,
        <a href="validatesignup.php">click here</a> to register.
    </p>
</body>
</html>
<?php
}
?>
