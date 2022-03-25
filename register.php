<?php
include './auth/db.php';
$username = $password  = $confirmpassword  = "";
$usernameerror = $passworderror = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password  = $_POST["password"];
    $confirmpassword  = $_POST["confirmpassword"];

    $Existusername = $pdo->query('SELECT * FROM user WHERE username ="' . $username . '"')->fetch();

    if (!($confirmpassword == $password)) $passworderror .= "Passwords do not match...";
    if (is_null($Existusername['username']) == false) $usernameerror .= "Username Already Exists...";

    if($usernameerror=="" && $passworderror=="")
    { 
        header("./accountCreation.php");
        include './auth/registerValues.php';
        
        
    }

}

?>
<html>

<head>
    <title>Register - LetsGame</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="register.css">
    <link rel="icon" href="./images/iconfavicon.ico">
</head>

<body>
    <!--Navbar-->
    <div class="nav-bar-container">
        <a href="index.php"><button class="logobtn"></button></a>
        <div class='right'>

            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<form action="faq.php"  method="post">
    <input name="search" type="text" class="search" placeholder="Search Users..."/>
    <input class="searchBTN" type="image" src="./images/lupa.png"/></form>
    <a href="?faq" class="FAQ">F.A.Q.</a>
    <a href="./auth/logout.php"><button class="logout-button">LOGOUT</button></a>';
            } else {;
                echo '<a href="login.php"><button class="login-button">LOGIN</button></a>';
            } ?>
        </div>
    </div>
    <!--Navbar-->

    <!--Login Page-->



        <div class="dataRegister">
            <h1>Register</h1>
            <form class="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <p id="usernameError" style="color: red"><?php echo $usernameerror ?></p>
                <input type="text" placeholder="Username" name="username" value="<?php echo $username ?>" />
                <p id="passwordError" style="color: red"><?php echo $passworderror?></p>
                <input type="password" placeholder="Password" name="password" value="<?php echo $password ?>" />
                <input type="password" placeholder="Confirm Password" name="confirmpassword" value="<?php echo $confirmpassword ?>" />

                <input type="submit" class="button" value="REGISTER">


            </form>
            
        </div>
    <!--Register Page-->

    <?php include './components/footer.php'; ?>
</body>
<script>
  window.onload = function() {
    
    var passwordError = document.getElementById('usernameError');
    var usernameError = document.getElementById('passwordError');
    if(passwordError == null || passwordError!= "") passwordError.style.visibility = "visible"; passwordError.style.pointerEvents = "all";
    if(usernameError == null ||usernameError!= "") usernameError.style.visibility = "visible"; usernameError.style.pointerEvents = "all";
  }
</script>
</html>