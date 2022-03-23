<?php
session_start();
include 'db.php';

$pdo->query('INSERT INTO follows(followedID, followerID) values (' . $_GET['id'] .' , ' . $_SESSION['id'] . ')');
header("location:../othersProfile.php?id=". $_GET['id']);
?>