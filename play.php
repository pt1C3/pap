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
  include './components/navbar.php'
  ?>
  <!--Navbar-->


  <!--Home Page before Login-->

  <div class='data'>

    <p style="font-size:30pt;align-self: center;padding-bottom:20px;">Choose your game</p>


    <div class='supportedGames'>

      <?php
      $allfiles = scandir('images/GameHeader/1200x630');
      $files = array_diff($allfiles, array('.', '..'));
      foreach ($files as $file) {
        echo '<a  id="img' . $file . '" href="#"onclick="selected()"><img src="./images/GameHeader/1200x630/' . $file . '" class="gameThumb"/></a>';
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
    imgselected.style.opacity = "100%";
  }
</script>

</html>