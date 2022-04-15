<?php
session_start();
include 'db.php';

$pdo->query('DELETE FROM follows WHERE followedID = ' . $_GET['id'] .' AND followerID=' . $_SESSION['id']);
$pdo->query('DELETE FROM notifications WHERE type="follow" AND userID = ' . $_GET['id'] .' AND otherUserID=' . $_SESSION['id']);
header("location:../profile.php?id=". $_GET['id']);
?>