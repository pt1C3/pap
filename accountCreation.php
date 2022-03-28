<?php 
    session_start();
if(isset($_SESSION["username"])==false || isset($_SESSION["password"])==false) header("location:./register.php")?>
<html>

<head>
    <title>Account Creation - LetsGame</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="register.css">
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
        <h1>Register</h1>
        <form class="register-form" action="./auth/accountRegist.php" method="post" enctype="multipart/form-data">
        <p><?= $username ?></p>
        <p><?= $password ?></p>
            <input type="email" placeholder="Email" name="email" required/><br>
            <input type="text" placeholder="Name" name="name" /><br>
            <input type="date"  name="birthdate" /><br>
            <input type="radio"  name="sex" value="Male" />
            <label for="male">Male</label><br>
            <input type="radio"  name="sex" value="Female" />
            <label for="female">Female</label><br>
            <input type="radio"  name="sex" value="Other" />
            <label for="other">Other</label><br>
            <input type="text" placeholder="Steam Profile Link" name="steam" /><br>
            <input type="text" placeholder="Epic Games ID" name="epic" /><br>
            <input type="text" placeholder="Uplay ID" name="uplay" /><br>
            <input type="text" placeholder="Country" name="country" /><br>

            <input type="file" id="image" name="image"  accept="image/png, image/jpeg"><br>

            <input type="text" name="biography" placeholder="Biography">

            <input type="submit" class="button" value="REGISTER">


        </form>

    </div>
    <!--Register Page-->
</body>

</html>