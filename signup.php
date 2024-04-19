
<?php

if (isset($_GET['error'])) {
    $error = $_GET['error'];
    switch ($error) {
        case 'password_mismatch_or_short':
            echo "<p class='warning-message'>Passwords do not match or are less than 8 characters.</p>";
            break;
        case 'invalid_email':
            echo "<p class='warning-message'>Invalid email address.</p>";
            break;
        case 'email_exists':
            echo "<p class='warning-message'>Email address already exists. Please use a different email address.</p>";
            break;
        case 'registration_failed':
            echo "<p class='warning-message'>An error occurred. Please try again later.</p>";
            break;
    }
}


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU-Mart Sign Up</title>
    <style>
        <?php include "styles.css" ?>
    </style>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script language="JavaScript" type="text/JavaScript" src="checkform.js"></script>
</head>
<body>
    <div class="container_signup" style="width: 90vw; height: 82vh;>
        <form action="addcustomer.php" method="post" onsubmit="return validate(this);">
            <img class="logo" src="media/SU-Mart_logo.png" alt="SU-Mart Logo">
            <h2>Enter your personal information</h2>
            
            <div class="form">
            <div class="form-group">
                <label>User Type:</label>
            <div class="wrapper">
                        <input type="radio" name="usertype" id="buyer" value="buyer" checked>
                        <input type="radio" name="usertype" id="seller" value="seller">
                        <label for="buyer" class="option buyer">
                            <div class="dot"></div>
                            <span>Buyer</span>
                        </label>
                        <label for="seller" class="option seller">
                            <div class="dot"></div>
                            <span>Seller</span>
                        </label>
                    </div>
            </div>
            
            <div class="form-group">
                <label>Address Line 1:</label>
                <input type="text" name="address_1" size="50" required>
            </div>
            
            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" name="complete_name" size="50" class="firstinput" required>
            </div>
            
            <div class="form-group">
                <label>Address Line 2:</label>
                <input type="text" name="address_2" size="50">
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="emailaddress" size="30" class="firstinput" required>
            </div>
            
            <div class="form-group">
                <label>City:</label>
                <input type="text" name="city" size="30" required>
            </div>
            
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" size="30" class="firstinput" required>
            </div>
            
            <div class="form-group">
                <label>State:</label>
                <input type="text" name="state" size="30">
            </div>
            
            <div class="form-group">
                <label>Reenter Password:</label>
                <input type="password" name="repassword" size="30" class="firstinput" required>
            </div>
            
            <div class="form-group">
                <label>Country:</label>
                <input type="text" name="country" size="30" required>
            </div>
            
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="text" name="phone_no" size="20" class="firstinput"required>
            </div>
            
            <div class="form-group">
                <label>Zip Code:</label>
                <input type="text" name="zipcode" size="10">
            </div>
            
            <div class="form-group button">
                <div class="form-group">
                    <input type="reset" value="Clear all" class="input">
                </div>
                
                <div class="form-group">
                    <input type="submit" name="submit" value="Sign Up" class="input">
                </div>
            </div>
        </form>
    
        <p class>Have an account? <a class="link" href="signin.php">Sign in here.</a></p>
    </div>
</body>
</html>
