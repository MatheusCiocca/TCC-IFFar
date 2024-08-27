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


  <link rel="stylesheet" type="text/css" href="CSS.css" />
  <link rel="stylesheet" href="../estilo.css" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Edição de Empréstimos </title>

  <script>
    function confirmacao($id_emprestimo) {
      var resposta = confirm("Deseja, realmente, excluir este empréstimo do sistema?");
      if (resposta == true) {
        window.location.href = "excluir_emprestimo.php?id_emprestimo=" + $id_emprestimo
      }
    }
  </script>
  <style>
    .dropdown-content li>a,
    .dropdown-content li>span {
      color: black !important;
    }
  </style>
</head>


<body>

  <div class="navbar-fixed">
    <nav class="blue darken-1">
      <div class="nav-wrapper">
        <a href="../materialize/menu_inicial.php" class="brand-logo left"> <img src="DH-logo.png" width="80" height="80" class="responsive-img"> </a>
        <a href="#" class="brand-logo center white-text">Edição de Empréstimos</a>
      </div>
    </nav>
  </div>

  <br> <br> <br> <br>

  <fieldset>

    <?php

    include "../conecta.php";
    $pag = $_GET['pag'];
    $busca = $_GET['busca'];
    $id_emprestimo = $_GET['id_emprestimo'];
    $sql = "SELECT e.*, a.*, l.* FROM emprestimo as e, aluno as a, livro as l 
    WHERE e.id_aluno=a.id_aluno
    AND e.id_livro=l.id_livro
    AND id_emprestimo=$id_emprestimo";
    $resultado = mysqli_query($conexao, $sql);
    $emprestimo = mysqli_fetch_array($resultado);
    mysqli_close($conexao);

    ?>

    <form action="alterar_emprestimo.php" method="post">
      <input type="hidden" name="id_emprestimo" value="<?php echo $emprestimo['id_emprestimo']; ?>">

      <label for="n_matricula">
        <p> Matricula do Aluno: <br> <input style="color: black;" disabled id="n_matricula" type="number" name="n_matricula" value="<?php echo $emprestimo['n_matricula']; ?>" required> </p>
      </label> <br>

      <label for="titulo">
        <p> Título: <br> <input style="color: black;" disabled id="titulo" type="text" name="titulo" value="<?php echo $emprestimo['titulo']; ?>" required> </p>
      </label> <br>

      <label for="data_emp">
        <p> Data de Empréstimo: <br> <input id="data_emp" type="date" name="data_emp" value="<?php echo $emprestimo['data_emp']; ?>" required></p>
      </label> <br>

      <label for="data_dev">
        <p> Data de Devolução: <br> <input id="data_dev" type="date" name="data_dev" value="<?php echo $emprestimo['data_dev']; ?>" required></p>
      </label> <br>

      <?php if ($emprestimo['devolvido'] == 0) {
        $devolvido = "Não Devolvido";
      } else {
        $devolvido = "Devolvido";
      } ?>

      
      <label style="text-align:left;" for="devolvido">
      <p>  Status: <br>
        <div class="input-field col s12">
          <select name="dev">
            <option value="<?= $emprestimo['devolvido'] ?>" selected><?= $devolvido ?></option>
            <option value="1">Devolvido</option>
            <option value="0">Não Devolvido</option>
          </select>
        </div>
        </p>
      </label>
     
      <input type="hidden" name = "pag" value = "<?=$pag?>">
      <input type="hidden" name="busca" value = "<?=$busca?>">
      <br> <button class="waves-effect waves-light btn-large blue accent-4" type="submit">SALVAR ALTERAÇÕES</button> <br>

    </form>

    <br> <br> <a href="emprestimo.php"> Listar Empréstimos </a>

    <br> <br> <?php echo "<td> <a href='#' onclick='confirmacao($emprestimo[id_emprestimo])' class='btn-floating btn-large waves-effect waves-light red'>
                <i class='material-icons'>delete</i></a></td>"; ?>

  </fieldset>


  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>

  <script>
    $(document).ready(function() {
      $('select').formSelect();
    });
  </script>