<?php 
session_start();
include '../db.php';
require './playTable.php';
$gameID = $_POST["gameID"];
$username = $_POST["username"];
$getuserID = $pdo->query("SELECT userID FROM user WHERE username like '%" . $username ."%'")->fetchAll();
if ($gameID != '0') {
    $users = array();
    foreach($getuserID as $ID)
    {
        $users=$pdo->query("SELECT * FROM user INNER JOIN likedgames ON user.userID = likedgames.userID WHERE likedgames.gameID=" . $gameID . " and likedgames.userID = ". $ID["userID"]));
    }
    Table($users, $pdo);
}
else {
    $users = $pdo->query("SELECT * FROM user")->fetchAll();
    Table($users, $pdo);
}




?>
