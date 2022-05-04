<?php 
function fetch_user_chat($to_userID, $pdo)
{

    $user =  $pdo->query('SELECT * FROM user WHERE userID=' . $_POST['to_userID'])->fetch();
    //atualizar o chat
    //obter as mensagens enviadas e recebidas
    $query = $pdo->query(" SELECT * FROM chatmessage WHERE (from_userID = '" . $_SESSION['id'] . "' AND to_userID = '" .   $to_userID . "') OR (from_userID = '" .  $to_userID . "' AND to_userID = '" . $_SESSION['id'] . "') ORDER BY time ASC")->fetchAll();
    //lista das mensagens
    $output = '<ul class="messageList">';
    foreach ($query as $row) {
        $contagem = $pdo->query("SELECT COUNT(*) FROM notifications WHERE viewed = 0 AND type= 'chat' AND userID=" . $_SESSION["id"]." AND otherUserID = " . $to_userID . " LIMIT 1")->fetch(PDO::FETCH_COLUMN);
        if($contagem!="0"){
        $notificacao = $pdo->query("SELECT * FROM notifications WHERE viewed = 0 AND type= 'chat' AND userID=" . $_SESSION["id"]." AND otherUserID = " . $to_userID . " LIMIT 1")->fetch();

        if($row["to_userID"]==$_SESSION["id"] and isset($notificacao["id"])) $pdo->query("UPDATE notifications SET viewed=1 WHERE id=". $notificacao['id']);//atualizar o viewed
        }
        $user_name = '';
        if ($row["from_userID"] ==  $_SESSION['id']) {
            $user_name = '<p style="color:grey"><img src="'. $_SESSION["userAvatar"] .'" style="height:30pt;margin-right:5pt;"><b>You</b></p>';
        } else {
            $user_name = '<a href="./profile.php?id='.$user["userID"] .'" class="userMessage"><img src="'. $user["image"] .'" style="height:30pt;margin-right:5pt;"><b>' . $user["username"] . '</b></a><br>';
        }
        $output .= '
                    <li class="message">
                    <p style="max-width:100%;">' . $user_name . ' - ' . wordwrap($row["message"], 100, "\n", true) . '
                        <div style="text-align:right;">
                        - <small><em>' . $row['time'] . '</em></small>
                        </div>
                    </p>
                    </li>
                    ';
    }
    $output .= '</ul>';
    echo $output;
}
?>