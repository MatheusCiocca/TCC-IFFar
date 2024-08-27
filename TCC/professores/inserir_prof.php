<?php

session_start();

include_once "../conecta.php";

include_once "../sessao/funcoes.php";

$nome = mysqli_real_escape_string($conexao, $_GET['nome']);
$email = mysqli_real_escape_string($conexao, $_GET['email']);
$senha = mysqli_real_escape_string($conexao, $_GET['senha']);

$senhaMD5 = md5($senha);

$sql = "INSERT INTO professor (nome_prof, email, senha) 
VALUES ('$nome','$email', '$senhaMD5')";

$resultado = mysqli_query($conexao,$sql);
mysqli_close($conexao);

if ($resultado) {
	$_SESSION['mensagem'] = "Professor cadastrado com sucesso!";
	header("Location:professores.php");
}
?>
</body>
</html>