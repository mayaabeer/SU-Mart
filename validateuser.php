<html>
    <head>
    </head>
        <body>
            <?php
            $servername = "localhost";
            $username = "Joshua";
            $password = "password"; 
            $database = "shopping"; 
            
            $conn = new mysqli($servername, $username, $password, $database);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query = "SELECT email_address, password, complete_name FROM customers WHERE email_address like '" . $_POST['emailaddress'] . "' " . "AND password like (PASSWORD('" . $_POST['password'] . "'))";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            if (mysqli_num_rows($result) == 1) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    extract($row);
                    echo "Welcome " . $complete_name . " to SU Mart. <br>";
                }
            }
            else {
                ?>
                Invalid Email and/or Password<br>
                Not registered?
                <a href="validatesignup.php">Click here</a> to register.<br><br><br>
                <a href="signin.php">Click here</a> to login again.<br>
                <?php
            }
            ?>
        </body>
</html>