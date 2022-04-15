<?php
session_start();
include 'db.php';
include 'fetch_userChat.php';
fetch_user_chat($_POST['to_userID'],$pdo);
?>