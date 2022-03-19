<?php 
    session_start();
    include 'db.php';

    $pdo->query('DELETE FROM likedgames where userID = ' . $_SESSION['id'] . ' and gameID =  ' . $_GET["id"]);
    header("location:../game.php?id=". $_GET["id"]);
?>