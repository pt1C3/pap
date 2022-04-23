<?php session_start();
include("./auth/db.php");
$game = $pdo->query('SELECT * FROM games WHERE gameID=' . $_GET["id"])->fetch();
$gameLikes = $pdo->query('SELECT Count(*) as "likes" FROM likedgames WHERE gameID=' . $_GET["id"])->fetch();





?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="game.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <title><?= $game["title"] ?> - LetsGame</title>
</head>

<body>
    <?php include("./components/navbar.php"); ?>
    <div class='data'>
        <div id="gameInfo">
            <img style="border: 3pt solid #2d34a1" src="<?= $game["thumbnail"] ?>">
            <div class="userText">
                <p class="userName"><?= $game["title"] ?>
            
                <div class="menu">
                    <button class="menuBtn">  <img src="./images/three dots.svg" class="pontos"></a></button>
                    <div class="menuContent">
                    <a href="#">Rate</a>
                    </div>
                </div></p>
                <p> <?= $game["genre"] ?></p>
                <a style="margin-top:2%;" href="<?= $game["link"] ?>" target="_blank">Store</a>
            </div>
            <div class="rightItems" style="max-height:80%;text-align:center;margin-right:2%;width:30%;">
                <div style="display:flex;justify-content:space-between;">
                    <p style="text-align:center; font-size: 15pt;"> Rating:</br><?= round($game["rating"], 1)     ?></p>
                    <p style="text-align:center; font-size: 15pt;"> Likes:</br><?= $gameLikes["likes"] ?></p>
                </div>
                <?php
                if (isset($_SESSION["id"])) //se tiver sessao iniciada, se nao nao tem botao de like
                {
                    if (in_array($_GET["id"], $_SESSION["likes"])) //se estiver o id no array ja tem like,por isso dislike
                    {
                        echo "<a href=\"auth/dislike.php?id=" . $_GET["id"] . "\"><button class=\"btnEdit\" >Dislike</button></a>";
                    } else { //se nao like
                        echo "<a href=\"auth/like.php?id=" . $_GET["id"] . "\"><button class=\"btnEdit\" >Like</button></a>";
                    }
                }

                ?>
                <!--<button class="btnEdit" href="auth/like.php">Like</button>-->
            </div>
        </div>
        <span>
            <h1 style="width:20%;margin-left:40%;margin-bottom:2%;">Game Trailer</h1>
            <?= $game["trailer"]?>
<span>
        <div id="bottomElements">
            <div style="display:flex;height:100%;">
                <div class="listasPerfil">
                    <h1>More Like This</h1>

                    <div class="lista">
                        <?php
                        $games = ($pdo->query('SELECT * FROM games WHERE genre="' . $game["genre"] . '"'))->fetchAll();


                        foreach ($games as $game2) {

                            $likes = ($pdo->query('SELECT Count(*) as "likes" FROM likedgames WHERE gameID="' . $game2["gameID"] . '"'))->fetch();
                            echo '
                            <a href="game.php?id=' . $game2['gameID'] . '" class="itemLista">
                            <img src="' . $game2['thumbnail'] . '" style="height:100px;"/>
                            <div>
                            <p>' . $game2['title'] . '</p>
                            <p>Rating: ' . $game2['rating'] . '</p>
                            </div>
                            <p>Likes: <br/>' . $likes['likes'] . '</p>
                            </a>';
                        }


                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    include './components/footer.php'; 
    include './scripts/update_user_lastActivity.php'; 
    ?>
    
</body>

</html>