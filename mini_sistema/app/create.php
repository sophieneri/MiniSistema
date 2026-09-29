<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
     
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_sistema/style/style.css">
    <title>Cadastro Aluno</title>
</head>

<body>

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <form action="" method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <br>

        <label for="turma">Turma:</label>
        <input type="text" name="turma" id="turma">
        <br>

        <label for="nasc">Nascimento:</label>
        <input type="date" name="nasc" id="nasc">
        <br>

        <label>Ativo:</label>

        <input type="radio" name="ativo" id="sim" value="true">
        <label for="sim">Sim</label>

        <input type="radio" name="ativo" id="nao" value="false">
        <label for="nao">Não</label>

        <br>

        <input type="submit" value="Cadastrar">
        <input type="reset" value="Limpar">

    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        var_dump($_POST);

        cadastrar(
            $conexao,
            $_POST['nome'],
            $_POST['turma'],
            $_POST['nasc'],
            $_POST['ativo']
        );
    }

    include __DIR__ . '/../includes/footer.php';

    ?>

</body>
</html>