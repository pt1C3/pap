<?php
include './auth/db.php';
session_start();
session_destroy();
session_start();
if (isset($_SESSION["id"]) == true) header("location: ./erronasessao");
$email = "";
$emailerror = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];

    $Existuser = $pdo->query('SELECT * FROM user WHERE email ="' . $email . '"')->fetch();


    if (isset($Existuser['username']) == false) $emailerror .= "Email does not exist, regist";
    if ($emailerror == "") {
        $_SESSION["email"] = $email;
        header("location: ./auth/emailPasswordReset.php") ;
    }
}
?>
<html>

<head>
    <title>Password Reset - LetsGame</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="./images/iconfavicon.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <?php include './components/navbar.php' ?>
    <div class="dataLogin">
        <h1>Password Reset</h1>
        <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p style="color:red"><?php echo $emailerror ?></p>
            <input type="email" placeholder="Email" name="email" required />
            <br></br>
            <input type="submit" class="button" value="Submit">

        </form>
    </div>
    <?php include './components/footer.php' ?>
</body>
</html>