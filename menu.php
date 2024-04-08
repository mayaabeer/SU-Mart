<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SU Mart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table width="100%" cellspacing="0" cellpadding="2">
        <col style="width:30%">
        <col style="width:40%">
        <col style="width:20%">
        <tr>
            <td style="background-color:white;color:Blue;"></td>
            <td style="background-color:white;color:Blue;"></td>
            <td style="background-color:white;color:Blue;"></td>
            <?php
            if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            if (isset($_SESSION['emailaddress'])) {
                echo "Welcome " . $_SESSION['complete_name'] .  "&nbsp;&nbsp;&nbsp;";
                echo "<a href=\"logout.php\">Log Out</a></td></tr>";
            } else {
                echo "<a href=\"signin.php\">Login</a>&nbsp;&nbsp;&nbsp;";
                echo "<a href=\"validatesignup.php\">Signup</a></td></tr>";
            }
            ?>
        </tr>
        <tr>
            <td style="font-size: 35px;color:blue;background-color:white;">
                <img src="img/SUMartIcon.jpeg" alt="SUMartIcon" style="max-width:200px;max-height:200px;">
            </td>
            <td bgcolor="white">
                <form method="post" action="searchitems.php">
                    <input size="50" type="text" name="tosearch">
                    <input type="submit" name="submit" value="Search">
                </form>
            </td>
            <td bgcolor="white">
                <a href="cart.php">
                    <img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="img/cart.png" alt="CartIcon">
                    <span id="cartcountinfo"></span>
                </a>
            </td>
        </tr>
    </table>
    <div class="container">
        <nav>
            <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a href="itemlist.php?category=OfficialMerch,StudentMerch">Merchandise</a>
                    <ul>
                        <li><a href="itemlist.php?category=OfficialMerch">Official SU Merch</a></li>
                        <li><a href="itemlist.php?category=StudentMerch">Student/BEM Merch</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="itemlist.php?category=Food,Drinks">Food Items</a>
                    <ul>
                        <li><a href="itemlist.php?category=Food">Food</a></li>
                        <li><a href="itemlist.php?category=Drinks">Drinks</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="itemlist.php?category=Stationery,Books">Study Essentials</a>
                    <ul>
                        <li><a href="itemlist.php?category=Stationery">Stationery</a></li>
                        <li><a href="itemlist.php?category=Books">Books</a></li>
                    </ul>
                </li>
                <li><a href="itemlist.php?category=Tickets">Event Tickets</a></li>
                <?php
                if (isset($_SESSION['type']) && $_SESSION['type'] == 'seller') {
                    echo '<li><a href="addproduct.php">Add Product</a></li>';
                }
                ?>
            </ul>
        </nav>
        <br>
    </div>
</body>
</html>