<?php
session_start();
include 'db.php';

$pdo->query('INSERT INTO follows(followedID, followerID) values (' . $_GET['id'] .' , ' . $_SESSION['id'] . ')');
$pdo->query("INSERT INTO notifications(userID,otherUserID, type) values (" . $_GET['id'] ." ," . $_SESSION["id"]." ,  'follow' )");
header("location:../profile.php?id=". $_GET['id']);
?>