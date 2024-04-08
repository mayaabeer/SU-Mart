<?php
include('menu.php');

$servername = "localhost";
$username = "Joshua";
$password = "password"; 
$database = "shopping"; 
            
$conn = new mysqli($servername, $username, $password, $database);
            
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$categories = explode(',', $_REQUEST['category']);

$whereClause = '';
foreach ($categories as $category) {
    $category = trim($category);
    $whereClause .= "category LIKE '%$category%' OR ";
}
$whereClause = rtrim($whereClause, " OR ");

$query = "SELECT item_code, item_name, description, imagename, price FROM products WHERE $whereClause ORDER BY item_code";
$results = mysqli_query($conn, $query) or die(mysql_error());

echo "<table border=\"0\">";
$count = 0;

while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
    extract($row);
    if ($count % 5 == 0) {
        echo "<tr>";
    }
    echo "<td style=\"padding-right:15px;\">";
    echo "<a href=itemdetails.php?itemcode=$item_code>";
    echo '<img src=img/' . $imagename . ' style="max-width:220px;max-height:240px;width:auto;height:auto;"></img></br>';
    echo $item_name . '<br/>';
    echo "</a>";
    echo '$'.$price .'<br/>';
    echo "</td>";

    $count++;
    
    if ($count % 5 == 0) {
        echo "</tr>";
    }
}

if ($count % 5 != 0) {
    echo "</tr>";
}

echo "</table>";
?>