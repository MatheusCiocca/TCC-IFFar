<?php

session_start();

require_once "../TCC/sessao/funcoes.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="../TCC/sessao/estilo.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Login de Usuário </title>

</head>

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

  <form action="../TCC/sessao/login.php" method="POST">


    <h3 class="enunciadoD"> Entrar </h3>
    <h5 class="enunciadoD"> Entre com seu e-mail e senha </h5>

    <div class="divisor"></div>

    <?php

    if(isset($_SESSION['mensagem'])) {
      if($_SESSION['mensagem'] == "Novo usuário cadastrado com sucesso!" OR
      $_SESSION['mensagem'] == "Nova senha foi redefinida com sucesso!"){

      echo "<div class='center-align' style='color:green;'> <br>". exibeMensagens()."</div>"; 

      } else {
      echo "<div class='center-align' style='color:red;'> <br>". exibeMensagens()."</div>"; 
      } 
      }

      ?> 
     <br><br>

  <fieldset>
    Email: <input type="email" name="email"><br>
    <br> Senha: <input type="password" name="senha"> <br> <br>
    <br> <a href="../TCC/sessao/form_recuperar_senha.php">Esqueci a senha</a> <br>
    <br> Ainda não está cadastrado? <a href="../TCC/sessao/form_usuario.php">Cadastre-se</a> <br> <br>
    <br> <button class="waves-effect waves-light btn-large blue accent-4" type="submit">Entrar</button> <br>
</fieldset>

</form>

  </div>
</div>


</body>
</html>