<html>

<head>
    <title>Home - LetsGame</title>
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="pesquisa.css">
</head>
<body>
    <?php 
    session_set_cookie_params(0);
    session_start();
    include './components/navbar.php';
    include './auth/db.php';
    $search  = $_POST['search'];
    ?>
    <div class="data">
        <?php echo '<h2 style="padding-top:50pt">You searched for: "' . $search . '".</h2>'; ?>
        <div class="lista">
                        <?php
                        $users = $pdo->query('SELECT * FROM user where isAdmin = 0 and username like "%'. $search .'%"')->fetchAll();
                        foreach ($users as $user) {
                            echo '<a href="#" class="itemLista">
                            <img src="' . $user['image'] . '" style="height:100px;"/>
                            <p>' . $user['username'] . '</p>
                            </a>';
                        }
                        ?>
        </div>
    </div>
</body>