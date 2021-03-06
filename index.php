<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Start Page - LetsGame</title>
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="styles.css">
    <title>LetsGame</title>
</head>

<body>
    <?php
    session_start();
    include "./auth/db.php";
    $images = $pdo->query('SELECT thumbnail FROM games ORDER BY rating DESC LIMIT 4;')->fetchAll(PDO::FETCH_COLUMN) ?>
    <div id="slider">
        <ul id="slideWrap">
            <?php
            foreach ($images as $image) {
                echo '<li><img src="' . $image . '" ></li>';
            }
            ?>
        </ul>
    </div>
    <div class="right" style="top:0;right:0; position:absolute;z-index:5;margin-top:3%;margin-right:5%">
    <?php
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<a class="navUser" href="userProfile.php">
                <img class="navuserAvatar" src="'. $_SESSION['userAvatar']. '"/>
                <p>'. $_SESSION['username']. '</p>
                </a>
                <a href="./auth/logout.php" style="display:inline;"><button class="logout">SIGN OUT</button></a>';
            } else {
                echo '<a href="register.php" style="display:inline;"><button class="register">REGISTER</button></a>
                <a href="login.php" style="display:inline;"><button class="login">LOGIN</button></a>';
            } ?>
            </div>
    <div style="bottom:0;left:0; position:absolute;z-index:5;margin-bottom:10%;margin-left:5%">
    <img src="./images/logo.png">
    <p>The place where you can find the perfect partners for your favorite games.<br> This is the perfect place for you to find people to play with.</p>
    </div>
    
    <a style="position:absolute;right:0;bottom:0;margin-bottom:10%;margin-right:5%" href="homePage.php">
            <button class="next">Next</button>
    </a>

    <br>
<?php     include './scripts/update_user_lastActivity.php'; ?>
    <script>
        var responsiveSlider = function() {

            var slider = document.getElementById("slider");
            var sliderWidth = slider.offsetWidth;
            var slideList = document.getElementById("slideWrap");
            var count = 1;
            var items = slideList.querySelectorAll("li").length;

            window.addEventListener('resize', function() {
                sliderWidth = slider.offsetWidth;
            });

            var nextSlide = function() {
                if (count < items) {
                    slideList.style.left = "-" + count * sliderWidth + "px";
                    count++;
                } else if (count = items) {
                    slideList.style.left = "0px";
                    count = 1;
                }
            };

            setInterval(function() {
                nextSlide()
            }, 5000);

        };

        window.onload = function() {
            responsiveSlider();
        }
    </script>
</body>

</html>