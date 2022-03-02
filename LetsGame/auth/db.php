<?php
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'letsgame';
    try {
    	$pdo= new PDO(
			'mysql:host=' . $DATABASE_HOST . 
			';dbname=' . $DATABASE_NAME . 
			';charset=utf8', 
			$DATABASE_USER, $DATABASE_PASS);

    } catch (PDOException $exception) {
    	exit('Falhou a conexão à base de dados!');
    }

    /* Query várias linhas
        $dados = $pdo->query("SELECT username FROM user");
        foreach($dados as $dado) {
        echo '<p>' . $dado['username'] . '</p>';
        }
    */

    /* Query 1 linha
        $dado = $pdo->query("SELECT username FROM user ORDER BY id DESC LIMIT 1")->fetch();
        echo '<p>' . $dado['username'] . '</p>';
    */
?>
