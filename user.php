<html>
    <head>
    <meta charset="utf-8">
    <title>SU-Mart</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="media/css/boxicons.min.css" rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        include('menu.php');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['cartamount'])) {
            $cartamount = $_SESSION['cartamount'];
        }

        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $database = "shopping"; 
            
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
       <div class="content" style="margin-top: 200px;">
            <div style="text-align: center; font-size: 40px; color: #0F044C; text-shadow: 0 0 2px rgba(0, 0, 0, 0.5);"> 
                <i class='bx bxs-user-circle'></i>
            </div>
            <form action="purchase.php" method="post">
            <table border="0" cellspacing="1" cellpadding="3" class="information">
                <tr>
                    <td colspan="2" align="center"><h2>Hello <?php echo $complete_name?>!</h2></td>
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
                    <td>Phone No:</td>
                    <td><input size="30" type="text" name="phone_no" value="<?php echo $cellphone_no; ?>" readonly></td>
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
                
            </table>
            <div style="text-align: center;  margin-top: 20px;">
                <a class="link" href="logout.php">Log Out</a>
            </div>
        </div>
        <?php
        }
        ?>
    </body>
</html>