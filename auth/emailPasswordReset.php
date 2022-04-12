<?php 
require '../phpmailer/PHPMailerAutoload.php';
require './db.php';
session_start();
$email = $_SESSION["email"];
unset($_SESSION["email"]);
session_destroy();
if (isset($email)==false)
{
  echo "<p>Email error</p>";
  sleep(5);
  header("location: ../index.php");
}
else{
  $user = $pdo->query("SELECT * FROM user WHERE email='".$email."'")->fetch();
$mail = new PHPMailer;
$mail->isSendmail();
$mail->isSMTP();//desativar se tiver no live server, ativar no localhost
$mail->Host = 'smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='letsgamept@gmail.com';
$mail->Password='letsgame2022';
$mail->setFrom('letsgamept@gmail.com', 'noreply');
$mail->addAddress($user["email"]);
$mail->isHTML(true);
$mail->Subject="Assunto Teste";
$mail->AddEmbeddedImage('../images/logo.png','logoImage','logo.png');
$mail->AddEmbeddedImage('../images/gradient side.png','gradientImage','gradient side.png');
$mail->Body=
"
<link href=\"http://fonts.cdnfonts.com/css/aldo-the-apache\" rel=\"stylesheet\">
<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
<link href=\"https://fonts.googleapis.com/css2?family=Readex+Pro&display=swap\" rel=\"stylesheet\">

<table style=\"
background-color:#2d34a1;
width:100%;
\">
<thead>
  <tr>
    <th class=\"navbar\" style=\"height:50pt;gap:0;background-color: #0d0e20;margin:0;padding:0;\">
    <a href=\"http://letsgamept.infinityfreeapp.com/pap/\" style=\"height:inherit;\"><img src=\"cid:logoImage\" style=\"height:inherit;padding:5pt;\"></a>
    <img src=\"cid:gradientImage\" style=\"margin:0;padding:0;width:100%;height:3pt;\">
    </th>
  </tr>
</thead>
<tbody style=\"color:white;\">
  <tr>
    <td>
    <h1 style=\"font-family: 'Aldo the Apache', sans-serif;letter-spacing:1pt;font-size:30pt;margin:0;text-align:center;\">". $user["username"] ." - Password Reset</h1>
    </td>
  </tr>
  <tr>
    <td style=\"font-family: 'Readex Pro', sans-serif;\">
    <p style=\"text-align:center;\">If you want to reset your password click here:<br>   <i>(link)</i></p>
    </td>
  </tr>
  <tr style=\"background-color:white;\">
  <td>
  <p style=\"color:black; width:100%;  text-align:center;\">
  Automatic email sent by <b>LetsGame</b>. <b>Please do not reply.</b>
  </p>
  </td>
</tr>
</tbody>
</table>


";
}
if(!$mail->Send()){
  echo "<p>Error sending email</p><br><a href=\"../resetPassword.php\">Password Reset page</a>";
}
else{
  echo "<p>Email sent, check your inbox (and the spam folder)</p><br><a href=\"../index.php\">Index page</a>";
} 
?>