<?php
session_start();
if (isset($_SESSION["username"]) == false || isset($_SESSION["password"]) == false) header("location:./register.php") ?>
<html>

<head>
    <title>Account Creation - LetsGame</title>
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="accountCreation.css">
    <link rel="icon" href="./images/iconfavicon.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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


            <div style="font-size:13pt;width:100%;text-align:center;padding-bottom:5pt;">
            <p>I am:</p>
</div>

            <div class="sex" >
                <span >
                <label for="male">Male</label>
                <input type="radio" name="sex" value="M" required />
                </span>
                <span>
                <label for="female">Female</label>
                <input type="radio" name="sex" value="F" required />
                </span>
                <span>
                <label for="other">Other</label>
                <input type="radio" name="sex" value="O" required />
                </span>
            </div>
            <br>


            <input type="text" placeholder="Steam Profile Link" name="steam" /><br>
            <input type="text" placeholder="Epic Games ID" name="epic" /><br>
            <input type="text" placeholder="Uplay ID" name="uplay" /><br>
            <select name="country">
                <?php include './countries.php';
                foreach ($countries as $country) {
                    echo '<option value="' . $country . '">' . $country . '</option>';
                }
                ?>
            </select><br>
            <select name="language">
                <?php include './languages.php';
                foreach ($languages_list as $language) {
                    echo '<option value="' . $language . '">' . $language . '</option>';
                }
                ?>
            </select><br>
            <span id="preview"></span><br>
            <label class="imgbutton" for="image">Import Profile Image</label><br>
            <input type="file" id="image" name="image" accept="image/png, image/jpeg" required><br>
            <textarea type="text" name="biography" placeholder="Biography" class="biography"></textarea>
            <br>
            <input type="submit" class="button" value="Let's Game">


        </form>

    </div>
    <!--Register Page-->
    <?php include './components/footer.php'; ?>
    <script>
        $("#image").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {

                    $('#preview').html("<img style=\"height:100pt\" src=\"" + e.target.result + "\">");
                }

                reader.readAsDataURL(this.files[0]);
            }
        })
    </script>
</body>

</html>