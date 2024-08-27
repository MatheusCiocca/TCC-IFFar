<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $bdServidor = '127.0.0.1';
        $bdUsuario = 'root';
        $bdSenha = '';
        $bdBanco = 'tcc';
        $conexao = mysqli_connect ($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
        
        if ($conexao == false){
            echo "Problemas para conectar no banco. Erro: ";
            echo mysqli_connect_error();
        }
        
        mysqli_set_charset ($conexao, "utf8mb4");


        ?>
    </body>
</html>