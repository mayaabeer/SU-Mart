<html>


<?php

$servername = "localhost";
$username = "root";
$password = ""; 
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

// echo "<table border=\"0\">";
$count = 0;

?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SU-Mart</title>
        <style>
            <?php include "itemstyles.css" ?>
        </style>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <header>
        <?php
            include('menu.php');
        ?>
        </header>
        <div class="itemlist">
        
        <section class="container">
        <?php 
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            extract($row);
            // if ($count % 5 == 0) {
            //     echo "<tr>";
            // }
            
            ?>
        <a href=itemdetails.php?itemcode=<?php echo $item_code; ?>>
            <div class="itemcard">
                <div class="card_img"><img class="product_img" src="img/<?php echo $imagename?>" alt="Image of product"></img></div>
                <h3><b><?php echo $price ?></b></h3>
                <p><?php echo $item_name ?></p>
            </div>
        </a>
        <?php } ?>
        </section>
        </div>
    
    </body>



