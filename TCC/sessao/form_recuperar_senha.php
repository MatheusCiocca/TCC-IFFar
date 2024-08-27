<?php

session_start();

require_once "funcoes.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <link rel="stylesheet" href="estilo.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta charset="UTF-8">
    <title>Recuperar Senha</title>

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

    <form action="recuperar_senha.php" method="POST">

    
    <h3 class="enunciadoD"> Recuperação de Senha </h3>
    <h5 class="enunciadoD"> Entre com seu e-mail para redefinir sua senha </h5>

    <div class="divisor"></div> <br>

    <?php

    if(isset($_SESSION['mensagem'])) {
      if($_SESSION['mensagem'] == "Mensagem enviada com sucesso!"){

      echo "<div class='center-align' style='color:green;'><br>" . exibeMensagens(). "</div> <br>"; 

      } else {
      echo "<div class='center-align' style='color:red;'><br>" . exibeMensagens(). "</div> <br>"; 
      } 
      }

      ?> 

    <fieldset>
        Email: <br> <br> <input type="email" name="email"> <br> <br>
        <button class="waves-effect waves-light btn-large blue accent-4" type="submit">Solicitar recuperação de senha</button><br>
    </form>

    </div>
</div>


</body>
</html>