<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./addgames.css">
  <link rel="stylesheet" href="../styles.css">
  <link rel="icon" href="../images/iconfavicon.ico">
  <title>LetsGame</title>
</head>

<body style="padding-top: 5%;">
  <?php
  session_start();
  if (isset($_SESSION["adm"]) == false || $_SESSION["adm"] == false) header("location: ../index.php");
  include './navbar.php';
  include '../auth/db.php';



  ?>
  <div class="data">



    <form class="formadd" action="auth/" method="post" style="gap: 20px;display:grid">
      <p style="font-size:35pt;font-family:Aldo;text-align:center;">Add Game:</p>
      <input type="text" name="title" placeholder="Title">
      <input type="text" name="rating" placeholder="Rating">
      <input type="text" name="link" placeholder="Link">
      <input type="text" name="thumbnail" placeholder="Thumbnail">
      <input type="text" name="trailer" placeholder="Trailer">
      <input type="text" name="genre" placeholder="Genre">

      <div style="display: flex;gap:5px;width:70%;margin-left:15%">
        <a class="play" href="/pap/admin/admHome.php">
          <img src="../images/arrow.png" alt="" style="width: 40%;transform:rotate(90deg);filter:invert(100%)">
        </a>
        <input class="play" type="submit" value="Add" style="margin-left: 0%;">

      </div>
    </form>


  </div>

</body>

</html>