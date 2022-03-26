<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexTest.css">
    <link rel="stylesheet" href="styles.css">
    <title>LetsGame</title>
</head>

<body>
    <?php
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
        <a href="register.php">
            <button class="register-button">REGISTER</button>
        </a>

        <a href="login.php">
            <button class="login-button">LOGIN</button>
        </a>
    </div>
    <div style="bottom:0;left:0; position:absolute;z-index:5;margin-bottom:10%;margin-left:5%">
    <img src="./images/logo.png">
    <p>vuedas textooooooooooooooooos</p>
    </div>

    <br>

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
            }, 2000);

        };

        window.onload = function() {
            responsiveSlider();
        }
    </script>
</body>

</html>