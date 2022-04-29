<div class="nav-bar-container">
        <a class="logoAdm" href="admHome.php"><button class="logobtn"></button><span style="margin-left:10pt;margin-bottom:5pt;">ADMIN</span></a>
        <style>
        .logoAdm{
            color:white; text-decoration:none;font-family:Aldo;font-size:20pt;
            transition: 0.2s;
            transform: translateZ(0);
        }
        .logoAdm:hover .logobtn{
            background-image: url("../images/logo hover.png");
            filter: brightness(110%) saturate(100%);
        }
        .logoAdm:hover{
            color:red;
            transform: scale(1.1);
        }
        </style>
        <div class='right' style="display: flex;width:150px">
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '

                <a href="../auth/logout.php" ><button class="logout-button" style="width:100px;height:45px;">SIGN OUT</button></a>';
            } else {
                echo '<a href="./register.php"><button class="register-button">REGISTER</button></a>
                <a href="./login.php"><button class="login-button">LOGIN</button></a>';
            } ?>
            
        </div>
    </div>
