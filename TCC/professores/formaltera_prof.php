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
    <title> Edição de Professores </title>

  </head>

  <script>

function confirmacao($id_prof){
    var resposta = confirm ("Deseja realmente excluir este professor do sistema?");
    if (resposta == true) {
        window.location.href = "excluir_prof.php?id_prof="+$id_prof
    }
}

</script>

<body>
  
<div class="navbar-fixed">
        <nav class="blue darken-1">
            <div class="nav-wrapper">
            <a href="../materialize/menu_inicial.php" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
            <a href="#" class="brand-logo center white-text">Edição de Professores</a>
            </div>
          </nav>
  </div> 
  
  <br> <br> <br> <br>

<fieldset>

<?php

require_once "../conecta.php";

$id_prof = $_GET ['id_prof'];
$sql = "SELECT * FROM professor WHERE id_prof = $id_prof";
$resultado = mysqli_query ($conexao, $sql);
$prof = mysqli_fetch_assoc($resultado);

?>

<form action="alterar_prof.php" method="post">
    <input type="hidden" name="id_prof" value="<?php echo $prof ['id_prof']; ?>">
    
    <label for="nome">
    <p> Nome: <br> <input id="nome" type="text" name="nome" value="<?php echo $prof ['nome_prof']; ?>" required> </p> </label> <br>

    <label for="email">
	<p> E-mail: <br> <input style="color: black" id="email" disabled type="email" name="email" value="<?php echo $prof ['email']; ?>"></p> </label> <br>
    
    <label for="senha">
	<p> Senha: <br> <input id="senha" style="color: black" disabled type="password" name="senha" value="<?php echo $prof ['senha']; ?>"></p> </label> <br>

    
    <br> <button class="waves-effect waves-light btn-large blue accent-4" type="submit">SALVAR ALTERAÇÕES</button> <br>
    
</form>

<br> <a href="professores.php"> Listar Professores </a>

<br> <br> <?php echo "<a href='#' onclick='confirmacao($prof[id_prof])' class='btn-floating btn-large waves-effect waves-light red'>
<i class='material-icons'>delete</i></a>"; ?>
</fieldset>