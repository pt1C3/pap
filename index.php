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
    $BestRatedUsers = $pdo->query('SELECT * FROM user WHERE isAdmin = 0 ORDER BY rating DESC LIMIT 5 ')->fetchAll();
    ?>



    <div class='data'>
        <!--<div style="display:flex;">
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
        </div>-->
        <div>
<h1 style="text-align: left;width:100%;font-size:25pt;text-align:center;">User Leaderboard</h1>
            <div class="containerTop" ><!--Container para o top 5 -->
            <div class="userTop Top4">
            <a href="profile.php?id=<?= $BestRatedUsers[0]['userID']?>">
                <div>
                    <img src="<?= $BestRatedUsers[0]['image']?>">
                    <p><?= $BestRatedUsers[0]['username']?></p>
                    <p style="font-size:12pt">Rating: <?= round($BestRatedUsers[0]['rating'],1)?></p>
                    <p><b>4</b></p>
                    
                </div></a>
            </div>
            <div class="userTop Top2">
            <a href="profile.php?id=<?= $BestRatedUsers[0]['userID']?>">
                <div>
                    <img src="<?= $BestRatedUsers[0]['image']?>">
                    <p><?= $BestRatedUsers[0]['username']?></p>
                    <p style="font-size:12pt">Rating: <?= round($BestRatedUsers[0]['rating'],1)?></p>
                    <p><b>2</b></p>
                    
                </div></a>
            </div>

            <div class="userTop Top1" >
                <a href="profile.php?id=<?= $BestRatedUsers[0]['userID']?>">
                <div>
                    <img src="<?= $BestRatedUsers[0]['image']?>">
                    <p><?= $BestRatedUsers[0]['username']?></p>
                    <p style="font-size:12pt">Rating: <?= round($BestRatedUsers[0]['rating'],1)?></p>
                    <p><b>1</b></p>
                    
                </div></a>
            </div>

            <div class="userTop Top3">
            <a href="profile.php?id=<?= $BestRatedUsers[0]['userID']?>">
                <div>
                    <img src="<?= $BestRatedUsers[0]['image']?>">
                    <p><?= $BestRatedUsers[0]['username']?></p>
                    <p style="font-size:12pt">Rating: <?= round($BestRatedUsers[0]['rating'],1)?></p>
                    <p><b>3</b></p>
                    
                </div></a>
            </div>
            <div class="userTop Top5">
            <a href="profile.php?id=<?= $BestRatedUsers[0]['userID']?>">
                <div>
                    <img src="<?= $BestRatedUsers[0]['image']?>">
                    <p><?= $BestRatedUsers[0]['username']?></p>
                    <p style="font-size:12pt">Rating: <?= round($BestRatedUsers[0]['rating'],1)?></p>
                    <p><b>5</b></p>
                    
                </div></a>
            </div>
                
                <!--<?php foreach ($BestRatedUsers as $BestRatedUser) : ?>

                    <?php echo '<a href="profile.php?id=' . $BestRatedUser['userID'] . '"><img src="' . $BestRatedUser['image'] . '" class="userThumb"/>
                    <p class="rating" style="font-size:20pt;">' . $BestRatedUser['username'] . '</p>
                    <p class="rating">Rating:' . round($BestRatedUser['rating'],1) . '</p>
                    </a>' ?>

                <?php endforeach; ?>-->

            </div>
        </div>

        <div>
            <h1 style="text-align: left;margin-left:4%;font-size:25pt;">Best Rated Games</h1>
            <div style="display: flex;padding:2%;gap:2%">

                <?php foreach ($BestRatedGames as $BestRatedGame) : ?>

                    <?php echo '<a href="game.php?id=' . $BestRatedGame['gameID'] . '"><img src="' . $BestRatedGame['thumbnail'] . '" class="gameThumb"/>
                    <p class="rating" style="font-size:18pt;">' . $BestRatedGame['title'] . '</p>
                    <p class="rating">Rating:' . round($BestRatedGame['rating'],1) . '</p>
                    </a>' ?>

                <?php endforeach; ?>

            </div>
        </div>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<p style="align-self: center;">Welcome ' . $_SESSION['name'] . '!</p>
                <a class="play" href="play.php">Play</a>';
        }
        ?>





    </div>

    <?php include './components/footer.php'; ?>
</body>

</html>