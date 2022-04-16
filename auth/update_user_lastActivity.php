<?php
include('db.php');
session_start();
$statement = $pdo->query("UPDATE user SET lastActivity = CURRENT_TIMESTAMP() WHERE userID = ".$_SESSION["id"]);
?>
