<?php
session_start();
include './db.php';

$query = $pdo->prepare("INSERT INTO games (title,rating,link,thumbnail,trailer,genre)
VALUES (:title,:rating,:link,:thumbnail,:trailer,:genre)");
$username= strtolower($_POST["username"]);
$query->bindParam(':title', $_POST["title"]);
$query->bindParam(':rating', $_POST["rating"]);
$query->bindParam(':link', $_POST["link"]);
$query->bindParam(':thumbnail', $_POST["thumbnail"]);
$query->bindParam(':trailer', $_POST["trailer"]);
$query->bindParam(':genre', $_POST["genre"]);

$query->execute();

header("location:../admin/admHome.php");

?>
