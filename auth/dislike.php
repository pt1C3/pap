<?php 
    session_start();
    include 'db.php';

    $pdo->query('DELETE FROM likedgames where userID = ' . $_SESSION['id'] . ' and gameID =  ' . $_GET["id"]);
    $dadoLikes = $pdo->query( 'SELECT gameID FROM likedgames WHERE userID = ' . $_SESSION['id'] )->fetchAll(PDO::FETCH_COLUMN);
    $_SESSION['likes'] = $dadoLikes;
    header("location:../game.php?id=". $_GET["id"]);
?>