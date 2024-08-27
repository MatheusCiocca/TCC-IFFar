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

    <link rel="stylesheet" type="text/css" href="../estilo.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Edição de Reservas </title>


  </head>

  <script>

function confirmacao($id_reserva){
    var resposta = confirm ("Deseja, realmente, excluir esta reserva do sistema?");
    if (resposta == true) {
        window.location.href = "excluir_reserva.php?id_reserva="+$id_reserva
    }
}

</script>
  
<body>
  
<div class="navbar-fixed">
        <nav class="blue darken-1">
            <div class="nav-wrapper">
            <a href="../materialize/menu_inicial.php" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
            <a href="#" class="brand-logo center">Edição de Reservas</a>
            </div>
          </nav>
  </div> 
  
  <br> <br> <br> <br>

<fieldset>

<?php

include "../conecta.php";

$id_reserva = $_GET ['id_reserva'];
$sql = "SELECT r.*, a.*, l.* FROM reserva as r, aluno as a, livro as l 
WHERE r.id_aluno=a.id_aluno
AND r.id_livro=l.id_livro
AND id_reserva=$id_reserva";
$resultado = mysqli_query ($conexao, $sql);
$reserva = mysqli_fetch_array ($resultado);
mysqli_close ($conexao);

?>

<form action="alterar_reserva.php" method="post">
    <input type="hidden" name="id_reserva" value="<?php echo $reserva ['id_reserva']; ?>">
    
    <label for="n_matricula">
    <p> Matricula do Aluno: <br> <input id="n_matricula" type="number" name="n_matricula" value="<?php echo $reserva ['n_matricula']; ?>" required> </p> </label> <br>
    
    <label for="titulo">
    <p> Título: <br> <input id="titulo" type="text" name="titulo" value="<?php echo $reserva ['titulo']; ?>" required> </p> </label> <br>

    <label for="data_emp">
	<p> Data de Empréstimo: <br> <input id="data_emp" type="date" name="data_emp" value="<?php echo $reserva ['data_emp']; ?>" required></p> </label> <br>

    <label for="data_dev">
	<p> Data de Devolução: <br> <input id="data_dev" type="date" name="data_dev" value="<?php echo $reserva ['data_dev']; ?>" required></p> </label> <br>
    
    <br> <button class="waves-effect waves-light btn-large blue accent-4" type="submit">SALVAR ALTERAÇÕES</button> <br>
    
</form>

<br> <a href="reservas.php"> Listar Reservas </a>

<br> <br> <?php echo "<td> <a href='#' onclick='confirmacao($reserva[id_reserva])' class='btn-floating btn-large waves-effect waves-light red'>
                <i class='material-icons'>delete</i></a></td>";?>

</fieldset>