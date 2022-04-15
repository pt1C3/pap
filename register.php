<?php
include './auth/db.php';
session_start(); 
session_destroy(); //se ja tiver sessao iniciada ou registo inacabado reseta a sessao
session_start();
$username = $password  = $confirmpassword  = "";
$usernameerror = $passworderror = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password  = $_POST["password"];
    $confirmpassword  = $_POST["confirmpassword"];

    $Existusername = $pdo->query('SELECT * FROM user WHERE username ="' . $username . '"')->fetch();

    if (!($confirmpassword == $password)) $passworderror .= "Passwords do not match...";
    if (is_null($Existusername['username']) == false) $usernameerror .= "Username Already Exists...";

    if ($usernameerror=="" && $passworderror=="") {
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("location:./accountCreation.php");
    }
}

?>
<html>

<head>
    <title>Register - LetsGame</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="register.css">
    <link rel="icon" href="./images/iconfavicon.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <!--Navbar-->
    <div class="nav-bar-container">
        <a href="index.php"><button class="logobtn"></button></a>
        <div class='right'>
            <?= '<a href="login.php"><button class="login-button">LOGIN</button></a>'; ?>
        </div>
    </div>

    <div class="dataRegister">
        <h1>Register</h1>
        <form id="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p id="usernameError" style="color: red"><?php echo $usernameerror ?></p>
            <input id="username" type="text" placeholder="Username" name="username" value="<?php echo $username ?>" />
            <p id="passwordError" style="color: red"><?php echo $passworderror ?></p>
            <input id="password" type="password" placeholder="Password" name="password" value="<?php echo $password ?>" />
            <input id="confirm" type="password" placeholder="Confirm Password" name="confirmpassword" value="<?php echo $confirmpassword ?>" />

            <input type="submit" class="button" value="Submit">


        </form>

    </div>

    <!--Register Page-->

    <?php include './components/footer.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    window.onload = function() {

            var passwordError = document.getElementById('usernameError');
            var usernameError = document.getElementById('passwordError');
            if (passwordError == null || passwordError != "") passwordError.style.visibility = "visible";
            passwordError.style.pointerEvents = "all";
            if (usernameError == null || usernameError != "") usernameError.style.visibility = "visible";
            usernameError.style.pointerEvents = "all";
    }
</script>
</html>