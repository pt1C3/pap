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

<body>
  <?php
  session_set_cookie_params(0);
  session_start();
  if(isset($_SESSION["adm"]) == false || $_SESSION["adm"] == false) header("location: ../index.php");
  include './navbar.php';
  include '../auth/db.php';
  ?>
  <div class="data">

    <div style="display: flex;gap:10vh;margin-left:20%;padding-bottom:5vh">
      <a class="play" href="play.php">Edit User Profile</a>
      <a class="play" href="play.php">Remove User Profile</a>
    </div>

    <div style="display: flex;gap:10vh;margin-left:20%;padding-bottom:5vh">
      <a class="play" href="play.php">Warn an User</a>
      <a class="play" href="./reportList.php">Report List</a>
    </div>

    <div style="display: flex;gap:10vh;margin-left:20%;padding-bottom:5vh">
      <a class="play" href="play.php">Users Banned List</a>
      <a class="play" href="play.php">Users Warned List</a>
    </div>


  </div>

</body>

</html>