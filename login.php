<?php
include './auth/db.php';
$username = $password  = "";
$usernameerror = $passworderror = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password  = $_POST["password"];

    $Existuser = $pdo->query('SELECT * FROM user WHERE username ="' . $username . '"')->fetch();

    
    if (is_null($Existuser['username']) == true) $usernameerror .= "Username does not exist, regist";
    elseif ($Existuser['password'] != $password) $passworderror .= "Wrong password";
    if($usernameerror=="" && $passworderror=="")
    {

        include './auth/loginValidation.php';
    }
}
    ?>
<html>
<head>
    <title>Login - LetsGame</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="./images/iconfavicon.ico">
</head>

<body>
    <!--Navbar-->
    <div class="nav-bar-container">
        <a href="index.php"><button class="logobtn"></button></a>
        <div class='right'>
            <a href="/faq" class="FAQ">F.A.Q.</a>
            <a href="register.php"><button class="register-button">REGISTER</button></a>
        </div>
    </div>
    <!--Navbar-->
    <!--Login Page-->

        <div class="dataLogin">
            <h1>Login</h1>
            <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <p style="color:red"><?php echo $usernameerror ?></p>
                <input type="text" placeholder="Username" name="username" required/>
                <p style="color:red"><?php echo $passworderror ?></p>
                <input type="password" placeholder="Password" name="password" required/><br></br>
                <a href="#">Forgor the password 💀</a><br></br>
                <input type="submit" class="button" value="Login">

            </form>
        </div>
    <!--Login Page-->
</body>

</html>