<?php

session_start();

include "../conecta.php";

include "../sessao/funcoes.php";


$id_aluno = $_GET ['id_aluno'];

$sql = "DELETE FROM aluno WHERE id_aluno = $id_aluno";
$resultado = mysqli_query ($conexao, $sql);
mysqli_close ($conexao);


if ($resultado) {
    $_SESSION['mensagem'] = "Aluno excluído com sucesso!";
    header ("Location: alunos.php");
} else {
    $_SESSION['mensagem'] = "Você não pode excluir este(a) aluno(a) do sistema, pois há reservas ou empréstimos cadastrados(as) no nome do(a) mesmo(a).";
    header ("Location: alunos.php"); 
}

?>