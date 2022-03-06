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
    <?php include("./components/navbar.php") ?>
    <div class='data'>
        <div class="userInfo">
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
                <button class="btnEdit" href="?gay">Edit</button>
            </div>
        </div>
    </div>
</body>

</html>