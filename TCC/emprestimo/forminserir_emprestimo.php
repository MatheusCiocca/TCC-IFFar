<?php

session_start();

require_once "../conecta.php";

if (!isset($_SESSION['id_prof'])) {
    $_SESSION['mensagem'] = "Você deve primeiro realizar o login.";
    header("Location:../sessao/form_login.php");
}

$sql = "SELECT * FROM livro";
$resultado = mysqli_query($conexao, $sql);
$livros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

$sql2 = "SELECT * FROM aluno";
$resultado2 = mysqli_query($conexao, $sql2);
$alunos = mysqli_fetch_all($resultado2, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="CSS.css"/>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../estilo.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Cadastro de Empréstimos </title>
    
    <style>
    .dropdown-content li>a,
    .dropdown-content li>span {
      color: black !important;
    } 
    
    </style>


</head>
  
<body>
  
    <div class="navbar-fixed">
        <nav class="blue darken-1">
            <div class="nav-wrapper">
            <a href="../materialize/menu_inicial.php" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
            <a href="#" class="brand-logo center wite-text">Cadastro de Empréstimos</a>
            </div>
          </nav>
  </div> 

  <br> <br> <br> <br>

<fieldset>
        <form action="inserir_emprestimo.php" method="get">

        <label style="text-align:left;" for="aluno">
      <p>  Aluno: <br>
        <div class="input-field col s12">
          <select name="aluno">
            <?php
            
            foreach ($alunos as $aluno) { ?>
                <option value="<?= $aluno['id_aluno'] ?>"> <?= $aluno['nome'] . " - " . $aluno['n_matricula'] ?> </option>
            <?php } ?>

          </select>
        </div>
        </p>
      </label> <br>

    <label style="text-align:left;" for="titulo">
      <p>  Livro: <br>
        <div class="input-field col s12">
          <select name="livro">
            <?php
            
            foreach ($livros as $livro) { ?>
                <option value="<?= $livro['id_livro'] ?>"> <?= $livro['nome_autor'] . " - " . $livro['titulo'] ?> </option>
            <?php } ?>

          </select>
        </div>
        </p>
      </label> <br>
    
    <label for="data_emp">
	<p> Data de Empréstimo: <br> <input id="data_emp" type="date" name="data_emp" required></p> </label> <br>

    <label for="data_dev">
	<p> Data de Devolução: <br> <input id="data_dev" type="date" name="data_dev" required></p> </label> <br>

    <br> <button class="waves-effect waves-light btn-large blue accent-4" type="submit"> CADASTRAR </button> <br>

	<br> <a id="bot" href="emprestimo.php"> Listar Empréstimos </a>
</form>			

</fieldset>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>

  <script>
    // $(document).ready(function() {
    //   $('select').formSelect();
    // });
  </script>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<script>
  $(function () {
    $("select").selectize({
        sortField: 'text'
    });
  });
</script>
</body>
</html>