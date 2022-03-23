<?php 
    session_start();
    include 'db.php';

    $pdo->query('INSERT INTO likedgames (userID, gameID) values (' . $_SESSION['id'] . ' , ' . $_GET["id"] .')');
    $dadoLikes = $pdo->query( 'SELECT gameID FROM likedgames WHERE userID = ' . $_SESSION['id'] )->fetchAll(PDO::FETCH_COLUMN);
    $_SESSION['likes'] = $dadoLikes;
    header("location:../game.php?id=". $_GET["id"]);
?>