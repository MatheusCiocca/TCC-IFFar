<?php

session_start();

include_once "../conecta.php";

include_once "../sessao/funcoes.php";

$nome = mysqli_real_escape_string($conexao, $_GET['nome']);
$rg = mysqli_real_escape_string($conexao, $_GET['rg']);
$n_matricula = mysqli_real_escape_string($conexao, $_GET['n_matricula']);
$data_nasc = mysqli_real_escape_string($conexao, $_GET['data_nasc']);

$sql = "INSERT INTO aluno (nome, rg, n_matricula, data_nasc) 
VALUES ('$nome','$rg','$n_matricula','$data_nasc')";

$resultado = mysqli_query($conexao,$sql);
mysqli_close($conexao);

if ($resultado) {
	$_SESSION['mensagem'] = "Aluno cadastrado com sucesso!";
	header("Location:alunos.php");
}
?>
</body>
</html>