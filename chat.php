<?php
session_start();
include './auth/db.php';
$user =  $pdo->query('SELECT * FROM user WHERE userID=' . $_GET["id"])->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chat with <?= $user["username"] ?> - LetsGame</title>
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="chat.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include './components/navbar.php' ?>
    <div class="data">

        <div class="chatContainer">
            <h1 style="font-family:Aldo"><?= $user["username"] ?> - <span id="status"></span></h1>
            <div id="messageHistory">
                <!--Aqui vao as messages-->
            </div>
            <div class="messageArea" style="height:10vh;width:100%">
                <textarea class="form-control" id="chat_message" placeholder="Write your message here."></textarea>
                <!--Isto é para escrever-->
                <button type="button" id="send_chat" name="<?= $user["userID"] ?>">Send</button>
                <!--Isto é para enviar-->
            </div>



        </div>
    </div>
    <?php include './components/footer.php' ?>


    <script>
        $(document).ready(function() {
            var to_user_id = $('#send_chat').attr('name');
            var messageHistory = $('messageHistory');
            setInterval(function() {
                $.ajax({ //Atualizar o chat de 5 .em 5 segundos
                    url: "./auth/updateChatBox.php",
                    method: "POST",
                    data: {
                        to_userID: to_user_id
                    },
                    success: function(data) {
                        $('#messageHistory').html(data);
                    }
                })

                $.ajax({ //Atualizar a ultima atividade
                    url: "./auth/update_user_lastActivity.php",
                    success: function() {}
                })

                $.ajax({ //Verifica e escreve se o user ta online ou offline
                    url: "./auth/fetch_userStatus.php",
                    method: "POST",
                    data:{
                        userID : to_user_id
                    },
                    success: function(data) {
                        $('#status').html(data);
                    }
                })

            }, 5000);
        //final do setInterval, a partir daqui tudo irá acontecer quando e apenas quando a pagina carregar
        $.ajax({ //Verifica e escreve se o user ta online ou offline
                    url: "./auth/fetch_userStatus.php",
                    method: "POST",
                    data:{
                        userID : to_user_id
                    },
                    success: function(data) {
                        $('#status').html(data);
                    }
                });
            $.ajax({ //Atualizar o chat ao entrar
                url: "./auth/updateChatBox.php",
                method: "POST",
                data: {
                    to_userID: to_user_id
                },
                success: function(data) {
                    $('#messageHistory').html(data); //receber os dados e escrever no historico
                    scrolldiv(); //ir para baixo na div
                }
            });
            
        });


        $(document).on('click', '#send_chat', function() { //quando clicar no enviar
            var to_user_id = $(this).attr('name');
            var chat_message = $('#chat_message').val();
            $.ajax({
                url: "./auth/sendMessage.php",
                method: "POST",
                data: {
                    to_userID: to_user_id,
                    message: chat_message
                },
                success: function(data) {
                    $('#chat_message').val(''); //resetar a mensagem
                    $('#messageHistory').html(data); //receber os dados e escrever no historico
                    scrolldiv(); //ir para baixo na div
                }
            })
        });

        function scrolldiv() { //ir para baixo na div
            var objDiv = document.getElementById("messageHistory");
            objDiv.scrollTop = objDiv.scrollHeight;
        }
    </script>
</body>

</html>