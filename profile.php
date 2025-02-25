<?php session_start();
include("./auth/db.php");
include 'auth/verificarLogin.php';
if ($_GET["id"] != $_SESSION["id"]) {
    if (isset($_GET["id"]) == true) {
        $user = $pdo->query('SELECT * FROM user WHERE userID=' . $_GET["id"])->fetch();
        $dadosLanguages = $pdo->query("SELECT userLanguage FROM languages where userID=" . $_GET["id"])->fetchall();
        $languages = array_column($dadosLanguages, 0);
        $followers = $pdo->query("SELECT Count(*) as 'number' FROM follows where followedID=" . $user["userID"])->fetch();
        $comments = $pdo->query("SELECT *  FROM comment where profileID=" . $_GET["id"])->fetchall();
        $age  = date_diff(date_create($user["birthdate"]), date_create('now'))->y;
        $queryFollow = $pdo->query('SELECT Count(*) as "segue" FROM follows WHERE followedID=' . $user["userID"] . ' and followerID =' . $_SESSION["id"])->fetch()['segue'];
        switch ($user['sex']) {
            case 'M':
                $sex = "Male";
                break;
            case 'F':
                $sex = "Female";
                break;
            case 'O':
                $sex = "Other";
                break;

            default:
                $sex = "Not Given";
                break;
        }
        $contagem = $pdo->query("SELECT COUNT(*) FROM played WHERE (user1 = " . $_SESSION["id"] . " OR user2 = " . $_SESSION["id"] . ") AND (user1 = " . $_GET["id"] . " OR user2 = " . $_GET["id"] . ")")->fetch(PDO::FETCH_COLUMN);
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
   
        <div style="display:none;position:fixed;height:40vh;width:50vw;left:25vw;top:30vh;background:#1D2157;z-index:1000;" id="modal">
        <button class="sair" onclick="sai()" style="position:absolute;top:20px;right:20px;font-size:20pt;background:none;color:white;border:none;"><b>X</b></button>
   
        <h1>Rate <?= $user["username"] ?><h1>
        <form style="width:30%;height:20%;margin-left:35%;margin-top:7%;align-items:center;">
            <input id="rateNumber" type="number" max="10" min="0" required style="font-size:30pt;font-family:ReadexPro;width:100%;display:inline;margin-bottom:5%">
            <button id="rateSubmit" style="font-size:30pt;font-family:ReadexPro;width:100%;display:inline;">Rate</button>
        </form>
        </div>
        <div id="opacity" >

            <?php include("./components/navbar.php"); ?>

            <div id='data'>

            <div id="userInfo">
                <span>
                    <img id="avatar" src="<?= $user["image"] ?>">
                    <div class="menu">
                        <button class="menuBtn"> <img src="./images/three dots.svg" class="pontos"></a></button>
                        <div class="menuContent">
                            <a href="#">Report</a>
                            <a href="#" id="rate">Rate</a>
                            <a id="moreinfo">More info</a>
                        </div>
                    </div>
                </span>

                <div class="userText">
                    <p id="userName" name="<?= $user["userID"] ?>"><?= $user["username"] ?>
                    <p><?= $user["name"] ?> - <?= $user["country"] ?></p>
                    <span id="status" style="font-size:13pt;"></span>
                    <p><?= $age ?> years old.</p>

                    </p>
                    <p style="margin-top:2%;width:100%;"> <?= $user["biography"] ?></p>
                </div>
                <div class="rightItems" style="max-height:80%;text-align:center;margin-right:2%;width:40%;">
                    <div style="display:flex;justify-content:space-between;">
                        <p style="text-align:center; font-size: 15pt;"> Rating:</br><?= round($user["rating"], 1) ?></p>
                        <p style="text-align:center; font-size: 15pt;"> Followers:</br><?= $followers["number"] ?></p>
                    </div>
                    <div class="follow" style="width:100%;">
                        <?php
                        if ($queryFollow != 0) {
                            $followAge = $pdo->query('SELECT DISTINCT DATE(followDate) as "followDate" FROM follows WHERE followedID=' . $user["userID"] . ' and followerID =' . $_SESSION["id"])->fetch();
                            echo '<a href="./auth/unfollow.php?id=' . $user['userID'] . '"> <button class="btnEdit">Unfollow</button></a>
                    <a href="./chat.php?id=' . $_GET["id"] . '"> <button class="btnEdit">Message</button></a>  ';
                        } else echo '<a href="./auth/follow.php?id=' . $user['userID'] . '"><button class="btnEdit">Follow</button></a>';
                        ?>
                    </div>
                </div>

            </div>
            <div id="userMoreInfo" style="width:80%;height:15vh;display:none;background:#2d34a1;margin-left:10%">
                <div style="width:50%;height:100%;">
                    <span style="display:flex;flex-direction: column;justify-content: space-between;top:50%;">
                        <p> Languages:
                            <?php
                            $numItems = count($languages);
                            $i = 0;
                            foreach ($languages as $language) {
                                if (++$i === $numItems) echo $language;
                                else echo $language . ', ';
                            } ?>
                        </p><br>
                        <p>
                            Sex: <?= $sex ?>
                        </p>
                    </span>
                </div>
                <div style="width:50%;height:100%;position: relative;">
                    <button id="moreinfoClose" style="position:absolute;top:0px;left:95%;width:5%;background:transparent;border-style:none;color:white;border:white solid 2pt;border-radius:10%;">X</button>
                    <p>Games Played: <b>0</b></p><br>
                    <p>Last Activity: <b><?= $user["lastActivity"] ?></b></p><br>
                    <?php if ($queryFollow != 0) : ?>
                        <p>You follow: <b><?= $user['username'] ?></b> since <b><?= $followAge["followDate"] ?>.</b></p>
                    <?php endif; ?>
                </div>
            </div>
            <div style="display:flex;height:60vh;margin-bottom:10vh;margin-top: 10vh">
                <div class="listasPerfil">
                    <h1 style="margin-left:10%"><?= $user["username"] ?> likes</h1>

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
                    <h1 style="margin-left:10%"><?= $user["username"] ?> follows</h1>
                    <div class="lista">
                        <?php
                        /*                                                           |               |-> buscar o ID dos que são seguidos; |                             |-> por este utilizador*/
                        $users = $pdo->query('SELECT * FROM user INNER JOIN follows on user.userID=follows.followedID where isAdmin = 0 and followerID=' . $user["userID"])->fetchAll();
                        foreach ($users as $user2) {
                            echo '<a href="profile.php?id=' . $user2['userID'] . '" class="itemLista">
                            <img src="' . $user2['image'] . '" style="height:100px;"/>
                            <p>' . $user2['username'] . '</p>
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
    <?php include './components/footer.php';    ?>

    <script>
        function entra() {
            var entrar2 = document.getElementById('modal');
            entrar2.style.display = 'block';
            entrar2.style.pointerEvents = 'all'
        }

        function sai() {
            var sair2 = document.getElementById('modal');
            sair2.style.display = 'none';
            sair2.style.pointerEvents = 'none';

        }

        $(document).ready(function() {
            to_user_id = $('#userName').attr('name');
            setInterval(function() {
                $.ajax({ //Atualizar a ultima atividade
                    url: "./auth/update_user_lastActivity.php",
                    success: function() {}
                });
                $.ajax({ //Verifica e escreve se o user ta online ou offline
                    url: "./auth/fetch_userStatus.php",
                    method: "POST",
                    data: {
                        userID: to_user_id
                    },
                    success: function(data) {
                        $('#status').html(data);
                    }
                });
            }, 5000);
            $.ajax({ //Verifica e escreve se o user ta online ou offline
                url: "./auth/fetch_userStatus.php",
                method: "POST",
                data: {
                    userID: to_user_id
                },
                success: function(data) {
                    $('#status').html(data);
                }
            });
        });
        $(document).on('click', '#moreinfo', function() {
            $("#userMoreInfo").css("display", "flex")
        });
        $(document).on('click', '#moreinfoClose', function() {
            $("#userMoreInfo").css("display", "none")
        });
        $(document).on('click', '#rate', function() {
            <?php
            if ($contagem == "0") echo 'alert("You need to play with ' . $user["username"] . ' before rating")';
            elseif ($contagem != "-1") {
                echo 'entra();';
            }
            ?>
        });
        $(document).on("click", "#rateSubmit", function(e){
            e.preventDefault();
            var rating = $("#rateNumber").val();
            if(rating>10 || rating < 0) alert("Rating is 0/10");
            else {
                $.ajax({
                    url:"./auth/rate.php",
                    method:"POST",
                    data: {
                        rating: rating,
                        userID: <?= $_GET["id"]?>
                    },
                    success: function(data){
                        alert("You rated <?= $user["username"]?> with "+rating);
                        location.reload();
                        
                    }
                });
            };
        });
    </script>
</body>

</html>