<?php 
session_start();
include '../db.php';
require './playTable.php';
$gameID = $_POST["gameID"];
$minage = $_POST["minAge"];
$maxage = $_POST["maxAge"];



    $query = "SELECT * FROM user WHERE user.userID != ". $_SESSION["id"]." and TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) between " . $minage. " and " . $maxage;
    $users = $pdo->query($query)->fetchAll();
    //foreach($users as $user) {echo '<p style="background-color:red;"> a + '. $user["age"] .'</p>';}
    
    if(count($users) == 0) echo "<tr><td colspan=\"7\">No users found.</td></tr>";
    else Table($users, $pdo);





?>