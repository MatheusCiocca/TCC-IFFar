<?php

session_start();

require_once "funcoes.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="estilo.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Cadastro de Usuário </title>

</head>

<style>

.divisor {
    margin-top: 55px;
    height: 1.5px;
    width: 100%;
    content: '';
    background-color: black;
    display: block;
}

</style>

<body>

<div class="row">

<!-- Coluna da esquerda -->
  <div class="colunaE col s6">

  <h3 class="enunciadoE" id="enunciadoE"> Escola Estadual de Ensino Médio Dom Hermeto </h3>
  <h6 class="enunciadoE"> Sistema de Biblioteca </h6>

  <br> <br> <br> <br>

  <div class="center-align">
  <img src="DH-logo.png" height="450" width="450">
  </div>

  </div>

  <!-- Coluna da direita -->
  <div class="colunaD col s6 white">


    <h3 class="enunciadoD"> Faça seu cadastro aqui </h3>
    <h5 class="enunciadoD"> Informe seus dados no formulário abaixo </h5>

    <div class="divisor"></div>

    <div style="color: red;"><?= exibeMensagens() ?></div>
    <!--Formulário-->

<fieldset>
  <form action="salvar_usuario.php" onsubmit="return validarSenha();" method="POST">
    <br> Nome completo: <input type="text" name="nome" required><br>
    <br> Email: <input type="email" name="email" required><br>
    <br> Senha: <input id="senha" type="password" name="senha" required><br>
    <br> Confirmar senha: <input type="password" id="repetirSenha" name="repetirSenha" onblur="validarSenha()" required> <br>
    <br> <br> <button class="waves-effect waves-light btn-large blue accent-4" type="submit">Realizar Cadastro</button> <br> <br>
</form>
</fieldset>


  </div>
</div>


<!--Confirmação de senha-->

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