<?php

session_start();

include_once "../sessao/funcoes.php";

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

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Listagem de Professores </title>

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
                    <a href="#" class="brand-logo center white-text">Listagem de Professores</a>
                    <div style="max-width:22%; margin-left:74%" class="nav-content">
                        <form id="busca" action="" method="get">
                            <input type="text" class="busca" value="<?php if(isset($_GET['busca'])){echo $_GET['busca'];}?>" name="busca" placeholder="Procure pelo nome ou email" required>
                            <a class="voltar" href="professores.php"><i class="material-icons">close</i></a>
                        </form>
                </div>
            </div>
            </div>
        </nav>
    </div>
    <br> <br> <br>


<div class="container">
        <div class="center-align">
            <a id="bot" href="forminserir_prof.php" class="waves-effect waves-light btn-large blue darken-1">
            <i class="material-icons center right">add</i>Adicionar Professor</a>
        </div>

        <?php

            if (isset($_SESSION['mensagem'])) {
                if ($_SESSION['mensagem'] == "Professor cadastrado com sucesso!" OR
                    $_SESSION['mensagem'] == "Professor excluído com sucesso!" OR
                    $_SESSION['mensagem'] == "Alterações salvas com sucesso!"
                ) {

                    echo "<br> <div class='center-align' style='color:green;'> <br>" . exibeMensagens() . "</div>";
                } else {
                    echo "<br> <div class='center-align' style='color:red;'> <br>" . exibeMensagens() . "</div>";
                }
            }

            ?>

        <br>

        <table id="professor" class="bordered highlight responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Operação</th>
                </tr>
            </thead>
            <tbody>


                <?php
                $sql = "SELECT * FROM professor
        WHERE nome_prof LIKE '%" . $busca . "%' OR
        email LIKE '%" . $busca . "%'
        ORDER BY nome_prof
        LIMIT $limit
        OFFSET $offset";
                $resultado = mysqli_query($conexao, $sql);
                $profs = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

                $sqlCount = "SELECT count(*) FROM professor";
                $resultSet = mysqli_query($conexao, $sqlCount);
                $count = mysqli_fetch_array($resultSet, MYSQLI_NUM);
                $ultimaPag = ceil($count[0] / $limit);

                foreach ($profs as $prof) {
                ?>
                    <tr>
                        <td><?= $prof['id_prof'] ?></td>
                        <td><?= $prof['nome_prof'] ?></td>
                        <td><?= $prof['email'] ?></td>
                        <?php echo "<td> <a href='formaltera_prof.php?id_prof=$prof[id_prof]' class='btn-floating btn-large waves-effect waves-light blue darken-1'>
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
                <li class="waves-effect"><a href="professores.php?busca=<?= $busca ?>&pag=1">Primeira página</a>
                    <?php
                    if ($pag == 1) {
                        echo '<li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>';
                    } else {
                        echo '<li class="waves-effect"><a href="professores.php?busca=' . $busca . '&pag=' . ($pag - 1) . '"><i class="material-icons">chevron_left</i></a></li>';
                    }
                    for ($i = 1; $i <= $ultimaPag; $i++) {
                        if ($pag == $i) {
                            echo '<li class="active blue darken-1"><a href="professores.php?busca=' . $busca . '&pag=' . $i . '">' . $i . '</a></li> ';
                        } else {
                            echo '<li class="waves-effect"><a href="professores.php?busca=' . $busca . '&pag=' . $i . '">' . $i . '</a></li> ';
                        }
                    }
                    if ($pag == $ultimaPag) {
                        echo '<li class="disabled"><a><i class="material-icons">chevron_right</i></aref=></li>';
                    } else {
                        echo '<li class="waves-effect "><a href="professores.php?busca=' . $busca . '&pag=' . ($pag + 1) . '"><i class="material-icons">chevron_right</i></a></li>';
                    }
                    echo '<li class="waves-effect "><a href="professores.php?busca=' . $busca . '&pag=' . $ultimaPag . '">Última página</a> '
                    ?>
            </ul>
        </div>

        <br> <br>


        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>

        </div>
</body>

</html>