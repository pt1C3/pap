<div class="nav-bar-container">
    <a href="homePage.php"><button class="logobtn"></button></a>
    <div id='right'>
    </div>
</div>
<script>
     $(document).ready(function() {
            setInterval(function() { //vai atualizando a cada 3sec
                $.ajax({
                    url: "./auth/navbarContent.php",
                    method: "GET",
                    success: function(data) {
                        $('#right').html(data);
                    }
                }) 
            }, 3000);
            $.ajax({ //atualiza no load
                    url: "./auth/navbarContent.php",
                    method: "GET",
                    success: function(data) {
                        $('#right').html(data);
                    }
                }) 
        });


</script>