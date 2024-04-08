<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SU-Mart Sign Up</title>
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script language="JavaScript" type="text/JavaScript" src="checkform.js"></script>
    </head>
    <body>
        <div class="container_signup">
        <form action="addcustomer.php" method="post" onsubmit="return validate(this);">
            <img class="logo" src="media/SU-Mart_logo.png" alt="SU-Mart Logo">
            <h2>Enter your personal information</h2>
            <table border="0" cellspacing="1" cellpadding="3">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="complete_name" size="50"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="emailaddress" size="30"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" size="30"></td>
                </tr>
                <tr>
                    <td>Reenter Password:</td>
                    <td><input type="password" name="repassword" size="30"></td>
                </tr>
                <tr>
                    <td>Address Line 1:</td>
                    <td><input type="text" name="address_1" size="50"></td>
                </tr>
                <tr>
                    <td>Address Line 2:</td>
                    <td><input type="text" name="address_2" size="50"></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city" size="30"></td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><input type="text" name="state" size="30"></td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td><input type="text" name="country" size="30"></td>
                </tr>
                <tr>
                    <td>Zip Code:</td>
                    <td><input type="text" name="zipcode" size="10"></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phone_no" size="20"></td>
                </tr>
                
                <tr><td>User Type:</td><td><select name="type">
                <option value="buyer">Buyer</option>
                <option value="seller">Seller</option>
            </select></td></tr>
                <tr>
                    <td colspan="2" style="align: right">
                    <input type="reset" value="Clear all" class="input">
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Sign Up" class="input">
                        
            <p>Have an account? <a class="link" href="signin.php">Sign in here.</a></p>
            <p>Interested in becoming a seller? <a class="link" href="validatesignup.php">Sign up here.</a></p>
            </div>
        </form>
    </body>
</html>
