<?php 
    session_start();
    include 'db.php';

    $pdo->query('DELETE FROM likedgames where userID = ' . $_SESSION['id'] . ' and gameID =  ' . $_GET["id"]);
    unset($_SESSION["likes"][array_search($_GET["id"], $_SESSION["likes"])]); //tirar o like da lista
    header("location:../game.php?id=". $_GET["id"]);
?>