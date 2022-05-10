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



    <form class="formadd" action="../auth/addgame.php" method="post" style="gap: 20px;display:grid">

    </form>


  </div>

</body>

</html>