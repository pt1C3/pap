<html>

<head>
  <title>Play - LetsGame</title>
  <link rel="icon" href="./images/iconfavicon.ico">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="play.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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

  <div class='data' id="getgameID" name="<?php if (isset($_GET["gameID"]) == true) echo $_GET["gameID"]; else echo '0';?>">


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
      <div class="searchTools" style="width:80%;margin-left:10%;background:red;height:5vh;display:flex;justify-content:space-between;margin-bottom:10pt;">
        <div style="width:30%;display:flex;" id="usernameSearch" >
          <input id="txtUsername" type="text" class="pesquisa" style="width:90%;" placeholder="Search Users..." required />
          <input id="search" class="searchBTN" type="image" style="height:80%;" src="./images/lupa.png" />
        </div>
        <div style="width:30%;display:none;" id="ageSearch">
          <input type="number" id="txtMinAge" placeholder="Min Age">
          <input type="number" id="txtMaxAge" placeholder="Max Age">
        </div>
        <div style="width:30%;display:none;" id="countrySearch">
          <input type="txtCountry" placeholder="Country">
        </div>
        <div style="width:30%;display:none;" id="languageSearch">
          <input type="text" placeholder="Language">
        </div>
        <span>
          <label>Search by:</label>
          <select id="mySelect">
            <option name="username">Username</option>
            <option name="age">Age</option>
            <option name="country">Country</option>
            <option name="language">Language</option>
          </select>
        </span>

      </div>
      <div id="table-wrapper">
        <table id="usersList">
          <thead>
            <tr>
              <th style="border-top-left-radius: 8px;"><span class="text">Username</span></th>
              <th><span class="text">Languages</span></th>
              <th><span class="text">Rating</span></th>
              <th><span class="text">Country</span></th>
              <th><span class="text">Age</span></th>
              <th><span class="text">Online</span></th>
            </tr>
          </thead>
          <tbody id="tabela">

            <?php
            if (isset($_GET["gameID"]) == true) {
              $users = $pdo->query("SELECT * FROM user, likedgames WHERE likedgames.gameID=" . $_GET["gameID"] . " and likedgames.userID= user.userID")->fetchAll();
            } else $users = $pdo->query("SELECT * FROM user ")->fetchAll();


            foreach ($users as $user) {
              if ($user["isAdmin"] != 1) {

                $dadosLanguages = $pdo->query("SELECT userLanguage FROM languages where userID=" . $user["userID"])->fetchall();
                $languages = array_column($dadosLanguages, 0);
                echo '<tr>
                <td> <a style="color:white;" id="getID"name="' . $user["userID"] . '" href="./profile.php?id=' . $user["userID"] . '" target="_blank">' . $user["username"] . '</a></td>
            <td>' . implode(", ", $languages) . '</td>
            <td>' . round($user["rating"], 1) . '</td>
            <td>' . $user["country"] . '</td>
            <td>' . date_diff(date_create($user["birthdate"]), date_create('now'))->y . '</td>
            <td id="status"></td>
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

  <?php include './components/footer.php';
  include './scripts/update_user_lastActivity.php'; ?>
  <script>
  $(document).ready(function() {
    let to_user_id = $("#getID").attr("name");
    let gameID = $("#getgameID").attr("name");
    $.ajax({ //Verifica e escreve se o user ta online ou offline
                url: "./auth/fetch_userStatus.php",
                method: "POST",
                data: {
                    userID: to_user_id
                },
                success: function(data) {
                    $('#status').html(data);
                }
            });
  });
  
  //dropdownlist com o tipo de pesquisa
    $('#mySelect').change(function() {
      let to_user_id = $("#getID").attr("name")
      var value = $("#mySelect").find(':selected').attr("name");
      //switch com o tipo de pesquisa
      switch (value) {
        case 'username':
          $('#usernameSearch').css('display', 'flex');
          $('#ageSearch').css('display', 'none');
          $('#countrySearch').css('display', 'none');
          $('#languageSearch').css('display', 'none');
          $(document).on('click', '#search', function(){
            alert('username');  
            $.ajax({ 
                    url: "./auth/play/usernameSearch.php",
                    method: "POST",
                    data: {
                        username: $("#txtUsername").val(),
                        gameID: gameID
                    },
                    success: function(data) {
                        alert($("#txtUsername").val())
                    }
                })
          })
          break;
        case 'age':
          $('#usernameSearch').css('display', 'none');
          $('#ageSearch').css('display', 'flex');
          $('#countrySearch').css('display', 'none');
          $('#languageSearch').css('display', 'none');
          $("#ageSearch").on("submit", function(){
          $.ajax({ 
                    url: "./auth/play/ageSearch.php",
                    method: "POST",
                    data: {
                        minAge: $("#txtMinAge").val(),
                        maxAge: $("#txtMaxAge").val(),
                        gameID: gameID
                    },
                    success: function(data) {
                        //receber os dados
                    }
                })
              })
          break;
        case 'country':
          $('#usernameSearch').css('display', 'none');
          $('#ageSearch').css('display', 'none');
          $('#countrySearch').css('display', 'flex');
          $('#languageSearch').css('display', 'none');
          $("#countrySearch").on("submit", function(){
          $.ajax({ 
                    url: "./auth/play/ageSearch.php",
                    method: "POST",
                    data: {
                        country: $("#txtCountry").val(),
                        gameID: gameID
                    },
                    success: function(data) {
                        //receber os dados
                    }
                })
              })
          break;
        case 'language':
          $('#usernameSearch').css('display', 'none');
          $('#ageSearch').css('display', 'none');
          $('#countrySearch').css('display', 'none');
          $('#languageSearch').css('display', 'flex');
          $("#languageSearch").on("submit", function(){
          $.ajax({ 
                    url: "./auth/play/languageSearch.php",
                    method: "POST",
                    data: {
                        country: $("#txtLanguage").val(),
                        gameID: gameID
                    },
                    success: function(data) {
                        //receber os dados
                    }
                })
              })
          break;
        default: //se for default faz a pesquisa por username
          $('#usernameSearch').css('display', 'flex');
          $('#ageSearch').css('display', 'none');
          $('#countrySearch').css('display', 'none');
          $('#languageSearch').css('display', 'none');
          $("#usernameSearch").on("submit", function(){
            $.ajax({ 
                    url: "./auth/play/usernameSearch.php",
                    method: "POST",
                    data: {
                        username: $("#txtUsername").val(),
                        gameID: <?php if (isset($_GET["gameID"]) == true) echo $_GET["gameID"]; else echo '0';?>
                    },
                    success: function(data) {
                        //receber os dados
                    }
                })
          })
          break;
      }

    });
    
  </script>
</body>
<script>
</script>

</html>