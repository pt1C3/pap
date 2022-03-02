<?php
    include 'db.php';

    session_start();
    $dado = $pdo->query('SELECT * FROM user WHERE username ="' . $username . '"')->fetch();
    $_SESSION['loggedin'] = true;
    $_SESSION['id'] = $dado['userID'];
    $_SESSION['username'] = $dado['username'];
    $_SESSION['userAvatar'] = $dado['image'];

    $pdo->query('UPDATE user SET lastLogin = current_timestamp() WHERE userID ="' . $_SESSION['id'] . '"');

    if(!is_null($dado['name'])) $_SESSION['name'] = $dado['name'];
    else $_SESSION['name'] = "(*no-name*)";
    

    header("location:./?sessionid=". $_SESSION['id']);
?>