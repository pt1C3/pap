<?php 
    if(isset($_SESSION["loggedin"]))
    {
        echo '<script>
        $(document).ready(function() {
            setInterval(function() {
                $.ajax({ //Atualizar a ultima atividade
                      url: "./auth/update_user_lastActivity.php",
                      success: function() {}
                })
            }, 5000);
        });
     </script>';
    }
?>