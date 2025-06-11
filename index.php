<?php
    if(!empty($_POST['usuario']) && !empty($_POST['senha']))

    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $user = 'root';
    $password = '';

    try{
        $conexao = new PDO($dsn, $user, $password);

        $query = "SELECT * FROM tb_usuarios where email = :usuario AND senha = :senha";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':usuario', $_POST['usuario']);
        $stmt->bindValue(':senha', $_POST['senha']);

        $stmt->execute();

        $usuario = $stmt->fetch();

        echo '<pre>';
        print_r($usuario);
        echo '</pre>';
    }catch(PDOException $e){
        echo "Error [{$e->getCode()}] -> {$e->getMessage()}";
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>

    <body>
        <form method="post" action="index.php">
            <input type="text" name="usuario">
            <br>
            <input type="password" name="senha">
            <br>
            <button type="submit">Entrar</button>
        </form>

        <?php if(!empty($usuario)){ ?>

        <h1>Olá <?php echo $usuario['nome']?></h1>

        <?php }?>
    </body>
</html>

