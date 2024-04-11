<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "shopping"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email_address = $_POST['emailaddress'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$completename = $_POST['complete_name'];
$address1 = $_POST['address_1'];
$address2 = $_POST['address_2'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zipcode = $_POST['zipcode'];
$phone_no = $_POST['phone_no'];
$type = $_POST['usertype'];

$sql = "INSERT INTO customers (email_address, password, complete_name, address_line1, address_line2, city, state, zipcode, country, cellphone_no, type) VALUES ('$email_address', (PASSWORD('$password')), '$completename', '$address1', '$address2', '$city', '$state', '$zipcode', '$country', '$phone_no', '$type')";
$result = mysqli_query($conn, $sql) or die(mysql_error());

if ($result)
{
    ?>
    <p>
    Dear <?php echo $completename; ?>, your account has been created.
    <?php
}
else
{
    echo "An error has occured. Please use a different email address.";
}
