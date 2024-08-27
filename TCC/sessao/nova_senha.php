<?php
session_start();

require_once "funcoes.php";

require_once "../conecta.php";


//verificar se o email e token batem com o banco
$email = mysqli_real_escape_string($conexao, $_GET['email']);
$token = $_GET['token'];


$sql = "SELECT * FROM password_reset WHERE email='$email' AND token='$token'";
$resultSet = mysqli_query($conexao, $sql);
$reset = mysqli_fetch_assoc($resultSet);
if(!is_null($reset)) {
    //verificar se já está expirado
    $hoje = new DateTime();
    $dataExpiracao = new DateTime($reset['data_expiracao']);
    if ($hoje < $dataExpiracao) {//ainda é válida
        //verificar se o pedido atual já foi usado
        if($reset['usado'] == 0){//não foi usado
            //continua pra página
        } else {//já foi usado
            $_SESSION['mensagem'] = "Pedido de recuperação de senha já foi usado! Realize o pedido de recuperação de senha novamente se deseja alterar a senha.";
        }
    } else {//expirou o pedido de recuperação
        $_SESSION['mensagem'] = "Pedido de recuperação de senha expirado! Realize o pedido de recuperação de senha novamente";
    }

} else {//se não existe esse pedido de reset
    $_SESSION['mensagem'] = "Pedido de recuperação de senha inválido";
}

//exibir o formulário de redefinição de senha
//encaminha para o arquivo que redefine a senha
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
    <title> Redefinir senha </title>

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


    <h3 class="enunciadoD"> Redefinir senha </h3>
    <h5 class="enunciadoD"> Digite sua nova senha abaixo </h5>

    <div class="divisor"></div> <br>

<fieldset>
    <form action="salvar_senha.php" onsubmit="return validarSenha();" method="POST">
        <div class="center-aling" style="color: red;"><?= exibeMensagens() ?></div>
        <input type="hidden" name="email" value="<?= $email ?>" required>
        <input type="hidden" name="token" value="<?= $token ?>" required> <br> <br>
        Senha: <input type="password" id="senha" name="senha"> <br> <br>
        Confirmar senha: <input type="password" id="repetirSenha" onblur="validarSenha()" name="repetirSenha"><br> <br>
        <button class="waves-effect waves-light btn-large blue accent-4" type="submit"> Enviar </button><br>
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