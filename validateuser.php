<html>
<head>
    
<script language="JavaScript" type="text/JavaScript">
function updateUser(username) {
    var ajaxUser = document.getElementById("userinfo");
    ajaxUser.innerHTML = "Welcome " + username + "&nbsp;&nbsp;&nbsp;<a href=\"logout.php\">Log Out</a>";
}
</script>
</head>
<body>
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

$query = "SELECT email_address, password, complete_name, type FROM customers WHERE email_address like '" . $_POST['emailaddress'] . "' " . "AND password like (PASSWORD('" . $_POST['password'] . "'))";
$result = mysqli_query($conn, $query) or die(mysql_error());
if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        extract($row);
        echo "Welcome " . $complete_name . " to SUMart <br>";
        $_SESSION['emailaddress'] = $_POST['emailaddress'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['complete_name'] = $complete_name;
        $_SESSION['type'] = $type;
        echo "<SCRIPT LANGUAGE=\"JavaScript\">updateUser('$complete_name');</SCRIPT>";
    }
}
else {
?>
<p class="error">Invalid Email address and/or Password<br>
Not registered? <a href="validatesignup.php">Click here</a> to register.<br><br><br>
Want to try again?<br>
<a href="signin.php">Click here</a> to try login again.<br>
</p>
<?php
}
?>
</body>
</html>
