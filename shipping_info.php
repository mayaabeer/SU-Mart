
<?php
// include('menu.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['cartamount'])) {
    $cartamount = $_SESSION['cartamount'];
}

$servername = "localhost";
$username = "mayq2814_maya";
$password = "sTcycAU8KDSMcXJ"; 
$database = "mayq2814_shopping"; 
    
$conn = new mysqli($servername, $username, $password, $database);
    
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email_address = "";
if (isset($_SESSION['emailaddress'])) {
    $email_address = $_SESSION['emailaddress'];
}

if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
}

if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") || (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
    $query = "SELECT * FROM customers  WHERE email_address LIKE '$email_address' AND password LIKE (PASSWORD('$password'))";
    $results = mysqli_query($conn, $query) or die(mysql_error());
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
    extract($row);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="media/css/boxicons.min.css" rel='stylesheet'>
    <style>
        <?php include "styles.css" ?>
    </style>
</head>
<body>
    <div class="container_shipping">
    <form action="payment_options.php" method="post" >
        <table border="0" cellspacing="1" cellpadding="3">
            <tr>
                <td colspan="2" align="center"><h3>Your information available with us:</h3></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><input size="20" type="text" name="email_address" value="<?php echo $email_address; ?>" readonly></td>
            </tr>
            <tr>
                <td>Complete Name:</td>
                <td><input size="50" type="text" name="complete_name" value="<?php echo $complete_name; ?>" readonly></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input size="80" type="text" name="address1" value="<?php echo $address_line1; ?>" readonly></td>
            </tr>
            <tr>
                <td></td>
                <td><input size="80" type="text" name="address2" value="<?php echo $address_line2; ?>" readonly></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input size="30" type="text" name="city" value="<?php echo $city; ?>" readonly></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input size="30" type="text" name="state" value="<?php echo $state; ?>" readonly></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><input size="30" type="text" name="country" value="<?php echo $country; ?>" readonly></td>
            </tr>
            <tr>
                <td>Zip Code:</td>
                <td><input size="20" type="text" name="zipcode" value="<?php echo $zipcode; ?>" readonly></td>
            </tr>
            <tr>
                <td>Phone No:</td>
                <td><input size="30" type="text" name="phone_no" value="<?php echo $cellphone_no; ?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><h3>You can edit shipping information below:</h3></td>
            </tr>
            <tr>
                <td>Address to deliver at:</td>
                <td><input type="text" size="80" name="shipping_address_line1" value="<?php echo $address_line1; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text" size="80" name="shipping_address_line2" value="<?php echo $address_line2; ?>"></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input size="30" type="text" name="shipping_city" value="<?php echo $city; ?>"></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input size="30" type="text" name="shipping_state" value="<?php echo $state; ?>"></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><input size="30" type="text" name="shipping_country" value="<?php echo $country; ?>"></td>
            </tr>
            <tr>
                <td>Zip Code:</td>
                <td><input type="text" size="20" name="shipping_zipcode" value="<?php echo $zipcode; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Confirm" class="input"></td>
  
            </tr>
        </table>
    </form>
    </div>
<?php
}
?>
</body>
</html>
