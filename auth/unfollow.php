<?php
session_start();
include 'db.php';

$pdo->query('DELETE FROM follows WHERE followedID = ' . $_GET['id'] .' and followerID=' . $_SESSION['id']);
header("location:../profile.php?id=". $_GET['id']);
?>