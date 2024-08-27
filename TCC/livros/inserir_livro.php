<?php

session_start();

include_once "../conecta.php";

include_once  "../sessao/funcoes.php";

$titulo = mysqli_real_escape_string($conexao, $_GET['titulo']);
$subtitulo = mysqli_real_escape_string($conexao, $_GET['subtitulo']);
$nome_autor = mysqli_real_escape_string($conexao, $_GET['nome_autor']);
$isbn = mysqli_real_escape_string($conexao, $_GET['isbn']);
$assuntos = mysqli_real_escape_string($conexao, $_GET['assuntos']);
$n_edicao = mysqli_real_escape_string($conexao, $_GET['n_edicao']);
$editora = mysqli_real_escape_string($conexao, $_GET['editora']);
$local_publicacao = mysqli_real_escape_string($conexao, $_GET['local_publicacao']);
$n_paginas = mysqli_real_escape_string($conexao, $_GET['n_paginas']);
$cdd = mysqli_real_escape_string($conexao, $_GET['cdd']);
$n_exemplares = mysqli_real_escape_string($conexao, $_GET['n_exemplares']);

$sql = "INSERT INTO livro (titulo, subtitulo, nome_autor, isbn, assuntos, n_edicao, editora, local_publicacao, n_paginas, cdd, n_exemplares) 
VALUES ('$titulo','$subtitulo','$nome_autor','$isbn', '$assuntos','$n_edicao','$editora', '$local_publicacao','$n_paginas','$cdd', '$n_exemplares')";

$resultado = mysqli_query($conexao,$sql);
mysqli_close($conexao);

if ($resultado) {
	$_SESSION['mensagem'] = "Livro cadastrado com sucesso!";
	header("Location:livros.php");
}
?>
</body>
</html>