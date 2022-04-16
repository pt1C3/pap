<html>

<head>
    <title>"<?= $_POST['search'] ?>" - LetsGame</title>
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="pesquisa.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    session_start();
    include './components/navbar.php';
    include './auth/db.php';
    $search  = $_POST['search'];
    ?>
    <div class="data">
        <?php echo '<h2 style="margin-top:3%;margin-left:10%;">You searched for: "' . $search . '".</h2>'; ?>
        <div class="lista">
            <?php
            $users = $pdo->query('SELECT * FROM user where isAdmin = 0 and username like "%' . $search . '%"')->fetchAll();
            foreach ($users as $user) {
                echo '<a href="./profile.php?id=' . $user["userID"] . '" class="itemLista">
                            <img src="' . $user['image'] . '" style="height:100px;"/>
                            <p>' . $user['username'] . '</p>
                            </a>';
            }
            ?>
        </div>
    </div>

    <?php include './components/footer.php';     include './scripts/update_user_lastActivity.php'; ?>
</body>