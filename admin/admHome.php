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

        <a class="buttones" href="">OTHERS . . .</a>

      </div>


    </div>

    <div style="width:70%;height:100%;display:inline;background-color: #181b3f;border:3px solid blue;">

      <!--utilizadores-->

      <p style="margin: 20px;text-align:center;font-family:Aldo;letter-spacing: 1pt;font-size:30pt">USERS</p>

      <div id="items" style="display: flex;gap:25%;text-align:center;margin-left:5%">

        <div id="statistics" style="margin:5%;">

          <p style="font-size:30pt;font-family:Aldo;padding-bottom:40px">STATISTICS</p>

          <p>People online right now: 69</p>
        </div>

        <div id="actions" style="margin:5%;">

          <p style="font-size:30pt;font-family:Aldo;padding-bottom:40px">ACTIONS</p>

          <div style="display:grid;gap:20px;">

          <a class="buttones" href="" style="width: 250px;">BAN USER</a>

          <a class="buttones" href="" style="width: 250px;">UNBAN USER</a>

          <a class="buttones" href="" style="width: 250px;">EDIT PROFILE</a>

          <a class="buttones" href="" style="width: 250px;">EDIT PROFILE</a>

          </div>


        </div>

      </div>





    </div>
  </div>

</body>

</html>