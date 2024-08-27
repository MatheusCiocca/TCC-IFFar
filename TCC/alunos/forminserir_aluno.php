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
    <link rel="stylesheet" type="text/css" href="CSS.css"/>

    <link rel="stylesheet" href="../estilo.css"/>

    <meta charset="UTF-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Cadastro de Alunos </title>


</head>

  
<body>
  
    <div class="navbar-fixed">
        <nav class="blue darken-1">
            <div class="nav-wrapper">
            <a href="../materialize/menu_inicial.php" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
            <a href="#" class="brand-logo center">Cadastro de Alunos</a>
            </div>
          </nav>
  </div> 

  <br> <br> <br> <br>

<fieldset>
        <form action="inserir_aluno.php" method="get">

    <label for="nome">
    <p> Nome: <br> <input id="nome" type="text" name="nome" required></p> </label> <br>

    <label for="rg">
	<p> RG: <br> <input id="rg" type="number" name="rg" required></p> </label> <br>
    
    <label for="n_matricula">
	<p> Nº de Matrícula: <br> <input id="n_matricula" type="number" name="n_matricula" required></p> </label> <br>

    <label for="data_nasc">
	<p> Data de Nascimento: <br> <input id="data_nasc" type="date" name="data_nasc" required></p> </label> <br>

    <br> <button class="waves-effect waves-light btn-large blue accent-4" type="submit"> CADASTRAR </button> <br>

	<br> <a id="bot" href="alunos.php"> Listar Alunos </a>
</form>			

</fieldset>

</body>
</html>