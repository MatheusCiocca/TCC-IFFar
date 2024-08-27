<?php

session_start();

include_once "../conecta.php";

include_once "../sessao/funcoes.php";

$id_emprestimo = $_POST ['id_emprestimo'];

$data_emp = mysqli_real_escape_string($conexao, $_POST ['data_emp']);
$data_dev = mysqli_real_escape_string($conexao, $_POST ['data_dev']);
$devolvido = $_POST['dev'];

$sql3 = "UPDATE emprestimo SET data_emp = '$data_emp', data_dev = '$data_dev', devolvido = '$devolvido' WHERE id_emprestimo = $id_emprestimo";

$resultado3 = mysqli_query ($conexao, $sql3);

mysqli_close ($conexao);

if ($resultado3) {
    $_SESSION['mensagem'] = "Alterações salvas com sucesso!";
    header ("Location: emprestimo.php?busca=" . $_POST['busca'] . "&pag=" . $_POST['pag']);
}
?>