<?php
$id = $_GET["id"];
include 'db.php';
$pdo->query("UPDATE follows SET viewed=1 WHERE id=". $id);
header("location: ../homePage.php");
?>