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
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <link rel="stylesheet" href="../estilo.css">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Menu Inicial </title>


</head>


<body>

    <div class="navbar-fixed">
        <nav class="blue darken-1">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
                <a href="#" class="brand-logo center white-text">Menu Inicial</a>
                    <a class="nome"> Olá, <?= $_SESSION['nome_prof'] ?>! </a>
                <a class="brand-logo right black-text" style="margin-right: 1%;" href="../sessao/logout.php"><i class='material-icons'>power_settings_new</i></a>
            </div>
        </nav>
    </div>

    <br> <br>

    <fieldset>

        <br>
        <p><a href="../professores/professores.php" id="cursor" class="btn waves-effect waves-light btn-large" id="menu_inicial">Listar Professores</a></p>

        <br>
        <p><a href="../alunos/alunos.php" id="cursor" class="btn waves-effect waves-light btn-large" id="menu_inicial">Listar Alunos</a></p>

        <br>
        <p><a href="../livros/livros.php" id="cursor" class="btn waves-effect waves-light btn-large" id="menu_inicial">Listar livros</a></p>

        <br>
        <p><a href="../reserva/reservas.php" id="cursor" class="btn waves-effect waves-light btn-large" id="menu_inicial">Listar Reservas</a></p>

        <br>
        <p><a href="../emprestimo/emprestimo.php" id="cursor" class="btn waves-effect waves-light btn-large" id="menu_inicial">Empréstimo de Livros</a></p>

    </fieldset>

</body>

</html>