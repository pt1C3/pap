<?php
session_start();
if (isset($_SESSION["username"]) == false || isset($_SESSION["password"]) == false) header("location:./register.php") ?>
<html>

<head>
    <title>Account Creation - LetsGame</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="accountCreation.css">
    <link rel="icon" href="./images/iconfavicon.ico">
</head>

<body>
    <!--Navbar-->
    <?php
    include './components/navbar.php';

    $username = $_SESSION["username"];
    $password = $_SESSION["password"];

    ?>
    <!--Navbar-->

    <!--Login Page-->



    <div class="dataRegister">
        <h1>Account Details</h1>
        <form class="register-form" action="./auth/accountRegist.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?= $username ?>">
            <input type="hidden" name="password" value="<?= $password ?>">
            <input type="email" placeholder="Email" name="email" required /><br>
            <input type="text" placeholder="Name" name="name" required /><br>
            <input type="date" name="birthdate" required />

            <div class="sex">
                <p style="padding-right:36%;font-size:13pt;padding-bottom:20px;">I am:</p>
                <label for="male">Male</label>
                <input type="radio" name="sex" value="M" required />
                <label for="female">Female</label>
                <input type="radio" name="sex" value="F" required />
                <label for="other">Other</label>
                <input type="radio" name="sex" value="O" required />
                <br>
            </div>
            <br>


            <input type="text" placeholder="Steam Profile Link" name="steam" /><br>
            <input type="text" placeholder="Epic Games ID" name="epic" /><br>
            <input type="text" placeholder="Uplay ID" name="uplay" /><br>
            <select name="country">
                <?php include './countries.php';
                foreach($countries as $country){
                    echo'<option value="'. $country .'">'. $country .'</option>';
                }
                ?>
            </select><br>
            <label class="imgbutton" for="image" >Import Profile Image</label>    
            <input  type="file" id="image" name="image" accept="image/png, image/jpeg" required><br>
            <textarea type="text" name="biography" placeholder="Biography" class="biography"></textarea>
            <br>
            <input type="submit" class="button" value="Let's Gam" >


        </form>

    </div>
    <!--Register Page-->
    <?php include './components/footer.php'; ?>
</body>

</html>