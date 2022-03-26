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

    $BestRatedGames = $pdo->query('SELECT * FROM games ORDER BY rating DESC LIMIT 4;')->fetchAll();
    $BestRatedUsers = $pdo->query('SELECT * FROM user ORDER BY rating DESC LIMIT 4;')->fetchAll();
    ?>



    <div class='data'>
        <div style="display:flex;">
            <div class='about'>
                <h1>About us</h1>
            </div>
            <div class='border'></div>
            <div class='games'>
                <h1>Supported Games</h1>
                <div class='supportedGames'>
                    <?php
                    foreach ($games as $game) {
                        echo '<a href="game.php?id=' . $game['gameID'] . '"><img src="' . $game['thumbnail'] . '" class="gameThumb"/></a>';
                    }
                    ?>
                </div>
                <p style="margin-top: 5%">...and more!</p>
            </div>
        </div>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<p style="align-self: center;">Welcome ' . $_SESSION['name'] . '!</p>
                <a class="play" href="play.php">Play</a>';
        }
        ?>


        <div>
            <h1 style="text-align: left;margin-left:4%;font-size:25pt;">Best Rated Users</h1>
            <div style="display: flex;padding:2%;gap:2%">

                <?php foreach ($BestRatedUsers as $BestRatedUser) : ?>

                    <?php echo '<a href="profile.php?id=' . $BestRatedUser['userID'] . '"><img src="' . $BestRatedUser['image'] . '" class="userThumb"/>
                    <p class="rating" style="font-size:20pt;">' . $BestRatedUser['username'] . '</p>
                    <p class="rating">Rating:' . $BestRatedUser['rating'] . '</p>
                    </a>' ?>

                <?php endforeach; ?>

            </div>
        </div>

        <div>
            <h1 style="text-align: left;margin-left:4%;font-size:25pt;">Best Rated Games</h1>
            <div style="display: flex;padding:2%;gap:2%">

                <?php foreach ($BestRatedGames as $BestRatedGame) : ?>

                    <?php echo '<a href="game.php?id=' . $BestRatedGame['gameID'] . '"><img src="' . $BestRatedGame['thumbnail'] . '" class="gameThumb"/>
                    <p class="rating" style="font-size:18pt;">' . $BestRatedGame['title'] . '</p>
                    <p class="rating">Rating:' . $BestRatedGame['rating'] . '</p>
                    </a>' ?>

                <?php endforeach; ?>

            </div>
        </div>





    </div>

    <?php include './components/footer.php'; ?>
</body>

</html>