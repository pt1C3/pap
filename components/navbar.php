<div class="nav-bar-container">
        <a href="homePage.php"><button class="logobtn"></button></a>
        <div class='right'>
            <?php
            include './auth/db.php';
            $numNotf = $pdo->query('SELECT Count(*) as "number" FROM follows WHERE followedID= '. $_SESSION["id"].' and viewed= 0')->fetch(PDO::FETCH_COLUMN);
                            $notifications = $pdo->query('SELECT id,username, DATEDIFF( CURRENT_DATE(),followDate) as "Date" FROM follows INNER JOIN user on user.userID = follows.followerID WHERE followedID= '. $_SESSION["id"].' and viewed= 0')->fetchAll();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<form action="pesquisa.php"  method="post">
                <input name="search" type="text" class="search" placeholder="Search Users..." required />
                <input class="searchBTN" type="image" src="./images/lupa.png"/></form>';

        echo '<div class="dropTudo" style="height:600px;">
                        <button buttonstyle="height:100px">
                            <img src="images/bell.png" style="height:100px">';
                            if($numNotf!= "0")echo'<p>'. $numNotf .' new notifications</p>'; 
                            else echo'<p>No new notifications</p>';
                        echo '</button>
                <div class="dropdown-content">';
                foreach($notifications as $notification)
                {
                    echo '<a href="./auth/notf.php?id='. $notification["id"] .'"><p>'. $notification["username"]. ' started following you. ('. $notification["Date"] .' days ago)</p></a>';
                }
                echo'
                </div>
        </div>
                <a class="nav_User" href="userProfile.php">
                <img class="nav_userAvatar" src="'. $_SESSION['userAvatar']. '"/>
                <p">'. $_SESSION['username']. '</p>
                </a>
                <a href="./auth/logout.php"><button class="logout-button">SIGN OUT</button></a>';
                if (isset($_SESSION['loggedin']) && $_SESSION['adm'] == true) {
                    echo '<a href="./admin/admHome.php"><button class="logout-button">ADM</button></a>';
                }
            } else {
                echo '<a href="register.php"><button class="register-button">REGISTER</button></a>
                <a href="login.php"><button class="login-button">LOGIN</button></a>';
            } ?>
            
        </div>
    </div>
