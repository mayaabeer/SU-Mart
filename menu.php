<!DOCTYPE html>
<?php if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }
                            ?>
<head>
    <meta charset="utf-8">
    <title>SU-Mart</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="media/css/boxicons.min.css" rel='stylesheet'>
    <style>
  <?php include "style.css" ?>
</style>
</head>
<body>
    <header class="navbar" id="navbar">
        <div class="header-top">
            <div class="header-left">
                <img src="media/SU-Mart_logo.png" alt="SU-Mart Icon">
            </div>
            <div class="header-center">
                <div class="wrap">
                    <form method="post" action="searchitems.php">
                        <div class="search">
                            <input type="text" name="tosearch" class="searchTerm" placeholder="Search now! Shop Smart at SU-Mart!">
                            <button type="submit" class="search-button"><i class='bx bx-search'></i></button>
                        </div>
                    </form>
                 </div>
            </div>
            <div class="header-right">
                <div class="favorite-icon">
                    <a href="favorite.php">
                        <i class='bx bx-heart'></i>
                        <script src="node_modules/boxicons/dist/boxicons.js"></script>
                    </a>
                </div>
                <div class="cart-icon">
                <a href="cart.php">
                    <i class='bx bx-cart'></i>
                    <script src="node_modules/boxicons/dist/boxicons.js"></script>
                    <span id="cartcountinfo"></span>
                </a>
                </div>
                <div class="user-icon">
                    <?php
                            
                            if (isset($_SESSION['emailaddress'])) {
                                echo "<a href=\"user.php\"><i class='bx bx-user'></i></a>";
                                //echo "Welcome " . $_SESSION['complete_name'] .  "&nbsp;&nbsp;&nbsp;";
                                //echo "<a href=\"logout.php\">Log Out</a>";
                            } else {
                                echo "<a href=\"signin.php\"><i class='bx bx-user'></i></a>";
                                
                            }
                            //make the user icon direct to profile page is session is logged in, logout from profile page
                        ?>
                    <!--<a href="user.php">
                        <i class='bx bx-user'></i>
                        -->
                </div>
            </div>
        </div>
        <div class="header-bottom">
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
            </div>
        <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-18vh";
        }
        prevScrollpos = currentScrollPos;
        }
    </script>
        
    </header>
    
</body>
</html>
