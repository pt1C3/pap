<html>

<head>
  <title>Play - LetsGame</title>
  <link rel="icon" href="./images/iconfavicon.ico">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="play.css">
</head>

<body>
  <?php
  session_set_cookie_params(0);
  session_start();
  include './components/navbar.php';
  include './auth/db.php';
  $games = $pdo->query("SELECT * FROM games ORDER BY title asc")->fetchAll();
  ?>
  <!--Navbar-->


  <!--Home Page before Login-->

  <div class='data'>

    <p style="font-size:30pt;align-self: center;padding-bottom:20px;">Choose your game</p>


    <div class='supportedGames'>

      <?php
      foreach ($games as $game) {
        echo '<a href="#" onclick="selected()"><img src="' . $game['thumbnail'] . '" class="gameThumb"/></a>';
      }
      foreach ($games as $game) {
        echo '<a href="#" onclick="selected()"><img src="' . $game['thumbnail'] . '" class="gameThumb"/></a>';
      }
      ?>

    </div>
    <div>
      <a id="nextbutton" href="#">Next</a>
    </div>



    



  </div>
  <!--Home Page before Login-->
</body>
<script>
  function selected() {
    var imgselected = document.getElementById('nextbutton');
    imgselected.style.pointerEvents = "all";
    imgselected.style.visibility = "visible";
  }
</script>

</html>