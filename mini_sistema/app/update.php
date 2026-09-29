
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
		<label for=id>ID: </label>
		<input type="number" name="id" id="id">
		<br>
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

        <input type="submit" value="Atualizar">
        <input type="reset" value="Limpar">

    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        var_dump($_POST);

        atualizar(
            $conexao,
			$_POST['id'],
            $_POST['nome'],
            $_POST['turma'],
            $_POST['nasc'],
            $_POST['ativo'],
        );
    }

    include __DIR__ . '/../includes/footer.php';

    ?>

</body>
</html>