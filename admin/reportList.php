<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report List</title>
  <link rel="icon" href="../images/iconfavicon.ico">
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="./reportList.css">
</head>

<body>

  <?php
  session_set_cookie_params(0);
  session_start();
  include './navbar.php';
  include '../auth/db.php';
  ?>
  <div class="data">

    <?php

    $reports = $pdo->query('SELECT * FROM report order by tempo desc')->fetchAll();
    foreach ($reports as $report) {
      echo '
      <div style="border:solid 4px blue;border-radius:5px;width:500px;margin-left:10%;margin-bottom:10px;background-color:#2d35a13f;">

        <div style="padding:10px;">

          <p>Reporter:
          <a style="padding-right:20px" href="../profile.php?id=' . $report["senderID"] . '" class="itemLista">' . $report['senderID'] . '</a>

          Reported:
          <a href="../profile.php?id=' . $report["receiverID"] . '" class="itemLista">' . $report['receiverID'] . '</a>
          </p>

          <p ></br>Report:</br><p style="margin-left:30px;padding-bottom:20px">' . $report['type'] . '</p></p>

          <a href="" class="buttones">BAN USER:' . $report["receiverID"] . '</a>
          <a href="" class="buttones">WARN USER:' . $report["receiverID"] . '</a>
        </div>
             
      </div>';
    }

    ?>

  </div>





</body>

</html>