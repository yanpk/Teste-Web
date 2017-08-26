
<?php
// definições de host, database, usuário e senha
$link = mysql_connect('localhost','root','');

$conexao = mysql_select_db('mercadorias',$link); if($conexao){

$sql = "SELECT * FROM mercadorias order by id asc";

$consulta = mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>Lista de Mercadorias</title>
        <link rel="stylesheet" type="text/css" href="scripts/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="scripts/css/estilo.css">
        <script src="scripts/js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="scripts/js/jquery.mask.min.js" type="text/javascript"></script>
    </head>
    <body>

        <div class="container-fluid-cad bg-5 text-center">
            <div class="row">
                <h1 class="margin">Relação de Mercadorias Cadastradas</h1>
            </div>
        </div>


        <div align="center" class="container-fluid-mid-lista bg-list text-center">
    <?php    echo '<table class="table table-bordered table-hover">';
        echo    '<thead>';
        echo       '<tr>';
        echo            '<td>Código</td>';
        echo            '<td>Tipo</td>';
        echo            '<td>Nome</td>';
        echo            '<td>Quantidade</td>';
        echo            '<td>Preço</td>';
        echo            '<td>Tipo de Negócio</td>';

        echo            '<th>Apagar</th>';
        echo            '<th>Alterar</th>';
        echo        '</tr>' ;
        echo        '<tbody>';
                  while($registro = mysql_fetch_assoc($consulta)){
        echo            '<tr>';
                            $id = $registro["id"];
        echo                '<td>'.$registro["id"].'</td>';
        echo                '<td>'.$registro["tipo"].'</td>';
        echo                '<td>'.$registro["nome"].'</td>';
        echo                '<td>'.$registro["quantidade"].'</td>';
        echo                '<td>'.$registro["preco"].'</td>';
        echo                '<td>'.$registro["tiponegocio"].'</td>';

        echo                '<td><a href="deletar.php?id='.$id.'"><span class="glyphicon glyphicon-remove icone-lista"></span></a></td>';
        echo                '<td><a href="atualizar.php?id='.$id.'"><span class="glyphicon glyphicon-edit icone-lista"></span></a></td>';
        echo            '</tr>';
      }


        echo    '</tbody>';

              echo  '</table>';
            }?>

        <a class="btn btn-default" href="index.html">Cadastrar Mercadoria</a>
        </div>
    </body>
</html>
