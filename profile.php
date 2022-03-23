<?php session_start();
include("./auth/db.php");
include 'auth/verificarLogin.php';
if ($_GET["id"] != $_SESSION["id"])
{
    if (isset($_GET["id"]) == true) {
        $user = $pdo->query('SELECT * FROM user WHERE userID=' . $_GET["id"])->fetch();
        $dadosLanguages = $pdo->query("SELECT userLanguage FROM languages where userID=" . $_GET["id"])->fetchall();
        $languages = array_column($dadosLanguages, 0);
        $followers = $pdo->query("SELECT Count(*) as 'number' FROM follows where followedID=" . $user["userID"])->fetch();
    } 
}
else header("location:./userProfile.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="profile.css">
    <title><?= $user["username"]; ?> - LetsGame</title>
</head>

<body>
    <?php include("./components/navbar.php"); ?>
    <div class='data'>
        <div id="userInfo">
            <img style="border: 3pt solid #000a92" src="<?= $user["image"] ?>">
            <div class="userText">
                <p class="userName"><?php echo $user["username"] ?></p>
                <p> Languages:
                    <?php
                    $numItems = count($languages);
                    $i = 0;

                    foreach ($languages as $language) {
                        if (++$i === $numItems) echo $language;
                        else echo $language . ', ';
                    }



                    ?></p>
                <p>
                    Sex: <?= $user["sex"] ?>
                </p>
                <p style="margin-top:2%;width:100%;"> <?= $user["biography"] ?></p>
            </div>
            <div class="rightItems" style="max-height:80%;text-align:center;margin-right:2%;width:30%;">
                <div style="display:flex;justify-content:space-between;">
                    <p style="text-align:center; font-size: 15pt;"> Rating:</br><?= round($user["rating"],1) ?></p>
                    <p style="text-align:center; font-size: 15pt;"> Followers:</br><?= $followers["number"] ?></p>
                </div>
                <?php
                $queryFollow = $pdo->query('SELECT Count(*) as "segue" FROM follows WHERE followedID=' . $user["userID"] . ' and followerID =' . $_SESSION["id"])->fetch()['segue'];
                if($queryFollow != 0)
                {
                    $followAge = $pdo->query('SELECT DISTINCT DATE(followDate) as "followDate" FROM follows WHERE followedID=' . $user["userID"] . ' and followerID =' . $_SESSION["id"])->fetch();
                    echo '<a href="./auth/unfollow.php?id=' . $user['userID'] . '"> <button class="btnEdit">Unfollow</button></a>
                    <p style="margin-top:3pt;"> You follow: <b>' . $user['username']. '</b> <br/> since <b>' .$followAge["followDate"] . '</b></p>';
                    
                }
                    else echo '<a href="./auth/follow.php?id=' . $user['userID']. '"><button class="btnEdit">Follow</button></a>';
                ?>
            </div>
        </div>
        <div id="bottomElements">
            <div style="display:flex;height:100%;">
                <div class="listasPerfil">
                    <h1>Liked Games</h1>

                    <div class="lista">
                        <?php
                        $gameIDs = $pdo->query('SELECT gameID FROM likedgames where userID= ' . $user["userID"])->fetchAll();
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
                        $users = $pdo->query('SELECT * FROM user INNER JOIN follows on user.userID=follows.followedID where isAdmin = 0 and followerID=' . $user["userID"])->fetchAll();
                        foreach ($users as $user) {
                            echo '<a href="profile.php?id='. $user['userID'].'" class="itemLista">
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
</body>

</html>