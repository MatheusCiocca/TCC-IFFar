<?php

session_start();

include_once "../conecta.php";

include_once "../sessao/funcoes.php";

$id_aluno = mysqli_real_escape_string($conexao, $_GET['aluno']);
$id_livro = mysqli_real_escape_string($conexao, $_GET['livro']);
$data_emp = mysqli_real_escape_string($conexao, $_GET['data_emp']);
$data_dev = mysqli_real_escape_string($conexao, $_GET['data_dev']);

$sql = "SELECT * FROM aluno WHERE id_aluno=$id_aluno";
$resultado = mysqli_query($conexao, $sql);

$emprestimo = mysqli_fetch_assoc($resultado);

if(!is_null($emprestimo)) {
	$sql1 = "SELECT * FROM livro WHERE id_livro='$id_livro'";
	$resultado1 = mysqli_query($conexao, $sql1);

	$emprestimo1 = mysqli_fetch_assoc($resultado1);

	$id_aluno = $emprestimo['id_aluno'];
	$id_livro = $emprestimo1['id_livro'];
	

	$sql2 = "INSERT INTO emprestimo (id_aluno, id_livro, data_emp, data_dev, devolvido) 
	VALUES ('$id_aluno','$id_livro','$data_emp','$data_dev', 0)";
	
	$resultado = mysqli_query($conexao, $sql2);
	mysqli_close($conexao);
	$_SESSION['mensagem'] = "Empréstimo cadastrado com sucesso!";
	header("Location:emprestimo.php");
}

?>
</body>
</html>