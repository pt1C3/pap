<div class="nav-bar-container">
        <a href="homePage.php"><button class="logobtn"></button></a>
        <div class='right'>
            <?php
            include './auth/db.php';


        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        $numNotf = $pdo->query('SELECT Count(*) as "number" FROM follows WHERE followedID= '. $_SESSION["id"].' and viewed= 0')->fetch(PDO::FETCH_COLUMN);
            $notifications0 = $pdo->query('SELECT id,username,followerID, DATEDIFF( CURRENT_DATE(),followDate) as "Date" FROM follows INNER JOIN user on user.userID = follows.followerID WHERE followedID= '. $_SESSION["id"].' and viewed= 0')->fetchAll();
            $notifications1 = $pdo->query('SELECT id,username,followerID, DATEDIFF( CURRENT_DATE(),followDate) as "Date" FROM follows INNER JOIN user on user.userID = follows.followerID WHERE followedID= '. $_SESSION["id"].' and viewed= 1')->fetchAll();

                echo '<form action="pesquisa.php"  method="post">
                <input name="search" type="text" class="search" placeholder="Search Users..." required />
                <input class="searchBTN" type="image" src="./images/lupa.png"/></form>
                <div class="dropTudo">
                        <button>
                            <img src="images/bell.png">';
                            if($numNotf!= "0")echo'<p>'. $numNotf .' new notifications</p>'; 
                            else echo'<p>No new notifications</p>';
                        echo '<img src="./images/arrow.png" style="height:4pt;display:inline;padding:5pt;margin-top:5pt;margin-left:5pt;">
                        </button>
                <div class="dropdown-content">';
                foreach($notifications0 as $notification)//notificações novas
                {
                    echo '<a href="./auth/notf.php?notfID='.$notification["id"] . '&profileID='.$notification["followerID"].'"><p>'. $notification["username"]. ' started following you. ('. $notification["Date"] .' days ago)</p></a>';
                }
                foreach($notifications1 as $notification)//notificações já vistas
                {
                    echo '<a class="notfViewed"  href="profile.php?id='. $notification["followerID"] .'"><p>'. $notification["username"]. ' started following you. ('. $notification["Date"] .' days ago)</p></a>';
                }
                echo'</div></div>
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
