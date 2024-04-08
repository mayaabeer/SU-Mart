<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUMart Home Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #crossfade-container {
            display: flex;
            margin-right: 250px;
        }
        .crossfade {
            position: relative;
            height: 350px;
            width: 350px;
            overflow: hidden;
            margin-right: 10px;
        }
        .crossfade img {
            position: absolute;
            left: 0;
            -webkit-transition: opacity 1s ease-in-out;
            -moz-transition: opacity 1s ease-in-out;
            -o-transition: opacity 1s ease-in-out;
            transition: opacity 1s ease-in-out;
        }
        @keyframes crossfadeFadeInOut {
            0% {
                opacity: 1;
            }
            45% {
                opacity: 1;
            }
            55% {
                opacity: 0;
            }
            100% {
                opacity: 0;
            }
        }
        .crossfade img.top {
            opacity: 1;
            animation-name: crossfadeFadeInOut;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
            animation-duration: 5s;
            animation-direction: alternate;
        }

    </style>
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
</body>
</html>
