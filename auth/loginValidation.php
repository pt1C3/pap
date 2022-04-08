<?php
    include 'db.php';

    session_start();
    $dado = $pdo->query('SELECT *, ROUND(rating,1) as "rating" FROM user WHERE username ="' . $username . '"')->fetch();
    $_SESSION['adm'] = $dado['isAdmin'];
    $_SESSION['loggedin'] = true;
    $_SESSION['id'] = $dado['userID'];
    $_SESSION['username'] = $dado['username'];
    $_SESSION['userAvatar'] = $dado['image'];
    $_SESSION['rating'] = round($dado['rating'],1);
    $followers = $pdo->query("SELECT Count(*) as 'number' FROM follows where followedID=" . $dado['userID'])->fetch();
    $_SESSION['followers'] =$followers["number"];
//rafita gamer
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
    $dadoLikes = $pdo->query( 'SELECT gameID FROM likedgames WHERE userID = ' . $_SESSION['id'] )->fetchAll(PDO::FETCH_COLUMN);
    $_SESSION['likes'] = $dadoLikes;

    $pdo->query('UPDATE user SET lastLogin = current_timestamp() WHERE userID ="' . $_SESSION['id'] . '"');

    if(!is_null($dado['name'])) $_SESSION['name'] = $dado['name'];
    else $_SESSION['name'] = "Gamer without name";
    
    if($_SESSION["adm"]==false) header("location: ./homePage.php?sessionid=". $_SESSION['id']);
    else if($_SESSION["adm"]==true) header("location: ./admin/admHome.php");

?>