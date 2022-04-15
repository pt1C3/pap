<?php
$id = $_GET["notfID"];
include 'db.php';
session_start();
$pdo->query("UPDATE notifications SET viewed=1 WHERE id=". $id);
$notification=$pdo->query("SELECT * FROM notifications WHERE id=". $id)->fetch();
if($notification["type"] == "follow")$url = "../profile.php?id=" . $_GET["profileID"];
if($notification["type"] == "chat")$url = "../chat.php?id=" . $_GET["profileID"]. "&passoupelonotf";
header("location: ". $url);
?>