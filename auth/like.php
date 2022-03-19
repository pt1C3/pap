<?php 
    session_start();
    include 'db.php';

    $pdo->query('INSERT INTO likedgames (userID, gameID) values (' . $_SESSION['id'] . ' , ' . $_GET["id"] .')');
    header("location:../game.php?id=". $_GET["id"]);
?>