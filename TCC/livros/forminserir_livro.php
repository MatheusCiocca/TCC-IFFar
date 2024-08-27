<?php

session_start();

if (!isset($_SESSION['id_prof'])) {
    $_SESSION['mensagem'] = "Você deve primeiro realizar o login.";
    header("Location:../sessao/form_login.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link rel="stylesheet" type="text/css" href="../estilo.css"/>

    <meta charset="UTF-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Cadastro de Livros </title>

  </head>

  
<body>
  
    <div class="navbar-fixed">
        <nav class="blue darken-1">
            <div class="nav-wrapper">
            <a href="../materialize/menu_inicial.php" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
            <a href="#" class="brand-logo center">Adicionar Livro</a>
            </div>
          </nav>
  </div> 

  <br> <br> <br> <br>

<fieldset>
        <form action="inserir_livro.php" method="get">

    <label for="titulo">
    <p> Título: <br> <input id="titulo" type="text" name="titulo" required></p> </label> <br>
    
    <label for="subtitulo">
    <p>Subtítulo: <br> <input id="subtitulo" type="text" name="subtitulo"></p> </label> <br>

    <label for="nome_autor">
	<p> Autor: <br> <input id="nome_autor" type="text" name="nome_autor" required></p> </label> <br>

    <label for="isbn">
	<p> ISBN: <br> <input id="isbn" type="text" name="isbn" required></p> </label> <br>
    
    <label for="assuntos">
	<p> Assuntos: <br> <input id="assuntos" type="text" name="assuntos" required></p> </label> <br>
    
    <label for="n_edicao">
	<p> Nº da Edição: <br> <input id="n_edicao" type="text" name="n_edicao" required></p> </label> <br>
    
    <label for="editora">
	<p> Editora: <br> <input id="editora" type="text" name="editora" required></p> </label> <br>
    
    <label for="local_publicacao">
	<p> Local de Publicação: <br> <input id="local_publicacao" type="text" name="local_publicacao" required></p> </label> <br>
    
    <label for="n_paginas">
	<p> Nº de Páginas: <br> <input id="n_paginas" type="number" name="n_paginas" required></p> </label> <br>
    
    <label for="cdd">
	<p> CDD: <br> <input id="cdd" type="text" name="cdd"></p> </label> <br>
    
    <label for="n_exemplares">
	<p> Nº de Exemplares: <br> <input id="n_exemplares" type="number" name="n_exemplares"></p> </label> <br>

    <br> <button class="waves-effect waves-light btn-large blue accent-4" type="submit"> CADASTRAR </button> <br>

	<br> <a id="bot" href="livros.php"> Listar Livros </a>
</form>			

</fieldset>

</body>
</html>