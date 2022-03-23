<?php session_start();
include("./auth/db.php");
include 'auth/verificarLogin.php';


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="profile.css">
    <title><?php if (isset($_GET["id"]) == true) echo $user["username"];
            else echo $_SESSION["username"]; ?> - LetsGame</title>
</head>

<body>
    <?php include("./components/navbar.php"); ?>
    <div class='data'>
        <div id="userInfo">
            <img style="border: 3pt solid #000a92" src="<?php echo $_SESSION["userAvatar"] ?>">
            <div class="userText">
                <p class="userName"><?php echo $_SESSION["username"] ?></p>
                <p> Languages:
                    <?php
                    $numItems = count($_SESSION['languages']);
                    $i = 0;

                    foreach ($_SESSION['languages'] as $language) {
                        if (++$i === $numItems) echo $language['userLanguage'];
                        else echo $language['userLanguage'] . ', ';
                    }



                    ?></p>
                <p>
                    Sex: <?= $_SESSION["sex"] ?>
                </p>
                <p style="margin-top:2%;width:100%;"> <?= $_SESSION["description"] ?></p>
            </div>
            <div class="rightItems" style="max-height:80%;text-align:center;margin-right:2%;width:30%;">
                <div style="display:flex;justify-content:space-between;">
                    <p style="text-align:center; font-size: 15pt;"> Rating:</br><?= $_SESSION["rating"] ?></p>
                    <p style="text-align:center; font-size: 15pt;"> Followers:</br><?= $_SESSION["followers"] ?></p>
                </div>
                <a href="?edit"><button class="btnEdit">Edit</button></a>
            </div>
        </div>
        <div id="bottomElements">
            <div style="display:flex;height:100%;">
                <div class="listasPerfil">
                    <h1>Liked Games</h1>

                    <div class="lista">
                        <?php
                        $gameIDs = $pdo->query('SELECT gameID FROM likedgames where userID= ' . $_SESSION["id"])->fetchAll();
                        foreach ($gameIDs as $id) {
                            $game = $pdo->query('SELECT * FROM games where gameID= ' . $id["gameID"])->fetch();
                            echo '<a href="game.php?id=' . $game['gameID'] . '" class="itemLista">
                            <img src="' . $game['thumbnail'] . '" style="height:100px;"/>
                            <p>' . $game['title'] . '</p>
                            </a>';
                        }

                        ?>
                    </div>
                </div>
                <div class='border'></div>
                <div class="listasPerfil">
                    <h1 style="padding-left:2%">Follows</h1>
                    <div class="lista">
                        <?php
                        /*                                                           |               |-> buscar o ID dos que são seguidos; |                             |-> por este utilizador*/
                        $users = $pdo->query('SELECT * FROM user INNER JOIN follows on user.userID=follows.followedID where isAdmin = 0 and followerID=' . $_SESSION["id"])->fetchAll();

                        foreach ($users as $user) {
                            echo '<a href="profile.php?id=' . $user['userID'] . '" class="itemLista">
                            <img src="' . $user['image'] . '" style="height:100px;"/>
                            <p>' . $user['username'] . '</p>
                            </a>';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        /*
        var lastScrollTop = 0;
        window.onscroll = function() {
            var st = window.pageYOffset || document.documentElement.scrollTop;
            if (st > lastScrollTop) {
                document.getElementById('bottomElements').scrollIntoView({
                    block: "end",
                    inline: "nearest"
                });
            } else {
                document.getElementById('userInfo').scrollIntoView({
                    block: "end",
                    inline: "nearest"
                });
            }
            lastScrollTop = st <= 0 ? 0 : st;
        };
        */
    </script>

    }
</body>

</html>