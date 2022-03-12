<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="profile.css">
    <title><?php echo $_SESSION["username"] ?> - LetsGame</title>
</head>

<body>
    <?php include("./components/navbar.php");
    include("./auth/db.php") ?>
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
                    Sex: <?php echo $_SESSION["sex"] ?>
                </p>
                <p style="margin-top:2%;width:80%;"> <?php echo $_SESSION["description"] ?></p>
            </div>
            <div class="rightItems" style="max-height:80%;text-align:center;margin-right:2%;width:60%">
                <div style="display:flex;justify-content:space-between">
                    <p style="text-align:center; font-size: 15pt;"> Rating:</br>0/10</p>
                    <p style="text-align:center; font-size: 15pt;"> Followers:</br>xxx</p>
                </div>
                <button class="btnEdit" href="?edit">Edit</button>
            </div>
        </div>
        <div id="bottomElements">
            <div style="display:flex;height:100%;">
                <div style="width: 48%;margin: 1%;height:96%;">
                    <h1>Liked Games</h1>

                    <div style="border-radius: 10px;width:80%;height:80%;margin: 2% 10%;overflow-y:scroll;background-color:rgba(0,0,0,0.5);">
                        <?php
                        $games = $pdo->query('SELECT * FROM games ;')->fetchAll();
                        foreach ($games as $game) {
                            echo '<a href="#" style="display:flex;padding:5px 10px;margin: 10px 5px;background-color:#000a92;border-radius: 3px;height:100px;">
                            <img src="' . $game['thumbnail'] . '" style="height:100px;"/>
                            <p style="color:white; margin:auto; text-align:center">' . $game['title'] . '</p>
                            </a>';
                        }
                        foreach ($games as $game) {
                            echo '<a href="#" style="display:flex;padding:5px 10px;margin: 10px 5px;background-color:#000a92;border-radius: 3px;height:100px;">
                            <img src="' . $game['thumbnail'] . '" style="height:100px;"/>
                            <p style="color:white; margin:auto; text-align:center">' . $game['title'] . '</p>
                            </a>';
                        }
                        ?>
                    </div>
                </div>
                <div class='border'></div>
                <div style="width: 48%;margin: 1%;height:96%;">
                    <h1 style="padding-left:2%">Follows</h1>
                </div>
            </div>
        </div>
    </div>
    <script>
        var lastScrollTop = 0;
        window.onscroll = function() {
            var st = window.pageYOffset || document.documentElement.scrollTop;
            if (st > lastScrollTop) {
                document.getElementById('bottomElements').scrollIntoView({
                    behavior: "smooth",
                    block: "end",
                    inline: "nearest"
                });
            } else {
                document.getElementById('userInfo').scrollIntoView({
                    behavior: "smooth",
                    block: "end",
                    inline: "nearest"
                });
            }
            lastScrollTop = st <= 0 ? 0 : st;
        };
    </script>

    }
</body>

</html>