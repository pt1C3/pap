<?php
function Table($users, $pdo)
{
  $i = 1;
  foreach ($users as $user) {
    if ($user["isAdmin"] != 1) {

      $dadosLanguages = $pdo->query("SELECT userLanguage FROM languages where userID=" . $user["userID"]. " LIMIT 3")->fetchall();
      $languages = array_column($dadosLanguages, 0);
      echo '<tr>
              <td> <a style="color:white;" id="getID"name="' . $user["userID"] . '" href="./profile.php?id=' . $user["userID"] . '" target="_blank">' . $user["username"] . '</a></td>
              <td>' . implode(", ", $languages) . '</td>
              <td>' . round($user["rating"], 1) . '</td>
              <td>' . $user["country"] . '</td>
              <td>' . date_diff(date_create($user["birthdate"]), date_create('now'))->y . '</td>
              <td id="status' . $i . '"></td>
              <td>button para selecionar</td>
            </tr>
            <script>
            
            $(document).ready(function() {

              $.ajax({ //Verifica e escreve se o user ta online ou offline
                          url: "./auth/fetch_userStatus.php",
                          method: "POST",
                          data: {
                              userID: ' . $user["userID"]. '
                          },
                          success: function(data) {
                              $("#status'.$i.'").html(data);
                          }
                      });
            });
            </script>
            ';
            $i++;
    }
  }
}
?>
