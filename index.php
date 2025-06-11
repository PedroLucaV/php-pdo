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

        $query = 'INSERT INTO tb_usuarios(nome, email, senha) VALUES ("Pedro Lucas", "pedro@teste.com", "123456")';

        //$conexao->exec($query);

        $query = 'SELECT * FROM tb_usuarios';

        $stmt = $conexao->query($query);
        $lista = $stmt->fetchAll(PDO::FETCH_OBJ);

        // echo "<pre>";
        // print_r($lista);
        // echo "</pre>";

        //foreach ($lista as $user) {
        //    print_r($user);
        //    echo ' - ';
        //    echo $user->nome;
        //    echo "<br>";
        //}

    }catch(PDOException $e){
        echo "Error [{$e->getCode()}] -> {$e->getMessage()}";
    }
