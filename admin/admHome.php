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
  <div class="data" style="gap: 20px;">
    <div style="width:30%;height:100%;display:inline;background-color: #181b3f;border:3px solid blue;">
      <!--jogos-->
      <p style="margin: 20px;text-align:center;font-family:Aldo;letter-spacing: 1pt;font-size:30pt">JOGOS</p>

      <div style="display: grid;margin-left:10%;text-align:center;gap:20px;">

      <a class="buttones" href="">ADD GAMES</a>

      <a class="buttones" href="">REMOVE GAMES</a>

      <a class="buttones" href="">EDIT GAMES</a>

      </div>


    </div>

    <div style="width:70%;height:100%;display:inline;background-color: #181b3f;border:3px solid blue;">
      <!--utilizadores-->
      <p style="margin: 20px;text-align:center;font-family:Aldo;letter-spacing: 1pt;font-size:30pt">UTILIZADORES</p>
    </div>
  </div>

</body>

</html>