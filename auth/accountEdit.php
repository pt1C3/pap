<?php
session_start();
include './db.php';
$null = null;
$user = $pdo->query("SELECT * FROM user WHERE userID = " . $_SESSION["id"])->fetch();

$query = $pdo->prepare("UPDATE user SET email = :email,name = :name,birthdate = :birthdate, sex = :sex,steamprofile = :steamprofile,epicprofile = :epicprofile,uplay= :uplay,country = :country,image = :image,biography = :biography WHERE userID = " . $_SESSION["id"]);
$query->bindParam(':email', $_POST["email"]);
$query->bindParam(':name', $_POST["name"]);
$query->bindParam(':birthdate', $_POST["birthdate"]);
$query->bindParam(':sex', $_POST["sex"]);

$query->bindParam(':steamprofile', $_POST["steamprofile"]); 

$query->bindParam(':epicprofile', $_POST["epicprofile"]); 

$query->bindParam(':uplay', $_POST["uplay"]);

$query->bindParam(':country', $_POST["country"]);







if(isset($_POST["biography"])==false|| $_POST["biography"] == "" || $_POST["biography"] == " ")$query->bindParam(':biography',$null);
else $query->bindParam(':biography', $_POST["biography"]); 

if(file_exists($_FILES['avatar']['tmp_name'])==true || is_uploaded_file($_FILES['avatar']['tmp_name'])==true)
{
    $file_temp = $_FILES['avatar']['tmp_name'];
    $file_name = $_FILES['avatar']['name'];
    $file_separated = explode('.', $file_name);
    $file_extension = end($file_separated);

    $file_path = "../../pap/images/utilizadores/". $user["userID"]. ".png";

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
} else $query->bindParam(':image', $_SESSION["userAvatar"]);

$query->execute();

$dado = $pdo->query('SELECT *, ROUND(rating,1) as "rating" FROM user WHERE userID ="' . $_SESSION["id"] . '"')->fetch();
    $_SESSION['adm'] = $dado['isAdmin'];
    $_SESSION['loggedin'] = true;
    $_SESSION['id'] = $dado['userID'];
    $_SESSION['username'] = $dado['username'];
    $_SESSION['userAvatar'] = $dado['image'];
    $_SESSION['email'] = $dado['email'];
    $_SESSION['birthDate'] = $dado['birthdate'];
    $_SESSION['country'] = $dado['country'];
    $_SESSION['rating'] = round($dado['rating'],1);
    $_SESSION['description'] = $dado["biography"];
    $followers = $pdo->query("SELECT Count(*) as 'number' FROM follows where followedID=" . $dado['userID'])->fetch();
    $_SESSION['followers'] =$followers["number"];

    switch ($dado['sex']) {
        case 'M':
            $_SESSION['sex'] = "Male";
            break;
        case 'F':
            $_SESSION['sex'] = "Female";
            break;
        case 'O':
            $_SESSION['sex'] = "Other";
            break;
        
        default:$_SESSION['sex']="Not Given";
        break;
    }
    if(isset($dado["steamprofile"])==false)    $_SESSION['steamProfile'] = "Not Provided";
    else $_SESSION['steamProfile'] = $dado["steamprofile"];
    if(isset($dado["epicprofile"])==false)    $_SESSION['epicProfile'] = "Not Provided";
    else $_SESSION['epicProfile'] = $dado["epicprofile"];
    if(isset($dado["uplayprofile"])==false)    $_SESSION['uplayProfile'] = "Not Provided";
    else $_SESSION['uplayProfile'] = $dado["uplay"];

    $dadoLinguas = $pdo->query( 'SELECT userLanguage FROM languages WHERE userID = ' . $_SESSION['id'] )->fetchAll();
    $_SESSION['languages'] = $dadoLinguas;
    $dadoLikes = $pdo->query( 'SELECT gameID FROM likedgames WHERE userID = ' . $_SESSION['id'] )->fetchAll(PDO::FETCH_COLUMN);
    $_SESSION['likes'] = $dadoLikes;

    $pdo->query('UPDATE user SET lastLogin = current_timestamp() WHERE userID ="' . $_SESSION['id'] . '"');

    if(!is_null($dado['name'])) $_SESSION['name'] = $dado['name'];
    else $_SESSION['name'] = "Gamer without name";
    
    if($_SESSION["adm"]==false) header("location: ./homePage.php?sessionid=". $_SESSION['id']);
    else if($_SESSION["adm"]==true) header("location: ./admin/admHome.php");
header("location: ../userProfile.php")
?>