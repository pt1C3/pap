<?php
        include './db.php';
        session_start();

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            $numNotf = $pdo->query("SELECT COUNT(*) FROM notifications WHERE viewed = 0 AND userID = " . $_SESSION["id"])->fetch(PDO::FETCH_COLUMN);
            $notification = $pdo->query('SELECT *, DATEDIFF( CURRENT_DATE(),time) as "Date" FROM notifications WHERE userID=' . $_SESSION["id"] . ' AND DATEDIFF( CURRENT_DATE(),time) <= 7 ORDER BY time desc, viewed ASC')->fetchall();
            echo '<form action="pesquisa.php"  method="post">
                <input name="search" type="text" class="search" placeholder="Search Users..." required />
                <input class="searchBTN" type="image" src="./images/lupa.png"/></form>
                <div class="dropTudo">
                        <button>
                            <img src="images/bell.png">';
            if ($numNotf != "0") echo '<p>' . $numNotf . ' new notifications</p>';
            else echo '<p>No new notifications</p>';
            echo '<img src="./images/arrow.png" class="arrow" >
                        </button>
                <div class="dropdown-content">';
            foreach ($notification as $row) {
                $user = $pdo->query('SELECT * FROM user WHERE userID = ' . $row["otherUserID"])->fetch();
                switch ($row["type"]) {
                    case "chat":
                        if ($row["viewed"] == false) echo '<a href="./auth/notf.php?notfID=' . $row["id"] . '&profileID=' . $row["otherUserID"] . '"><p>' . $user["username"] . ' sent you a message. (' . $row["Date"] . ' days ago)</p></a>';
                        break;
                    case "follow":
                        if ($row["viewed"] == false) echo '<a href="./auth/notf.php?notfID=' . $row["id"] . '&profileID=' . $row["otherUserID"] . '"><p>' . $user["username"] . ' started following you. (' . $row["Date"] . ' days ago)</p></a>';
                        if ($row["viewed"] == true) echo '<a class="notfViewed"  href="profile.php?id=' . $row["otherUserID"] . '"><p>' . $user["username"] . ' started following you. (' . $row["Date"] . ' days ago)</p></a>';
                        break;
                }
            }




            echo '</div></div>
                <a class="nav_User" href="userProfile.php">
                <img class="nav_userAvatar" src="' . $_SESSION['userAvatar'] . '"/>
                <p">' . $_SESSION['username'] . '</p>
                </a>
                <a href="./auth/logout.php"><button class="logout-button">SIGN OUT</button></a>';
            if (isset($_SESSION['loggedin']) && $_SESSION['adm'] == true) {
                echo '<a href="./admin/admHome.php"><button class="logout-button">ADM</button></a>';
            }
        } else {
            echo '<a href="register.php"><button class="register-button">REGISTER</button></a>
                <a href="login.php"><button class="login-button">LOGIN</button></a>';
        } ?>