<?php session_start();
include("./auth/db.php");
include 'auth/verificarLogin.php';
if ($_GET["id"] != $_SESSION["id"]) {
    if (isset($_GET["id"]) == true) {
        $user = $pdo->query('SELECT * FROM user WHERE userID=' . $_GET["id"])->fetch();
        $dadosLanguages = $pdo->query("SELECT userLanguage FROM languages where userID=" . $_GET["id"])->fetchall();
        $languages = array_column($dadosLanguages, 0);
        $followers = $pdo->query("SELECT Count(*) as 'number' FROM follows where followedID=" . $user["userID"])->fetch();
        $comments = $pdo->query("SELECT *  FROM comment where profileID=" . $user["userID"])->fetchall();
    }
} else header("location:./userProfile.php");
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
                    <p style="text-align:center; font-size: 15pt;"> Rating:</br><?= round($user["rating"], 1) ?></p>
                    <p style="text-align:center; font-size: 15pt;"> Followers:</br><?= $followers["number"] ?></p>
                </div>
                <?php
                $queryFollow = $pdo->query('SELECT Count(*) as "segue" FROM follows WHERE followedID=' . $user["userID"] . ' and followerID =' . $_SESSION["id"])->fetch()['segue'];
                if ($queryFollow != 0) {
                    $followAge = $pdo->query('SELECT DISTINCT DATE(followDate) as "followDate" FROM follows WHERE followedID=' . $user["userID"] . ' and followerID =' . $_SESSION["id"])->fetch();
                    echo '<a href="./auth/unfollow.php?id=' . $user['userID'] . '"> <button class="btnEdit">Unfollow</button></a>
                    <p style="margin-top:3pt;"> You follow: <b>' . $user['username'] . '</b> <br/> since <b>' . $followAge["followDate"] . '</b></p>';
                } else echo '<a href="./auth/follow.php?id=' . $user['userID'] . '"><button class="btnEdit">Follow</button></a>';
                ?>
            </div>
        </div>
        <div style="display:flex;height:60vh;margin-bottom:10vh">
            <div class="listasPerfil">
                <h1 style="margin-left:10%"><?= $user["username"]?> likes</h1>

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
                <h1 style="margin-left:10%"><?= $user["username"]?> follows</h1>
                <div class="lista">
                    <?php
                    /*                                                           |               |-> buscar o ID dos que são seguidos; |                             |-> por este utilizador*/
                    $users = $pdo->query('SELECT * FROM user INNER JOIN follows on user.userID=follows.followedID where isAdmin = 0 and followerID=' . $user["userID"])->fetchAll();
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
        <div style="height:auto;width:90%;margin-left:5%;">
            <h1 style="width:inherit;margin-bottom:3vh">Comments</h1>
            <?php
            $comments = $pdo->query("SELECT *  FROM comment where profileID=" . $_SESSION["id"])->fetchall();

            if (count($comments) > 0) {
                foreach ($comments as $comment) {
                    $author = $pdo->query('SELECT * FROM user WHERE userID=' . $comment["authorID"])->fetch();
                    echo '
                    <div class="comment" style="width:100%;height:auto;margin-bottom:3vh;background-color:rgba(0,0,0,0.5); border-radius: 5px;padding:5pt">
                        <div class="commentHead" style="display:flex;justify-content:space-between;margin-bottom:5pt;border-bottom:solid 1pt #1926da;">
                        <a style="text-decoration:none" href="profile.php?id='. $comment["authorID"] .'">
                            <img src="'. $author["image"].'" style="box-sizing: border-box;height:5vh;border-radius: 5px;border:solid 2pt black;border-image-source: linear-gradient(45deg,rgba(180, 0, 255, 1) 0%,rgba(0, 6, 255, 1) 50%,rgba(255, 0, 114, 1) 100%);border-image-slice: 100 0;border-image-slice: 1;">
                            <p style="display:inline">'.$author["username"].'</p>
                        </a>
                        <p style="display:inline">'. substr($comment["shareDate"],0,-3).'</p>
                        </div>
                        <p style="border:solid 2pt #1926da;border-top:transparent;border-radius: 0 5px 0 0;border-right:transparent;white-space: pre;width:100%;box-sizing: border-box;height:auto;display:block">' . wordwrap($comment["commentText"], 115, "\n", true) . '</p>
                    </div>';
                }
            }
            ?>
            <br>
            <form method="post" action="./auth/comment.php">
                <div style="margin-top:5vh;">
                    <div style="height:50px;width:inherit;vertical-align: middle;"><img style="height:44px;border:solid 3pt black;border-image-source: linear-gradient(45deg,rgba(180, 0, 255, 1) 0%,rgba(0, 6, 255, 1) 50%,rgba(255, 0, 114, 1) 100%);border-image-slice: 100 0;border-image-slice: 1;" src="<?= $_SESSION["userAvatar"] ?>"><span style="margin-left:7pt;margin-bottom:7pt;"><?= $_SESSION["username"] ?></span></div><br>
                    <input type="hidden" value="<?= $_SESSION["id"] ?>" name="authorID">
                    <input type="hidden" value="<?= $_SESSION["id"] ?>" name="profileID">

                    <label for="comment" style="width:100%">Comment:</label><br>
                    <textarea name="comment" style="resize: none;width:100%;height:20vh;"></textarea><br>
                    <input style="margin-left:90%;width:10%;" type="submit">
                </div>
            </form>
        </div>
    </div>

    <?php include './components/footer.php'; ?>
</body>

</html>