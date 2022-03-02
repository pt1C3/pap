<?php

    // elimina as variáveis de sessão
    unset($_SESSION['loggedin']);
    unset($_SESSION['id']);

    // destroi a sessão com segurança
    session_start();
    session_destroy();

    // redireciona para o index.php
    header("Location: ../");
?>