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
      <h1 style="font-size:30pt;align-self: center;padding-bottom:20px;">Choose your game</p>
      <div class='gameWrapper'>
      <div class='games'>
        <?php
        foreach ($games as $game) {
          echo '<a href="play.php?gameID=' . $game["gameID"] . '"><img src="' . $game['thumbnail'] . '" class="gameThumb"/></a>';
        }

        ?>

      </div>
      </div>
    </div>
    <div>
      <div id="table-wrapper">
        <table id="usersList">
          <thead>
            <tr>
              <th style="border-top-left-radius: 8px;"><span class="text">Username</span></th>
              <th><span class="text">Languages</span></th>
              <th><span class="text">Rating</span></th>
              <th><span class="text">Sex</span></th>
            </tr>
          </thead>
          <tbody>

            <?php
            if (isset($_GET["gameID"]) == true) {
              $users = $pdo->query("SELECT * FROM user, likedgames WHERE likedgames.gameID=" . $_GET["gameID"] . " and likedgames.userID= user.userID")->fetchAll();
            } else $users = $pdo->query("SELECT * FROM user ")->fetchAll();


            foreach ($users as $user) {
              if ($user["isAdmin"] != 1) {

                $dadosLanguages = $pdo->query("SELECT userLanguage FROM languages where userID=" . $user["userID"])->fetchall();
                $languages = array_column($dadosLanguages, 0);
                echo '<tr>
                <td> <a style="color:white;" href="./profile.php?id=' . $user["userID"] . '" target="_blank">' . $user["username"] . '</a></td>
            <td>' . implode(", ", $languages) . '</td>
            <td>' . round($user["rating"], 1) . '</td>
            <td>' . $user["sex"] . '</td>
            <td>button para selecionar</td>
            </tr>';
              }
            }
            ?>
          </tbody>
        </table>
      </div>

      <a id="nextbutton" href="#">Next</a>
    </div>







  </div>
  <!--Home Page before Login-->

  <?php include './components/footer.php'; ?>
</body>
<script>
</script>

</html>