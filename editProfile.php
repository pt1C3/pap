<?php
session_start();
?>
<html>

<head>
    <title>Edit Profile - LetsGame</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="accountCreation.css">
    <link rel="icon" href="./images/iconfavicon.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body >
    <!--Navbar-->
    <?php
    include './components/navbar.php';

    ?>
    <!--Navbar-->

    <!--Login Page-->



    <div class="dataRegister" style="height:auto;">
        <h1>Account Details</h1>
        <form class="register-form" action="./auth/accountEdit.php" method="post" enctype="multipart/form-data">
            <input type="email" placeholder="Email" name="email" required value="<?= $_SESSION["email"] ?>"><br>
            <input type="text" placeholder="Name" name="name" required value="<?= $_SESSION["name"] ?>"><br>
            <input type="date" name="birthdate" required value="<?= $_SESSION["birthDate"] ?>"/>

            <div class="sex">
                <p style="padding-right:36%;font-size:13pt;padding-bottom:20px;">I am:</p>
                <?php if($_SESSION["sex"]=="Male") {
                    echo'
                    <label for="male">Male</label>
                    <input type="radio" name="sex" value="M" required checked/>
                    <label for="female">Female</label>
                    <input type="radio" name="sex" value="F" required />
                    <label for="other">Other</label>
                    <input type="radio" name="sex" value="O" required />
                    ';
                }
                if($_SESSION["sex"]=="Female"){
                    echo'
                    <label for="male">Male</label>
                    <input type="radio" name="sex" value="M" required />
                    <label for="female">Female</label>
                    <input type="radio" name="sex" value="F" required checked/>
                    <label for="other">Other</label>
                    <input type="radio" name="sex" value="O" required />
                    ';
                }
                if($_SESSION["sex"]=="Other"){
                    echo'
                    <label for="male">Male</label>
                    <input type="radio" name="sex" value="M" required />
                    <label for="female">Female</label>
                    <input type="radio" name="sex" value="F" required />
                    <label for="other">Other</label>
                    <input type="radio" name="sex" value="O" required checked/>
                    ';
                };
                ?>            
                <br>
            </div>
            <br>


            <input type="text" placeholder="Steam Profile Link" name="steam" value="<?= $_SESSION["steamProfile"] ?>"/><br>
            <input type="text" placeholder="Epic Games ID" name="epic" value="<?= $_SESSION["epicProfile"] ?>"/><br>
            <input type="text" placeholder="Uplay ID" name="uplay" value="<?= $_SESSION["uplayProfile"] ?>"/><br>
            <select name="country">
            <?php include './countries.php';
                foreach($countries as $country){
                    if($country != $_SESSION["country"])echo'<option value="'. $country .'">'. $country .'</option>';
                    else if($country == $_SESSION["country"])echo'<option value="'. $country .'" selected>'. $country .'</option>';
                    
                }
                ?>
            </select><br>
            <span id="preview"></span><br>
            <label class="imgbutton" for="avatar" >Import Profile Image</label><br>
            <input type="file" id="image" name="image" accept="image/png, image/jpeg"><br>
            <textarea type="text" name="biography" placeholder="Biography" class="biography"><?= $_SESSION["description"]?>
            </textarea>
            <br>
            <input type="submit" class="button" value="Update" >


        </form>

    </div>
    <!--Register Page-->
    <?php include './components/footer.php';     include './scripts/update_user_lastActivity.php'; ?>
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