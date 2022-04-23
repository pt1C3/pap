<?php 
session_start();
include '../db.php';
include './playTable.php';
$gameID = $_POST["gameID"];
$username = $_POST["username"];
if (isset($gameID) != 0) {
              $users = $pdo->query("SELECT * FROM user, likedgames WHERE likedgames.gameID=" . $gameID . " and likedgames.userID= user.userID and user.username like '%". $username ."%'")->fetchAll();
} else $users = $pdo->query("SELECT * FROM user WHERE username like '%" . $username . "%'")->fetchAll();
echo '<p>cheguei ao php</p>';
?>
