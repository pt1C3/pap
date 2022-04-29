<?php 
session_start();
include '../db.php';
require './playTable.php';
$gameID = $_POST["gameID"];
$language = $_POST["language"];

if ($gameID != '0') {
    //codigo se tiver jogo
    $query = "SELECT * FROM user INNER JOIN likedgames ON likedgames.userID = user.userID INNER JOIN languages on languages.userID = user.userID WHERE user.userID != ". $_SESSION["id"]." and userLanguage like '%" . $language ."%' and gameID = " . $gameID . " GROUP BY user.username";
    $users = $pdo->query($query)->fetchAll();
    if(count($users) == 0) echo "<tr><td colspan=\"7\">No users found.</td></tr>";
    else Table($users, $pdo);
}
else {
    $query = "SELECT * FROM user INNER JOIN languages on languages.userID = user.userID WHERE user.userID != ". $_SESSION["id"]." and userLanguage like '%". $language ."%' GROUP BY user.username";
    $users = $pdo->query($query)->fetchAll();
    if(count($users) == 0) echo "<tr><td colspan=\"7\">No users found.</td></tr>";
    else Table($users, $pdo);
}




?>