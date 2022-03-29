<?php

session_start();
include 'db.php';

$pdo->query("INSERT INTO comment(authorID, profileID,commentText) values (" . $_POST['authorID'] ." , " .  $_POST['profileID']. ', "'. $_POST['comment'] ."\")");
header("location:../profile.php?id=". $_POST['profileID']);
?>