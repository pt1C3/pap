<?php 
session_start();
include('../db.php');
$pdo->query("INSERT INTO played (user1, user2) VALUES(". $_SESSION["id"] .",". $_GET["id"].")");
header("location: ../../chat.php?id=" . $_GET["id"]);
?>