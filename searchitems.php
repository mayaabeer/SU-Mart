<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$database = "shopping"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tosearch = $_POST['tosearch']; 

$query = "SELECT * FROM products WHERE ";
$query_fields = array();

$sql = "SHOW COLUMNS FROM products";
$columnlist = mysqli_query($conn, $sql) or die(mysql_error());

while ($arr = mysqli_fetch_array($columnlist, MYSQLI_ASSOC)) {
    extract($arr);
    $query_fields[] = "$Field LIKE '%$tosearch%'";
}

$query .= implode(" OR ", $query_fields);

$results = mysqli_query($conn, $query) or die(mysql_error());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
            <?php include "itemstyles.css" ?>
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php include('menu.php'); ?>
    </header>

    <div class="itemlist">
        <section class="container">
            <?php while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) { ?>
                <a href="itemdetails.php?itemcode=<?php echo $row['item_code']; ?>" class="itemcard">
                    <div class="card_img">
                        <img class="product_img" src="img/<?php echo $row['imagename']; ?>" alt="Image of product">
                    </div>
                    <h3><b><?php echo $row['price']; ?></b></h3>
                    <p><?php echo $row['item_name']; ?></p>
                </a>
            <?php } ?>
        </section>
    </div>
</body>
</html>

<?php $conn->close(); ?>
