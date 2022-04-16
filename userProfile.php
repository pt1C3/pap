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
    <title><?= $_SESSION["username"]?> - LetsGame</title>
                <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <?php include("./components/navbar.php"); ?>
    <div class='data'>
        <div id="userInfo">
            <img id="avatar" src="<?php echo $_SESSION["userAvatar"] ?>">
            <div class="userText">
                <p id="userName"><?php echo $_SESSION["username"] ?></p>
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
                <a href="./editProfile.php"><button class="btnEdit">Edit</button></a>
            </div>
        </div>
        <div style="display:flex;height:60vh;margin-bottom:10vh">
            <div class="listasPerfil">
                <h1>You like</h1>

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
                <h1 style="padding-left:2%">You follow</h1>
                <div class="lista">
                    <?php
                    /*                                                           |               |-> buscar o ID dos que são seguidos; |                             |-> por este utilizador*/
                    $users = $pdo->query('SELECT * FROM user INNER JOIN follows on user.userID=follows.followedID where isAdmin = 0 and followerID=' . $_SESSION["id"])->fetchAll();

                    foreach ($users as $user) {
                        $followAge = $pdo->query('SELECT DISTINCT DATE(followDate) as "followDate" FROM follows WHERE followedID=' . $user["userID"] . ' and followerID =' . $_SESSION["id"])->fetch();
                        echo '<a href="profile.php?id=' . $user['userID'] . '" class="itemLista">
                            <img src="' . $user['image'] . '" style="height:100px;"/>
                            <p>' . $user['username'] . ' - since ' . $followAge["followDate"] . '</p>
                            </a>';
                    }

                    ?>
                </div>
            </div>
            <!-- Comments -->
        </div>
           <?php
           include './components/comments.php';
           include './components/formComment.php';
           ?>
        </div>
    </div>


    <?php include './components/footer.php'; 
        include './scripts/update_user_lastActivity.php'; ?>
</body>

</html>