<?php
session_start();
include './db.php';
$null = null;
$userID = $pdo->query("SELECT userID FROM user ORDER BY userID DESC LIMIT 1")->fetch()["userID"] + 1;
$file_temp = $_FILES['image']['tmp_name'];
$file_name = $_FILES['image']['name'];
$file_separated = explode('.', $file_name);
$file_extension = end($file_separated);

$query = $pdo->prepare("INSERT INTO user (username, password,email,name,birthdate,sex,steamprofile,epicprofile,uplay,country,image,biography)
VALUES (:username, :password,:email,:name,:birthdate,:sex,:steamprofile,:epicprofile,:uplay,:country,:image,:biography)");
$username= strtolower($_POST["username"]);
$query->bindParam(':username', $username);
$query->bindParam(':password', $_POST["password"]);
$query->bindParam(':email', $_POST["email"]);
$query->bindParam(':name', $_POST["name"]);
$query->bindParam(':birthdate', $_POST["birthdate"]);
$query->bindParam(':sex', $_POST["sex"]);

if(isset($_POST["steamprofile"])==false|| $_POST["steamprofile"] == "" || $_POST["steamprofile"] == " ")$query->bindParam(':steamprofile',$null);
else $query->bindParam(':steamprofile', $_POST["steamprofile"]); 

if(isset($_POST["epicprofile"])==false || $_POST["epicprofile"] == "" || $_POST["epicprofile"] == " ")$query->bindParam(':epicprofile',$null);
else $query->bindParam(':epicprofile', $_POST["epicprofile"]); 

if(isset($_POST["uplay"])==false || $_POST["uplay"] == "" || $_POST["uplay"] == " ")$query->bindParam(':uplay',$null);
else $query->bindParam(':uplay', $_POST["uplay"]);

$query->bindParam(':country', $_POST["country"]);

$file_temp = $_FILES['image']['tmp_name'];
$file_separated = explode('.', $file_name);
$file_extension = end($file_separated);

$file_path = $_SERVER['DOCUMENT_ROOT'] . "/pap/images/utilizadores/". $userID. "." . $file_extension;
$query->bindParam(':image', $file_path);
move_uploaded_file($file_temp, $file_path);


if(isset($_POST["biography"])==false|| $_POST["biography"] == "" || $_POST["biography"] == " ")$query->bindParam(':biography',$null);
else $query->bindParam(':biography', $_POST["biography"]); 
$query->execute();
header("location:../login.php")
?>
