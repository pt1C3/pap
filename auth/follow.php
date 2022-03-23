<?php
session_start();
include 'db.php';

$pdo->query('INSERT INTO follows(followedID, followerID) values (' . $_GET['id'] .' , ' . $_SESSION['id'] . ')');
header("location:../profile.php?id=". $_GET['id']);
?>