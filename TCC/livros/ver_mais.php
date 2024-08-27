<?php

session_start();

if (!isset($_SESSION['id_prof'])) {
    $_SESSION['mensagem'] = "Você deve primeiro realizar o login.";
    header("Location:../sessao/form_login.php");
}

include "../conecta.php";

$id_livro = $_GET ['id_livro'];
$sql = "SELECT * FROM livro WHERE id_livro = $id_livro";
$resultado = mysqli_query ($conexao, $sql);
$livro = mysqli_fetch_array ($resultado);
mysqli_close ($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="CSS.css"/>

    <link rel="stylesheet" type="text/css" href="../estilo.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Ver mais informações sobre o livro </title>


  </head>

  
<body>
  
<div class="navbar-fixed">
        <nav class="blue darken-1">
            <div class="nav-wrapper">
                <a class="brand-logo center">Ver mais informações do livro: <?= $livro['titulo'];?></a>
                <a href="../materialize/menu_inicial.php" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
            </div>
          </nav>
  </div> 

  <br> <br> <br> <br>

<fieldset>


<form action="#" method="post">
    <input type="hidden" name="id_livro" value="<?php echo $livro ['id_livro']; ?>">
    
    <label for="titulo">
    <p> Título: <br> <input style="color: black;" disabled id="titulo" type="text" name="titulo" value="<?php echo $livro['titulo']; ?>"> </p> </label> <br>
    
    <label for="subtitulo">
    <p> Subtítulo: <br> <input style="color: black;" disabled id="subtitulo" type="text" name="subtitulo" value="<?php echo $livro['subtitulo']; ?>"> </p> </label> <br>

    <label for="nome_autor">
	<p> Autor: <br> <input style="color: black;" disabled id="nome_autor" type="text" name="nome_autor" value="<?php echo $livro['nome_autor']; ?>"></p> </label> <br>

    <label for="isbn">
	<p> ISBN: <br> <input style="color: black;" disabled id="isbn" type="text" name="isbn" value="<?php echo $livro['isbn']; ?>"></p> </label> <br>
    
    <label for="assuntos">
	<p> Assuntos: <br> <input style="color: black;" disabled id="assuntos" type="text" name="assuntos" value="<?php echo $livro['assuntos']; ?>"></p> </label> <br>
    
    <label for="n_edicao">
	<p> Nº da Edição: <br> <input style="color: black;" disabled id="n_edicao" type="text" name="n_edicao" value="<?php echo $livro['n_edicao']; ?>"></p> </label> <br>
    
    <label for="editora">
	<p> Editora: <br> <input style="color: black;" disabled id="editora" type="text" name="editora" value="<?php echo $livro['editora']; ?>"></p> </label> <br>
    
    <label for="local_publicacao">
	<p> Local de Publicação: <br> <input style="color: black;" disabled id="local_publicacao" type="text" name="local_publicacao" value="<?php echo $livro['local_publicacao']; ?>"></p> </label> <br>
    
    <label for="n_paginas">
	<p> Nº de Páginas: <br> <input style="color: black;" disabled id="n_paginas" type="text" name="n_paginas" value="<?php echo $livro['n_paginas']; ?>"></p> </label> <br>
    
    <label for="cdd">
	<p> CDD: <br> <input style="color: black;" disabled id="cdd" type="text" name="cdd" value="<?php echo $livro['cdd']; ?>"></p> </label> <br>
    
    <label for="n_exemplares">
	<p> Nº de Exemplares: <br> <input style="color: black;" disabled id="n_exemplares" type="text" name="n_exemplares" value="<?php echo $livro['n_exemplares']; ?>"></p> </label> <br>
    
    
</form>

<br> <a href="livros.php"> Listar Livros </a> <br> <br>


</fieldset>