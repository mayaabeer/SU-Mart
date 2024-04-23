<?php
$servername = "localhost";
$username = "mayq2814_maya";
$password = "sTcycAU8KDSMcXJ"; 
$database = "mayq2814_shopping"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize user inputs to prevent SQL injection
$email_address = mysqli_real_escape_string($conn, $_POST['emailaddress']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$repassword = mysqli_real_escape_string($conn, $_POST['repassword']);
$completename = mysqli_real_escape_string($conn, $_POST['complete_name']);
$address1 = mysqli_real_escape_string($conn, $_POST['address_1']);
$address2 = mysqli_real_escape_string($conn, $_POST['address_2']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$state = mysqli_real_escape_string($conn, $_POST['state']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
$phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
$type = mysqli_real_escape_string($conn, $_POST['usertype']);

// Check if passwords match and meet minimum length requirement
if ($password !== $repassword || strlen($password) < 8) {
    header("Location: validatesignup.php?error=password_mismatch_or_short");
    exit;
}

// Check if email address is valid
if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
    header("Location: validatesignup.php?error=invalid_email");
    exit;
}

// Check if email address is already registered
$query = "SELECT * FROM customers WHERE email_address = '$email_address'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    header("Location: validatesignup.php?error=email_exists");
    exit;
}

// Insert data into the database
$sql = "INSERT INTO customers (email_address, password, complete_name, address_line1, address_line2, city, state, zipcode, country, cellphone_no, type) 
        VALUES ('$email_address', (PASSWORD('$password')), '$completename', '$address1', '$address2', '$city', '$state', '$zipcode', '$country', '$phone_no', '$type')";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: validatesignup.php?success=signup_successful");
    exit;
} else {
    header("Location: validatesignup.php?error=registration_failed");
    exit;
}

$conn->close();
?>

?>
