<?php

session_start();

include_once "../conecta.php";

include_once "../sessao/funcoes.php";

$id_emprestimo = $_GET ['id_emprestimo'];

$sql = "DELETE FROM emprestimo WHERE id_emprestimo = $id_emprestimo";
$resultado = mysqli_query ($conexao, $sql);

mysqli_close ($conexao);

if ($resultado) {
    $_SESSION['mensagem'] = "Empréstimo excluído com sucesso!";
    header ("Location: emprestimo.php");
}

?>