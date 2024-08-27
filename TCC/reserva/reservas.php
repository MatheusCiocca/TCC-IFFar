<?php

session_start();

include_once('../sessao/funcoes.php');

//não deixar entrar sem estar logado
if (!isset($_SESSION['id_prof'])) {
    $_SESSION['mensagem'] = "Você deve primeiro realizar o login.";
    header("Location:../sessao/form_login.php");
}


//paginação
if (isset($_GET['pag'])) {
    $pag = $_GET['pag'];
} else {
    $pag = 1;
}
$limit = 3;
$offset = $limit * ($pag - 1);


//mecanismo de busca
if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
} else {
    $busca = "";
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

    <link rel="stylesheet" type="text/css" href="../estilo.css" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Listagem de Reservas </title>

    <style>
        
        .voltar {
            margin-left: 3%;
            color: white;
        }

        #busca {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .busca {
            padding-top: 1% !important;
            color: white;
        }

    </style>

</head>

<?php include_once "../conecta.php"; ?>


<body>
    <main>
        <div class="navbar-fixed">
            <nav class="blue darken-1">
                <div class="nav-wrapper">
                    <a href="../materialize/menu_inicial.php" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
                    <a href="#" class="brand-logo center white-text">Listagem de Reservas</a>
                    <div style="max-width:22%; margin-left:74%" class="nav-content">
                        <form id="busca" action="" method="get">
                            <input type="text" class="busca" value="<?php if(isset($_GET['busca'])){echo $_GET['busca'];}?>" name="busca" placeholder="Procure pelo nome do aluno ou do livro" required>
                            <a class="voltar" href="reservas.php"><i class="material-icons">close</i></a>
                        </form>
                    </div>
                </div>
        </div>
        </nav>
        </div>
        <br> <br> <br>


        <div class="container">
            <div class="center-align">
                <a id="bot" href="forminserir_reserva.php" class="center-align waves-effect waves-light btn-large blue darken-1">
                    <i class="material-icons right">add</i> Adicionar Reserva </a>
            </div>

            <?php

            if (isset($_SESSION['mensagem'])) {
                if ($_SESSION['mensagem'] == "Reserva cadastrada com sucesso!" OR
                    $_SESSION['mensagem'] == "Reserva excluída com sucesso!" OR
                    $_SESSION['mensagem'] == "Alterações salvas com sucesso!"
                ) {

                    echo "<br> <div class='center-align' style='color:green;'> <br>" . exibeMensagens() . "</div>";
                } else {
                    echo "<br> <div class='center-align' style='color:red;'> <br>" . exibeMensagens() . "</div>";
                }
            }

            ?>

            <br>

            <table id="reserva" class="bordered highlight responsive-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aluno</th>
                        <th>Livro</th>
                        <th>Data de Empréstimo</th>
                        <th>Data de Devolução</th>
                        <th>Operação</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $sql = "SELECT r.*, a.*, l.* FROM reserva as r, aluno as a, livro as l 
        WHERE r.id_aluno=a.id_aluno
        AND r.id_livro=l.id_livro
        AND (a.nome LIKE '%$busca%'
        OR l.titulo LIKE '%$busca%')
        ORDER BY data_dev
        LIMIT $limit
        OFFSET $offset";
                    $resultado = mysqli_query($conexao, $sql);
                    $reservas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

                    $sqlCount = "SELECT count(*) FROM reserva as r, aluno as a, livro as l 
                    WHERE r.id_aluno=a.id_aluno
                    AND r.id_livro=l.id_livro
                    AND (a.nome LIKE '%$busca%'
                    OR l.titulo LIKE '%$busca%')";
                    $resultSet = mysqli_query($conexao, $sqlCount);
                    $count = mysqli_fetch_array($resultSet, MYSQLI_NUM);
                    $ultimaPag = ceil($count[0] / $limit);

                    foreach ($reservas as $reserva) {

                        /*$x = explode('-', $reserva['data_emp']); // 2022-12-22
                $ano = $x[0];
                $mes = $x[1];
                $dia = $x[2];
                $reserva['data_emp'] = $dia . '/' . $mes . '/' . $ano;*/

                        $reserva['data_emp'] = DateTime::createFromFormat("Y-m-d", $reserva['data_emp']);

                        $reserva['data_dev'] = DateTime::createFromFormat("Y-m-d", $reserva['data_dev']);


                    ?>
                        <tr>
                            <td><?= $reserva['id_reserva'] ?></td>
                            <td><?= $reserva['nome'] ?></td>
                            <td><?= $reserva['titulo'] ?></td>
                            <td><?= $reserva['data_emp']->format("d/m/Y"); ?></td>
                            <?php $hoje = new DateTime();
                            //$dataExpiracao = new DateTime($reserva['data_dev']);
                            if ($hoje < $reserva['data_dev']) { ?>
                                <td style="color: green;"><?= $reserva['data_dev']->format("d/m/Y"); ?></td>
                            <?php } else { ?>
                                <td style="color: red;"><?= $reserva['data_dev']->format("d/m/Y"); ?></td>
                            <?php }
                            echo "<td> <a href='formaltera_reserva.php?id_reserva=$reserva[id_reserva]' class='btn-floating btn-large waves-effect waves-light blue darken-1'>
                    <i class='material-icons'>mode_edit</i></a></td>"; ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <br> <br>

            <div class="center-align">
                <ul class="pagination">
                    <li class="waves-effect"><a href="reservas.php?busca=<?= $busca ?>&pag=1">Primeira página</a>
                        <?php
                        if ($pag == 1) {
                            echo '<li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>';
                        } else {
                            echo '<li class="waves-effect"><a href="reservas.php?busca=' . $busca . '&pag=' . ($pag - 1) . '"><i class="material-icons">chevron_left</i></a></li>';
                        }
                        for ($i = 1; $i <= $ultimaPag; $i++) {
                            if ($pag == $i) {
                                echo '<li class="active blue darken-1"><a href="reservas.php?busca=' . $busca . '&pag=' . $i . '">' . $i . '</a></li> ';
                            } else {
                                echo '<li class="waves-effect"><a href="reservas.php?busca=' . $busca . '&pag=' . $i . '">' . $i . '</a></li> ';
                            }
                        }
                        if ($pag == $ultimaPag) {
                            echo '<li class="disabled"><a><i class="material-icons">chevron_right</i></aref=></li>';
                        } else {
                            echo '<li class="waves-effect "><a href="reservas.php?busca=' . $busca . '&pag=' . ($pag + 1) . '"><i class="material-icons">chevron_right</i></a></li>';
                        }
                        echo '<li class="waves-effect"><a href="reservas.php?busca=' . $busca . '&pag=' . $ultimaPag . '">Última página</a> '
                        ?>
                </ul>
            </div>

            <br> <br>

            <!--Import jQuery before materialize.js-->
            <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
            <script type="text/javascript" src="js/materialize.min.js"></script>


</body>

</html>