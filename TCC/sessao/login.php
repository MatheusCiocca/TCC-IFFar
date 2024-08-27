<?php

session_start();

require_once "../conecta.php";

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$senhaMD5 = md5($senha);


$sql = "SELECT * FROM professor WHERE email='$email'";
$resultSet = mysqli_query($conexao, $sql);
$prof = mysqli_fetch_assoc($resultSet);

//echo $prof['nome_prof'];

if (is_null($prof)) {
    $_SESSION['mensagem'] = "Usuário informado não existe";
   header("Location: ../index.php");
} else if ($senhaMD5 == $prof['senha']) {
    $_SESSION['id_prof'] = $prof['id_prof'];
    $_SESSION['nome_prof'] = $prof['nome_prof'];
    header("Location:../materialize/menu_inicial.php");
} else {
    $_SESSION['mensagem'] = "Senha inválida!";
    header("Location: ../index.php");
}