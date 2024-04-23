<?php
// Ensure no output is sent before the header
ob_start();

session_start();
include('menu.php');

$servername = "localhost";
$username = "mayq2814_maya";
$password = "sTcycAU8KDSMcXJ"; 
$database = "mayq2814_shopping"; 
    
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
        // Redirect to checkout.php
        header("Location: checkout.php");
        exit;
    } else {
        echo "You can do purchasing by selecting items from the menu on left side";
    }
} else {
    // Redirect to signin.php if not logged in
    header("Location: signin.php");
    exit;
}

// Clear output buffer and send buffer contents
ob_end_flush();
?>
