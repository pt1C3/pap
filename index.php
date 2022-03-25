<html>

<head>
    <title>Home - LetsGame</title>
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php 
    session_set_cookie_params(0);
    session_start();
    include './components/navbar.php';
    include './auth/db.php';
    $games = $pdo->query('SELECT * FROM games ORDER BY rating DESC LIMIT 4;')->fetchAll();
    ?>



        <div class='data'>
            <div style="display:flex;">
                <div class='about'>
                    <h1>About us</h1>
                    <p><b>Let's Game!</b> is a app where you can find the perfect partners for your favorite games. This is the perfect place for you to find people to play with.</p>
                </div>
                <div class='border'></div>
                <div class='games'>
                    <h1>Supported Games</h1>
                    <div class='supportedGames'>
                        <?php
                        foreach ($games as $game) {
                            echo '<a href="game.php?id='. $game['gameID']. '"><img src="'. $game['thumbnail'].'" class="gameThumb"/></a>';
                        }
                        ?>
                    </div>
                    <p style="margin-top: 5%">...and more!</p>
                </div>
            </div>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<p style="align-self: center;">Welcome '. $_SESSION['name']. '!</p>
                <a class="play" href="play.php">Play</a>';
            }
            ?>

        </div>

     <?php include './components/footer.php'; ?>
</body>

</html>