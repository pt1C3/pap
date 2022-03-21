<?php 
    session_start();
    include 'db.php';

    $pdo->query('INSERT INTO likedgames (userID, gameID) values (' . $_SESSION['id'] . ' , ' . $_GET["id"] .')');
    array_push($_SESSION["likes"], $_GET["id"]); //adicionar o like na lista
    header("location:../game.php?id=". $_GET["id"]);
?>