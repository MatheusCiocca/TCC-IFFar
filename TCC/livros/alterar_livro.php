<?php

session_start();

include_once "../conecta.php";

include_once  "../sessao/funcoes.php";

$id_livro = $_POST['id_livro'];

$titulo = mysqli_real_escape_string($conexao, $_POST ['titulo']);
$subtitulo = mysqli_real_escape_string($conexao, $_POST ['subtitulo']);
$nome_autor = mysqli_real_escape_string($conexao, $_POST ['nome_autor']);
$isbn = mysqli_real_escape_string($conexao, $_POST ['isbn']);
$assuntos = mysqli_real_escape_string($conexao, $_POST ['assuntos']);
$n_edicao = mysqli_real_escape_string($conexao, $_POST ['n_edicao']);
$editora = mysqli_real_escape_string($conexao, $_POST ['editora']);
$local_publicacao = mysqli_real_escape_string($conexao, $_POST ['local_publicacao']);
$n_paginas = mysqli_real_escape_string($conexao, $_POST ['n_paginas']);
$cdd = mysqli_real_escape_string($conexao, $_POST ['cdd']);
$n_exemplares = mysqli_real_escape_string($conexao, $_POST ['n_exemplares']);

$sql = "UPDATE livro SET titulo = '$titulo', subtitulo = '$subtitulo', nome_autor = '$nome_autor', isbn = '$isbn', assuntos = '$assuntos',
n_edicao = '$n_edicao', editora = '$editora', local_publicacao = '$local_publicacao', n_paginas = '$n_paginas', cdd = '$cdd',
n_exemplares = '$n_exemplares' WHERE id_livro = $id_livro";
$resultado = mysqli_query ($conexao, $sql);

mysqli_close ($conexao);

if ($resultado) {
    $_SESSION['mensagem'] = "Alterações salvas com sucesso!";
    header ("Location: livros.php");
}

?>