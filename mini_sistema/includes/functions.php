<?php
require_once __DIR__ . '/../Database/connect.php';

function cadastrar($conexao, $nome, $turma, $nasc, $ativo)
{
    $sql = "INSERT INTO alunos (nome, turma, nasc, ativo) VALUES (:nome,  :turma, :nasc, :ativo)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":turma", $turma);
$stmt->bindParam(":nasc", $nasc);
$stmt->bindParam(":ativo", $ativo);

$stmt->execute();
echo "Aluno cadastrado com sucesso!";
}

require_once "../Database/connect.php";

$sql = "SELECT * FROM alunos";

$stmt = $conexao->prepare($sql);
$stmt->execute();

$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

function relatorio($conexao){  
            $sql = "SELECT * FROM alunos";

             $stmt = $conexao->prepare($sql);
            $stmt->execute();

            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($alunos as $aluno) {
                echo "<hr>";
                echo "ID: {$aluno['id']}<br>";
                echo "Nome: {$aluno['nome']}<br>";
                echo "Nascimento: {$aluno['nasc']}<br>";
                echo "Turma: {$aluno['turma']}<br>";
                echo "Ativo: {$aluno['ativo']}<br>";
            }
}
function excluir($conexao, $id){
    $sql = "DELETE FROM alunos WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    echo "Registro deletado.";
}

function consultar($conexao, $id)
{
    $sql = "SELECT nome, nasc, turma, ativo FROM alunos WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Aluno: {$aluno['nome']} <br> Turma: {$aluno['turma']}<br>
    Nascimento: {$aluno['nasc']}<br> Ativo: {$aluno['ativo']}<br>";
}

function atualizar($conexao, $id, $nome, $turma, $nasc, $ativo)
{
    $sql = "UPDATE alunos SET nome = :nome , turma = :turma, nasc = :nasc, ativo = :ativo WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":turma", $turma);
    $stmt->bindValue(":nasc", $nasc);
    $stmt->bindValue(":ativo", $ativo);
    $stmt->execute();
}

// Funçoes para login:
function cadastrar_user($conexao, $email, $senha)
{
    $sql = "INSERT INTO usuarios (email, senha) VALUES (:email,  :senha)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);

    $stmt->execute();
    echo "Usuario cadastrado com sucesso!";
}

function consultar_user($conexao, $email)
{
    $sql = "SELECT id, email, senha FROM usuarios WHERE email = :email";
    try{
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario;
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}
?>
