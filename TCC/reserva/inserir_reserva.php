<?php

session_start();

include_once "../conecta.php";

include_once  "../sessao/funcoes.php";

$id_aluno = mysqli_real_escape_string($conexao, $_GET['aluno']);
$id_livro = mysqli_real_escape_string($conexao, $_GET['livro']);
$data_emp = mysqli_real_escape_string($conexao, $_GET['data_emp']);
$data_dev = mysqli_real_escape_string($conexao, $_GET['data_dev']);

$sql = "SELECT * FROM aluno WHERE id_aluno=$id_aluno";
$resultado = mysqli_query($conexao, $sql);

$reserva = mysqli_fetch_assoc($resultado);

if(!is_null($reserva)) {
	$sql1 = "SELECT * FROM livro WHERE id_livro='$id_livro'";
	$resultado1 = mysqli_query($conexao, $sql1);

	$reserva1 = mysqli_fetch_assoc($resultado1);

	$id_aluno = $reserva['id_aluno'];
	$id_livro = $reserva1['id_livro'];
	

	$sql2 = "INSERT INTO reserva (id_aluno, id_livro, data_emp, data_dev) 
	VALUES ('$id_aluno','$id_livro','$data_emp','$data_dev')";
	
	$resultado = mysqli_query($conexao, $sql2);
	mysqli_close($conexao);
	
	$_SESSION['mensagem'] = "Reserva cadastrada com sucesso!";
	header("Location:reservas.php");
}

?>
</body>
</html>