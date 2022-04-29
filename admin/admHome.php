<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./admHome.css">
  <link rel="stylesheet" href="../styles.css">
  <title>LetsGame</title>
</head>

<body style="padding-top: 5%;">
  <?php
  session_start();
  if (isset($_SESSION["adm"]) == false || $_SESSION["adm"] == false) header("location: ../index.php");
  include './navbar.php';
  include '../auth/db.php';
  ?>
  <div class="data" style="gap: 20px;border:3px solid blue">
    <div style="width:30%;background-color:red;height:100%;display:inline;">
      <!--jogos-->
      <h1 style="margin: 20px;text-align:center">JOGOS</h1>

      <a href="">ADD</a>

      <a href="">REMOVE</a>

      <a href="">EDIT</a>

    </div>

    <div style="width:70%;background-color:cyan;height:100%;display:inline;">
      <!--utilizadores-->
      <h1 style="margin: 20px;text-align:center">UTILIZADORES</h1>
    </div>
  </div>

</body>

</html>