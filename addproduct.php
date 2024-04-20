<?php
 include('menu.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="media/css/boxicons.min.css" rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content" style="margin-top: 200px;">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <label for="item_code">Item Code:</label>
        <input type="text" id="item_code" name="item_code" required><br><br>

        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required><br><br>

        <label for="brand_name">Brand Name:</label>
        <input type="text" id="brand_name" name="brand_name" required><br><br>

        <label for="model_number">Model Number:</label>
        <input type="text" id="model_number" name="model_number" required><br><br>

        <label for="weight">Weight:</label>
        <input type="text" id="weight" name="weight"><br><br>

        <label for="dimension">Dimension:</label>
        <input type="text" id="dimension" name="dimension"><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="OfficialMerch">Official Merchandise</option>
            <option value="StudentMerch">Student Merchandise</option>
            <option value="Food">Food</option>
            <option value="Drinks">Drink</option>
            <option value="Stationery">Stationery</option>
            <option value="Books">Book</option>
            <option value="Tickets">Event Ticket</option>
        </select><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/jpeg, image/png" required style="background-color: white; border: 2px solid #0F044C; "><br><br>

        <label for="feature1">Feature 1:</label>
        <input type="text" id="feature1" name="feature1"><br><br>

        <label for="feature2">Feature 2:</label>
        <input type="text" id="feature2" name="feature2"><br><br>

        <label for="feature3">Feature 3:</label>
        <input type="text" id="feature3" name="feature3"><br><br>

        <label for="feature4">Feature 4:</label>
        <input type="text" id="feature4" name="feature4"><br><br>

        <label for="feature5">Feature 5:</label>
        <input type="text" id="feature5" name="feature5"><br><br>

        <label for="feature6">Feature 6:</label>
        <input type="text" id="feature6" name="feature6"><br><br>

        <input type="submit" value="Submit" class="input">
    </form>
</div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "shopping";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if (isset($_SESSION['user_id'])) {
            $session_id = $_SESSION['user_id'];
        }
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $targetDir = "img/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        
        $allowTypes = array('jpg','png');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                $sql = "INSERT INTO products (item_code, item_name, brand_name, model_number, weight, dimension, description, category, quantity, price, imagename, user_id)
                VALUES ('".$_POST["item_code"]."', '".$_POST["item_name"]."', '".$_POST["brand_name"]."', '".$_POST["model_number"]."', '".$_POST["weight"]."', '".$_POST["dimension"]."', '".$_POST["description"]."', '".$_POST["category"]."', ".$_POST["quantity"].", ".$_POST["price"].", '".$fileName."', $session_id)";
                if ($conn->query($sql) === TRUE) {
                    $last_id = $conn->insert_id;
                    $sql_features = "INSERT INTO productfeatures (item_code, feature1, feature2, feature3, feature4, feature5, feature6)
                    VALUES ('".$_POST["item_code"]."', '".$_POST["feature1"]."', '".$_POST["feature2"]."', '".$_POST["feature3"]."', '".$_POST["feature4"]."', '".$_POST["feature5"]."', '".$_POST["feature6"]."')";
                    if ($conn->query($sql_features) === TRUE) {
                        echo "Product added successfully.";
                    } else {
                        echo "Error: " . $sql_features . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else{
                echo "Error uploading file.";
            }
        } else{
            echo "Only JPG and PNG files are allowed.";
        }
        $conn->close();
    }
    ?>
</body>
</html>

