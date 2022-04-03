<div class="nav-bar-container">
        <a href="homePage.php"><button class="logobtn"></button></a>
        <div class='right'>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<form action="pesquisa.php"  method="post">
                <input name="search" type="text" class="search" placeholder="Search Users..." required />
                <input class="searchBTN" type="image" src="./images/lupa.png"/></form>
                <a class="nav_User" href="userProfile.php">
                <img class="nav_userAvatar" src="'. $_SESSION['userAvatar']. '"/>
                <p">'. $_SESSION['username']. '</p>
                </a>
                <a href="./auth/logout.php"><button class="logout-button">SIGN OUT</button></a>';
                if (isset($_SESSION['loggedin']) && $_SESSION['adm'] == true) {
                    echo '<a href="./admHome.php"><button class="logout-button">ADM</button></a>';
                }
            } else {
                echo '<a href="register.php"><button class="register-button">REGISTER</button></a>
                <a href="login.php"><button class="login-button">LOGIN</button></a>';
            } ?>
            
        </div>
    </div>
