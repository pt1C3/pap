<?php
    include 'db.php';

    session_start();
    $dado = $pdo->query('SELECT * FROM user WHERE username ="' . $username . '"')->fetch();
    $_SESSION['loggedin'] = true;
    $_SESSION['id'] = $dado['userID'];
    $_SESSION['username'] = $dado['username'];
    $_SESSION['userAvatar'] = $dado['image'];
    $_SESSION['rating'] = round($dado['rating'],1);
    $_SESSION['followers'] = ($pdo->query('SELECT TRUNCATE(Count(*),0) as "followers" FROM follows WHERE followedID ="' . $username . '"')->fetch())["followers"];

    switch ($dado['sex']) {
        case 'M':
            $_SESSION['sex'] = "Male";
            break;
        case 'F':
            $_SESSION['sex'] = "Female";
            break;
        case 'O':
            $_SESSION['sex'] = "Other";
            break;
        
        default:$_SESSION['sex']="Not Given";
        break;
    }
    $_SESSION['description'] = $dado['biography'];

    $dadoLinguas = $pdo->query( 'SELECT userLanguage FROM languages WHERE userID = ' . $_SESSION['id'] )->fetchAll();
    $_SESSION['languages'] = $dadoLinguas;

    $pdo->query('UPDATE user SET lastLogin = current_timestamp() WHERE userID ="' . $_SESSION['id'] . '"');

    if(!is_null($dado['name'])) $_SESSION['name'] = $dado['name'];
    else $_SESSION['name'] = "Gamer without name";
    

    header("location:./?sessionid=". $_SESSION['id']);
?>