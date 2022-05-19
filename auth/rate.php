<?php 
session_start();
include("./db.php");
$value = $_POST["rating"];
$id = $_POST["userID"];
$check = $pdo->query("SELECT COUNT(*) FROM rating WHERE raterID=" .$_SESSION["id"] ." AND ratedID=" . $id)->fetch(PDO::FETCH_COLUMN);
if($check!= "0") $pdo->query("DELETE FROM rating WHERE raterID=" .$_SESSION["id"] ." AND ratedID=" . $id);
$pdo->query("INSERT INTO rating (ratedID, raterID, rating) VALUES(". $id.", ". $_SESSION["id"]. ", " . $value . ")");
$media = $pdo->query("SELECT AVG(rating) FROM rating WHERE ratedID= " . $id)->fetch(PDO::FETCH_COLUMN);
$pdo->query("UPDATE user SET rating=" . $media. " WHERE userID = " . $id);
?>