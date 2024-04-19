<?php
$totalquantity=0;
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
 $sess = session_id();
 $query="select * from cart where cart_sess = '$sess'";
 $results = mysqli_query($conn, $query) or die(mysql_error());
 while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
 extract($row);
 $totalquantity = $totalquantity + $cart_quantity;
 }
 echo $totalquantity;
 ?>