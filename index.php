<?php

    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $user = 'root';
    $password = '';

    try{
        $conexao = new PDO($dsn, $user, $password);

        $query = "CREATE TABLE IF NOT EXISTS tb_usuarios(
                    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
                    nome VARCHAR(50) NOT NULL,
                    email VARCHAR(50) NOT NULL,
                    senha VARCHAR(32) NOT NULL
        );";

        $conexao->exec($query);

    }catch(PDOException $e){
        echo "Error [{$e->getCode()}] -> {$e->getMessage()}";
    }
