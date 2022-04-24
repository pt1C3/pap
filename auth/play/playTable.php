<?php
function Table($users, $pdo)
{
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
}
?>
