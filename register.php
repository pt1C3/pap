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

    if ($usernameerror == "" && $passworderror == "") {
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
            <?= '<a href="login.php"><button class="login-button">LOGIN</button></a>'; ?>
        </div>
    </div>
    <!--Navbar-->

    <!--Login Page-->



    <div class="dataRegister">
        <h1>Register</h1>
        <form id="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p id="usernameError" style="color: red"><?php echo $usernameerror ?></p>
            <input id="username" type="text" placeholder="Username" name="username" value="<?php echo $username ?>" />
            <p id="passwordError" style="color: red"><?php echo $passworderror ?></p>
            <input id="password" type="password" placeholder="Password" name="password" value="<?php echo $password ?>" />
            <input id="confirm" type="password" placeholder="Confirm Password" name="confirmpassword" value="<?php echo $confirmpassword ?>" />

            <input type="submit" class="button" value="REGISTER">


        </form>

    </div>
    <p id="Invisivel">Registo bem feito fase 2 aparece div com o resto</p>
    <!--Register Page-->

    <?php include './components/footer.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    const initialForm = document.querySelector("#register-form");


    // Manda guardar um registo na tabela
    function insertDataTable(e) {
        // prevent form loading
        e.preventDefault();

        const inputUsername = document.querySelector("#username");
        const inputPassword = document.querySelector("#password");
        const inputConfirm = document.querySelector("#confirm");
        const errorUsername = document.querySelector("#usernameError");
        const errorPassword = document.querySelector("#passwordError");

        const final = document.querySelector("#Invisivel");

        var formData = new FormData(initialForm);

        // verifica se os campos não foram preenchidos
        if (inputPassword.value == "" && inputUsername.value == "" && inputConfirm.value == "") {
            errorPassword.style.visibility = "visible";
            errorPassword.innerHTML = "Write something...";
        } else {
            $.ajax({
                url: "./auth/registValidation.php",
                type: "post",
                data: formData,
                success: function(data) {
                    // data guarda o valor 1 ou 0
                    final.style.visibility = "visible";
                    initialForm.style.visibility = "hidden";
                }
            });
        }
    }

    // Ao carregar a página espera pelo eventos
    document.addEventListener("DOMContentLoaded", function(event) {


        initialForm.addEventListener("submit", function(event) {
            insertDataTable(event);
        });
    });
</script>

</html>