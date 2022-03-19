<html>

<head>
  <title>Play - LetsGame</title>
  <link rel="icon" href="./images/iconfavicon.ico">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="play.css">
</head>

<body>
  <?php
  session_start();
  include 'auth/verificarLogin.php';
  include './components/navbar.php';
  include './auth/db.php';
  $games = $pdo->query("SELECT * FROM games ORDER BY title asc")->fetchAll();
  ?>
  <!--Navbar-->


  <!--Home Page before Login-->

  <div class='data'>


    <div style="text-align:center;height:25vh;">
      <p style="font-size:30pt;align-self: center;padding-bottom:20px;">Choose your game</p>
      <div class='games'>
        <?php
        foreach ($games as $game) {
          echo '<a href="#" onclick="selected('.$game["gameID"].')"><img src="' . $game['thumbnail'] . '" class="gameThumb"/></a>';
        }
        foreach ($games as $game) {
          echo '<a href="#" onclick="selected('.$game["gameID"].')"><img src="' . $game['thumbnail'] . '" class="gameThumb"/></a>';
        }
        foreach ($games as $game) {
          echo '<a href="#" onclick="selected('.$game["gameID"].')"><img src="' . $game['thumbnail'] . '" class="gameThumb"/></a>';
        }
        ?>

      </div>
    </div>
    <div>
      <table id="usersList" >
        <th colspan="5" style="background-color:green;">Users</th>
        <tr style="background-color:pink;">
          <th>Username</th>
          <th>Languages</th>
          <th>Rating</th>
          <th>Sex</th>
        </tr>
        <tr>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
        </tr>
        <?php
        $users = $pdo->query("SELECT * FROM user ")->fetchAll();

        foreach($users as $user)
        {
          $languages = $pdo->query("SELECT userLanguage FROM languages where userID=". $user["userID"])->fetch();
          echo '<tr>
          <td>'.$user["username"] . '</td>
          <td>'. implode(", ", $languages["userLanguage"]) . '</td>
          <td>'. $user["rating"]. '</td>
          <td>'. $user["sex"]. '</td>
          </tr>';

        }
        ?>
      </table>
    </div>
    <div>
      <a id="nextbutton" href="#">Next</a>
    </div>







  </div>
  <!--Home Page before Login-->
</body>
<script>
  function selected(gameID) {
    var imgselected = document.getElementById('nextbutton');
    imgselected.innerHTML = gameID;
    imgselected.style.pointerEvents = "all";
    imgselected.style.visibility = "visible";
  }
</script>

</html>