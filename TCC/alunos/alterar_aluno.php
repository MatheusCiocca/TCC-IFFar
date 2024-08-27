<?php

session_start();

include_once "../conecta.php";

include_once  "../sessao/funcoes.php";

$id_aluno = $_POST['id_aluno'];

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$rg = mysqli_real_escape_string($conexao, $_POST['rg']);
$n_matricula = mysqli_real_escape_string($conexao, $_POST['n_matricula']);
$data_nasc = mysqli_real_escape_string($conexao, $_POST['data_nasc']);

$sql = "UPDATE aluno SET nome = '$nome', rg = '$rg', n_matricula = '$n_matricula', data_nasc = '$data_nasc' WHERE id_aluno = $id_aluno";
$resultado = mysqli_query ($conexao, $sql);

mysqli_close ($conexao);

if ($resultado) {
    $_SESSION['mensagem'] = "Alterações salvas com sucesso!";
    header ("Location: alunos.php");
}

?>