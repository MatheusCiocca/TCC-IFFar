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

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Edição de Alunos </title>


</head>
  
<script>

function confirmacao($id_aluno){
    var resposta = confirm ("Deseja, realmente, excluir este aluno do sistema?");
    if (resposta == true) {
        window.location.href = "excluir_aluno.php?id_aluno="+$id_aluno
    }
}

</script>

<body>
  
<div class="navbar-fixed">
        <nav class="blue darken-1">
            <div class="nav-wrapper">
            <a href="../materialize/menu_inicial.php" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
            <a href="#" class="brand-logo center">Edição de Alunos</a>
            </div>
          </nav>
  </div> 
  
  <br> <br> <br> <br>

<fieldset>

<?php

require_once "../conecta.php";

$id_aluno = $_GET ['id_aluno'];
$sql = "SELECT * FROM aluno WHERE id_aluno = $id_aluno";
$resultado = mysqli_query ($conexao, $sql);
$aluno = mysqli_fetch_assoc ($resultado);

?>


<form action="alterar_aluno.php" method="post">
    <input type="hidden" name="id_aluno" value="<?php echo $aluno ['id_aluno']; ?>">
    
    <label for="nome">
    <p> Nome: <br> <input id="nome" type="text" name="nome" value="<?php echo $aluno ['nome']; ?>" required> </p> </label> <br>
    
    <label for="rg">
    <p> Registro Geral: <br> <input id="rg" type="text" name="rg" value="<?php echo $aluno ['rg']; ?>" required> </p> </label> <br>

    <label for="n_matricula">
	<p> Nº de Matrícula: <br> <input id="n_matricula" type="number" name="n_matricula" value="<?php echo $aluno ['n_matricula']; ?>" required></p> </label> <br>

    <label for="data_nasc">
	<p> Data de Nascimento: <br> <input id="data_nasc" type="date" name="data_nasc" value="<?php echo $aluno ['data_nasc']; ?>" required></p> </label> <br>
    
    <br> <button class="waves-effect waves-light btn-large blue accent-4" type="submit">SALVAR ALTERAÇÕES</button> <br>
</form>

<br> <a href="alunos.php"> Listar Alunos </a>

<br> <br> <?php echo "<a href='#' onclick='confirmacao($aluno[id_aluno])' class='btn-floating btn-large waves-effect waves-light red'>
<i class='material-icons'>delete</i></a>"?>

</fieldset>