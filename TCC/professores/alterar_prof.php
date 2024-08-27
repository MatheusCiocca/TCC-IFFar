<?php

session_start();

include_once "../conecta.php";

include_once  "../sessao/funcoes.php";

$id_prof = $_POST['id_prof'];

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);


$sql = "UPDATE professor SET nome_prof = '$nome', email = '$email' WHERE id_prof = $id_prof";
$resultado = mysqli_query ($conexao, $sql);

mysqli_close ($conexao);

if ($resultado) {
    $_SESSION['mensagem'] = "Alterações salvas com sucesso!";
    header ("Location: professores.php");
}

?>