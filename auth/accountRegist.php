<?php
session_start();
include './db.php';
$null = null;
$userID = $pdo->query("SELECT userID FROM user ORDER BY userID DESC LIMIT 1")->fetch()["userID"] + 1;

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







if(isset($_POST["biography"])==false|| $_POST["biography"] == "" || $_POST["biography"] == " ")$query->bindParam(':biography',$null);
else $query->bindParam(':biography', $_POST["biography"]); 


$file_temp = $_FILES['image']['tmp_name'];
$file_name = $_FILES['image']['name'];
$file_separated = explode('.', $file_name);
$file_extension = end($file_separated);

$file_path = "../../pap/images/utilizadores/". $userID. ".png";

if($file_extension == "png")$imageNcrop = imagecreatefrompng($file_temp);
else if ($file_extension == "jpg" || $file_extension == "jpeg") $imageNcrop =imagecreatefromjpeg($file_temp);

$size = min(imagesx($imageNcrop), imagesy($imageNcrop));
if($size == imagesx($imageNcrop))
{

    $imCrop = imagecrop($imageNcrop, ['x' => 0, 'y' => ((imagesy($imageNcrop)-$size)/2), 'width' => $size, 'height' => $size]);   
    echo '<p>passei onde o x é minimo</p>';
}
else if($size == imagesy($imageNcrop)){
    $imCrop = imagecrop($imageNcrop, ['x' =>((imagesx($imageNcrop)-$size)/2), 'y' => 0, 'width' => $size, 'height' => $size]);    
    echo '<p>passei onde o y é minim</p>';
}
if ($imCrop !== FALSE) {
    imagepng($imCrop, $file_path);
}
imagedestroy($imageNcrop);
imagedestroy($imCrop);

$query->bindParam(':image', $file_path);
$query->execute();

header("location:../login.php");

?>
