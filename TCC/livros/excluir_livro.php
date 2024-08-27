<?php

session_start();

include "../conecta.php";

include "../sessao/funcoes.php";


$id_livro = $_GET ['id_livro'];

$sql = "DELETE FROM livro WHERE id_livro = $id_livro";
$resultado = mysqli_query ($conexao, $sql);
mysqli_close ($conexao);


if ($resultado) {
    $_SESSION['mensagem'] = "Livro excluído com sucesso!";
    header ("Location: livros.php");
} else{
    $_SESSION['mensagem'] = "Você não pode excluir este livro do sistema, pois há reservas ou empréstimos cadastrados(as) no nome do mesmo.";
    header ("Location: livros.php"); 
    die();
}

?>