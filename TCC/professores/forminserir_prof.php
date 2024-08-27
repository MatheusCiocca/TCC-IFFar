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
    <title> Cadastro de Professores </title>

  </head>

  
<body>
  
    <div class="navbar-fixed">
        <nav class="blue darken-1">
            <div class="nav-wrapper">
            <a href="../materialize/menu_inicial.php" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
            <a href="#" class="brand-logo center">Cadastro de Professores</a>
            </div>
          </nav>
  </div> 

  <br> <br> <br> <br>

<fieldset>
        <form action="inserir_prof.php" onsubmit="return validarSenha();" method="get">

    <label for="nome">
    <p> Nome: <br> <input id="nome" type="text" name="nome" required></p> </label> <br>

    <label for="email">
	<p> E-mail: <br> <input id="email" type="email" name="email" required></p> </label> <br>

    <label for="senha">
	<p> Senha: <br> <input id="senha" type="password" name="senha" required></p> </label> <br>

    <label for="repetirSenha">
	<p> Repetir Senha: <br> <input id="repetirSenha" type="password" name="repetirSenha" onblur="validarSenha()" required></p> </label> <br>
    

    <br> <button class="waves-effect waves-light btn-large blue accent-4" type="submit"> CADASTRAR </button> <br>

	<br> <a id="bot" href="professores.php"> Listar Professores </a>
</form>			

</fieldset>

<script type="text/javascript">

    function validarSenha() {
        senha = document.getElementById("senha").value;
        rs = document.getElementById("repetirSenha");
        repetirSenha = document.getElementById("repetirSenha").value;
        if (senha == repetirSenha) {
            rs.setCustomValidity('');
            rs.checkValidity();
            return true;
        } else {
            rs.setCustomValidity('As senhas não conferem');
            rs.checkValidity();
            rs.reportValidity();
            return false;
        }
    }

</script>

</body>
</html>