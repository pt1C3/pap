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

<body >
  <?php
  session_start();
  if (isset($_SESSION["adm"]) == false || $_SESSION["adm"] == false) header("location: ../index.php");
  include './navbar.php';
  include '../auth/db.php';



  ?>
  <div class="data" >

    <form class="formadd" action="processa/addsaga.php" method="post" style="gap: 20px;display:grid">
        <p style="font-size:35pt;font-family:Aldo;text-align:center;">Add Game:</p>
        <input type="text" name="title" placeholder="Title">  
        <input type="text" name="rating" placeholder="Rating">
        <input type="text" name="link" placeholder="Link">
        <input type="text" name="thumbnail" placeholder="Thumbnail">
        <input type="text" name="trailer" placeholder="Trailer">
        <input type="text" name="genre" placeholder="Genre">
        <input class="play" type="submit" value="Add">

    </form>

  </div>

</body>

</html>