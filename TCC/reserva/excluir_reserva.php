<?php

session_start();

include_once "../conecta.php";

include_once  "../sessao/funcoes.php";

$id_reserva = $_GET ['id_reserva'];

$sql = "DELETE FROM reserva WHERE id_reserva = $id_reserva";
$resultado = mysqli_query ($conexao, $sql);

mysqli_close ($conexao);

if ($resultado) {
    $_SESSION['mensagem'] = "Reserva excluída com sucesso!";
    header ("Location: reservas.php");
}

?>