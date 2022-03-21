<div class="nav-bar-container">
        <a href="index.php"><button class="logobtn"></button></a>
        <div class='right'>
            <a href="?faq" class="FAQ">F.A.Q.</a>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<form action="pesquisa.php"  method="post">
                <input name="search" type="text" class="search" placeholder="Search Users..." required />
                <input class="searchBTN" type="image" src="./images/lupa.png"/></form>
                <a class="nav_User" href="profile.php">
                <img class="nav_userAvatar" src="'. $_SESSION['userAvatar']. '"/>
                <p style="margin-right:5pt;">'. $_SESSION['username']. '</p>
                </a>
                <a href="./auth/logout.php"><button class="logout-button">SIGN OUT</button></a>';
            } else {
                echo '<a href="register.php"><button class="register-button">REGISTER</button></a>';
                echo '<a href="login.php"><button class="login-button">LOGIN</button></a>';
            } ?>
        </div>
    </div>
