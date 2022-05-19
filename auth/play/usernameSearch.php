<?php 
session_start();
include '../db.php';
require './playTable.php';
$gameID = $_POST["gameID"];
$username = $_POST["username"];

if ($gameID != '0') {
    //codigo se tiver jogo
    $query = "SELECT * FROM user INNER JOIN likedgames ON likedgames.userID = user.userID WHERE active=1 AND isAdmin=0 AND user.userID != ". $_SESSION["id"]." and username like '%" . $username ."%' and gameID = " .$gameID;
    $users = $pdo->query($query)->fetchAll();
    if(count($users) == 0) echo "<tr><td colspan=\"7\">No users found.</td></tr>";
    else Table($users, $pdo);
}
else {
    $users = $pdo->query("SELECT * FROM user WHERE active=1 AND isAdmin=0 AND userID != ". $_SESSION["id"]." and username like'%". $username ."%'")->fetchAll();
    if(count($users) == 0) echo "<tr><td colspan=\"7\">No users found.</td></tr>";
    else Table($users, $pdo);
}




?>
