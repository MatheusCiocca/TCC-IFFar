<?php
session_start();
require_once "../conecta.php";

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$senhaMD5 = md5($senha);

$sql = "INSERT INTO professor (nome_prof, email, senha) 
        VALUES ('$nome', '$email', '$senhaMD5')";
$resultSet = mysqli_query($conexao, $sql);

if ($resultSet) {
    // pegar o id gerado
    $id_prof = mysqli_insert_id($conexao);
    // colocar na sessão
    $_SESSION['id_prof'] = $id_prof;
    $_SESSION['nome_prof'] = $nome;
    // redirecionar para a página principal
    $_SESSION['mensagem'] = "Novo usuário cadastrado com sucesso!";
    header("Location: ../index.php");
} else {
    $_SESSION['mensagem'] = 'Erro ao salvar o usuário no banco de dados! ' .
        mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    header("Location: form_usuario.php");
}
