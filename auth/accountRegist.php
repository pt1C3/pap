<?php
session_start();
include './db.php';

// Check if image file is a actual image or fake image
if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    
    $file_separated = explode('.', $file_name);
    $file_extension = end($file_separated);
    echo "<p>imagem ta - " . $_FILES['image']['tmp_name'] . " e agora é - " . $_SESSION["username"]. "." . $file_extension . "</p>";

    move_uploaded_file($file_temp, "../images/utilizadores/". $_SESSION["username"]. "." . $file_extension);
    $file_path = $_SERVER['DOCUMENT_ROOT'] . "/images/utilizadores/". $_SESSION["username"]. "." . $file_extension;
    echo '<p>'.$file_path.'</p>';
} else {
    echo "<p>imagem n ta</p>";
}
