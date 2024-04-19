

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU-Mart Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .error {
        color: #a71010; 
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container_signin">
        <img class="logo" src="media/SU-Mart_logo.png" alt="SU-Mart Logo">
        <h2>sign in to your account</h2>

        <?php
        if (isset($_GET['error'])) {
            echo "<p class='error'>" . $_GET['error'] . "</p>";
        }
        ?>

        <form action="validateuser.php" method="post">
            <table border="0" cellspacing="1" cellpadding="3">
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="emailaddress"><box-icon name='user'></box-icon></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password"><box-icon name='lock-alt' ></box-icon></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Sign In" class="input">
        </form>
        <p>Don't have an account? <a class="link" href="validatesignup.php">Sign up now!</a></p> 
    </div>
</body>
</html>
