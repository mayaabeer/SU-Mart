<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU-Mart Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('menu.php'); ?>

    <div id="crossfade-container">
        <div class="crossfade">
            <a href="itemlist.php?category=Books">
                <img class="bottom" src="img/nyarlathotep.jpg" style="max-width:350px;max-height:350px;width:auto;height:auto;" />
                <img class="top" src="img/azathoth.jpg" style="max-width:350px;max-height:350px;width:auto;height:auto;" />
            </a>
        </div>

        <div class="crossfade">
            <a href="itemlist.php?category=Drinks">
                <img class="bottom" src="img/matchalatte.png" style="max-width:350px;max-height:350px;width:auto;height:auto;" />
                <img class="top" src="img/milkcoffee.jpg" style="max-width:350px;max-height:350px;width:auto;height:auto;" />
            </a>
        </div>

        <div class="crossfade">
            <a href="itemlist.php?category=OfficialMerch">
                <img class="bottom" src="img/sampoernahoodie.png" style="max-width:350px;max-height:350px;width:auto;height:auto;" />
                <img class="top" src="img/sampoernapins.png" style="max-width:350px;max-height:350px;width:auto;height:auto;" />
            </a>
        </div>
    </div>
    <?php
        include('itemlist.php');
    ?>
</body>
</html>
