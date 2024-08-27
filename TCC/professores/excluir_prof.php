<?php

session_start();

include_once "../conecta.php";

include_once  "../sessao/funcoes.php";

$id_prof = $_GET['id_prof'];

$sql = "DELETE FROM professor WHERE id_prof = $id_prof";
$resultado = mysqli_query ($conexao, $sql);

mysqli_close ($conexao);

if ($resultado) {
    $_SESSION['mensagem'] = "Professor excluído com sucesso!";
    header ("Location: professores.php");
}

?>