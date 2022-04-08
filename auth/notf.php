<?php
$id = $_GET["notfID"];
include 'db.php';
session_start();
$pdo->query("UPDATE follows SET viewed=1 WHERE id=". $id);
$url = "../profile.php?id=" . $_GET["profileID"];
header("location: ". $url);
?>