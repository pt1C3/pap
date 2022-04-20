<?php
include 'db.php';
include 'fetch_userChat.php';
session_start();
if ($_POST['message'] != "") {


    $user =  $pdo->query('SELECT * FROM user WHERE userID=' . $_POST['to_userID'])->fetch();

    $query = $pdo->prepare("INSERT INTO chatmessage (to_userID, from_userID, message) VALUES (:to_userID, :from_userID, :message)");

    $query->bindParam(':to_userID', $_POST['to_userID']);
    $query->bindParam(':from_userID', $_SESSION['id']);
    $query->bindParam(':message', $_POST['message']);
    if ($query->execute()) {
        $pdo->query("INSERT INTO notifications(userID,otherUserID, type) values (" . $_POST['to_userID'] . " ," . $_SESSION["id"] . " ,  'chat' )");
    }
}
fetch_user_chat($_POST['to_userID'], $pdo);
