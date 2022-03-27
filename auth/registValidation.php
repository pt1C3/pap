<?php 

$username = $_POST["username"];
$password  = $_POST["password"];
$confirmpassword  = $_POST["confirmpassword"];

$Existusername = $pdo->query('SELECT * FROM user WHERE username ="' . $username . '"')->fetch();

if (!($confirmpassword == $password)) $passworderror .= "Passwords do not match...";
if (is_null($Existusername['username']) == false) $usernameerror .= "Username Already Exists...";

if ($usernameerror == "" && $passworderror == "") {
    echo true;

}

?>