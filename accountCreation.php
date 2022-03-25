<html>

<head>
    <title>Account Creation - LetsGame</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="register.css">
    <link rel="icon" href="./images/iconfavicon.ico">
</head>

<body>
    <!--Navbar-->
    <?php include '.components/navbar.php'; ?>
    <!--Navbar-->

    <!--Login Page-->



    <div class="dataRegister">
        <h1>Register</h1>
        <form class="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p id="usernameError" style="color: red"><?php echo $usernameerror ?></p>
            <input type="text" placeholder="Username" name="username" value="<?php echo $username ?>" />
            <p id="passwordError" style="color: red"><?php echo $passworderror ?></p>
            <input type="password" placeholder="Password" name="password" value="<?php echo $password ?>" />
            <input type="password" placeholder="Confirm Password" name="confirmpassword" value="<?php echo $confirmpassword ?>" />

            <input type="submit" class="button" value="REGISTER">


        </form>

    </div>
    <!--Register Page-->
</body>

</html>