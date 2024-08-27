<?php

session_start();

include_once "../conecta.php";

include_once  "../sessao/funcoes.php";

$id_reserva = $_POST['id_reserva'];

$n_matricula = mysqli_real_escape_string($conexao, $_POST['n_matricula']);
$titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
$data_emp = mysqli_real_escape_string($conexao, $_POST['data_emp']);
$data_dev = mysqli_real_escape_string($conexao, $_POST['data_dev']);

$sql = "SELECT * FROM livro WHERE titulo='$titulo'";
$resultado = mysqli_query($conexao, $sql);
$livro = mysqli_fetch_assoc($resultado);
$id_livro = $livro['id_livro'];

$sql2 = "SELECT * FROM aluno WHERE n_matricula=$n_matricula";
$resultado2 = mysqli_query($conexao, $sql2);
$aluno = mysqli_fetch_assoc($resultado2);
$id_aluno = $aluno['id_aluno'];

$sql3 = "UPDATE reserva SET id_aluno = '$id_aluno', id_livro='$id_livro', data_emp = '$data_emp', data_dev = '$data_dev' WHERE id_reserva = $id_reserva";
$resultado3 = mysqli_query ($conexao, $sql3);

mysqli_close ($conexao);

if ($resultado) {
    $_SESSION['mensagem'] = "Alterações salvas com sucesso!";
    header ("Location: reservas.php");
}
?>