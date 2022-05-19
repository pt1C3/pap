<?php 
session_start();
include '../db.php';
require './playTable.php';
$gameID = $_POST["gameID"];
$minage = $_POST["minAge"];
$maxage = $_POST["maxAge"];


if ($gameID != '0') {
    $query = "SELECT * FROM user INNER JOIN likedgames on likedgames.userID = user.userID WHERE active=1 AND isAdmin=0 AND gameID = ".$gameID . " AND user.userID != ". $_SESSION["id"]." and TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) between " . $minage. " and " . $maxage;
    $users = $pdo->query($query)->fetchAll();
    if(count($users) == 0) echo "<tr><td colspan=\"7\">No users found.</td></tr>";
    else Table($users, $pdo);
}
else {
    $query = "SELECT * FROM user WHERE active=1 AND isAdmin=0 AND user.userID != ". $_SESSION["id"]." and TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) between " . $minage. " and " . $maxage;
    $users = $pdo->query($query)->fetchAll();
    if(count($users) == 0) echo "<tr><td colspan=\"7\">No users found.</td></tr>";
    else Table($users, $pdo);
}






?>