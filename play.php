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
              if(isset($_GET["gameID"])) 
              {
                if($game["gameID"]==$_GET["gameID"]) echo '<a href="play.php?gameID=' . $game["gameID"] . '"><img src="' . $game['thumbnail'] . '" class="gameThumb" style="border:dashed 3pt gold;   transform: scale(1.1);"/></a>';
              else  echo '<a href="play.php?gameID=' . $game["gameID"] . '"><img src="' . $game['thumbnail'] . '" class="gameThumb"/></a>';
              }
              else  echo '<a href="play.php?gameID=' . $game["gameID"] . '"><img src="' . $game['thumbnail'] . '" class="gameThumb"/></a>';

            }

            ?>

          </div>
        </div>
    </div>

    <div>
      <div class="searchTools" >
        <div class="searchSearch" style="display:flex;" id="usernameSearch" >
          <input id="txtUsername" type="text" class="pesquisa" style="width:90%;border-radius:5px;" placeholder="Search Users..." required />
          <button class="searchButton" id="searchUsername"  ><img src="./images/lupa.png" style="height:70%;"></button>
        </div>
        <div class="searchSearch" style="display:none;" id="ageSearch">
          <input type="number" id="txtMinAge" placeholder="Min Age">
          <input type="number" id="txtMaxAge" placeholder="Max Age">
          <button class="searchButton" id="searchAge"  ><img src="./images/lupa.png" style="height:80%;"></button>        
          </div>
        <div class="searchSearch" style="display:none;" id="countrySearch">
          <input id="txtCountry" type="text" class="pesquisa" style="width:90%;" placeholder="Search Country..." required />
          <button class="searchButton" id="searchCountry"  ><img src="./images/lupa.png" style="height:80%;"></button>        
          </div>
        <div class="searchSearch" style="display:none;" id="languageSearch">
        <input id="txtLanguage" type="text" class="pesquisa" style="width:90%;" placeholder="Search Language..." required />
          <button class="searchButton" id="searchLanguage" ><img src="./images/lupa.png" style="height:80%;"></button>        
          </div>
        <span class="searchSelect">
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
              <th><span class="text">Select</span></th>
            </tr>
          </thead>
          <tbody id="tabela">

           
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
        let to_user_id = $("#getID").attr("name");
    let gameID2 = $("#getgameID").attr("name");
  $(document).ready(function() {

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
            $.ajax({ 
                    url: "./auth/play/usernameSearch.php",
                    method: "POST",
                    data: {
                        username: $("#txtUsername").val(),
                        gameID: gameID2
                    },
                    success: function(data) {
                          $('#tabela').html(data);  
                    }
                })
    usernameSearch();
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
          usernameSearch();
          break;
        case 'age':
          $('#usernameSearch').css('display', 'none');
          $('#ageSearch').css('display', 'flex');
          $('#countrySearch').css('display', 'none');
          $('#languageSearch').css('display', 'none');
          $(document).on('click', '#searchAge', function(){
          $.ajax({ 
                    url: "./auth/play/ageSearch.php",
                    method: "POST",
                    data: {
                        minAge: $("#txtMinAge").val(),
                        maxAge: $("#txtMaxAge").val(),
                        gameID: gameID2
                    },
                    success: function(data) {
                      $('#tabela').html(data);
                    }
                })
              })
          break;
        case 'country':
          $('#usernameSearch').css('display', 'none');
          $('#ageSearch').css('display', 'none');
          $('#countrySearch').css('display', 'flex');
          $('#languageSearch').css('display', 'none');
          $(document).on('click', '#searchCountry', function(){
          $.ajax({ 
                    url: "./auth/play/countrySearch.php",
                    method: "POST",
                    data: {
                        country: $("#txtCountry").val(),
                        gameID: gameID2
                    },
                    success: function(data) {
                      $('#tabela').html(data);                      
                    }
                })
              })
          break;
        case 'language':
          $('#usernameSearch').css('display', 'none');
          $('#ageSearch').css('display', 'none');
          $('#countrySearch').css('display', 'none');
          $('#languageSearch').css('display', 'flex');
          $(document).on('click', '#searchLanguage', function(){
          $.ajax({ 
                    url: "./auth/play/languageSearch.php",
                    method: "POST",
                    data: {
                        language: $("#txtLanguage").val(),
                        gameID: gameID2
                    },
                    success: function(data) {
                      $('#tabela').html(data);  
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
    

    function usernameSearch(){
      $(document).on('click', '#searchUsername', function(){
            $.ajax({ 
                    url: "./auth/play/usernameSearch.php",
                    method: "POST",
                    data: {
                        username: $("#txtUsername").val(),
                        gameID: gameID2
                    },
                    success: function(data) {
                          $('#tabela').html(data);  
                    }
                })
          })
    }

  </script>
</body>
<script>
</script>

</html>