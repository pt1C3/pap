<?php include('db.php');

session_start();
$id = $_POST["userID"];
date_default_timezone_set('Europe/Lisbon');

$time = new DateTime(date("Y-m-d H:i:s"));
$time ->modify("- 10 second");// 10 segundos de diferença
$timeminus10 = $time->format("Y-m-d H:i:s");

$lastActivity = $pdo->query('SELECT lastActivity FROM user WHERE userID=' . $id)->fetch(PDO::FETCH_COLUMN);
if($lastActivity > $timeminus10)
{ echo "<p style=\"color:green;\">Online</p>";}
else
{ echo "<p style=\"color:red;\">Offline</p>";}
?>