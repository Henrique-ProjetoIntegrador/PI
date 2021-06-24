<?php
session_start();

$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$preco = $_POST["preco"];
$qtd = $_POST["qtd"];
$id = $_POST["id"];



include_once '../../includes/connectDb.php';

$conn = getConnection();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php
            include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
        ?>
        <link rel="stylesheet" href="../../styles/menu.css"/>
        <link rel="stylesheet" href="../../styles/novaPeca.css"/>
        <link rel="stylesheet" href="../alerts/modal.css">
        <title>Nova Peça</title>
    </head>
    <body>

<?php
$sql = "UPDATE pecas SET nome = '".$nome."', categoria = '".$categoria."', preco = '".$preco."', qtd = '".$qtd."' WHERE id =".$id; 
$stmt = $conn->prepare($sql); // prepara a query para ser executada
$stmt->execute(); // realiza a execução da query
// header('Location: index.php');

if($stmt){ ?>
    <div class="modal" id= "salvar" tabindex="-1" role="dialog">
        <div class= "modal-dialog" role="document">
            <div class= "modal-content">
                <div class="modal-header">
                    <h5 class= "modal-title">Editar</h5> 
                </div>
                <div class="modal-body">
                    <p>Editado com sucesso!</p>
                </div>
                <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-success">OK</button></a>               
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready (function (){
            $('#salvar') .modal('show');
        });
    </script>
<?php }else{ ?>
    <div class="modal" id= "salvar" tabindex="-1" role="dialog">
        <div class= "modal-dialog" role="document">
            <div class= "modal-content">
                <div class="modal-header">
                    <h5 class= "modal-title">Editar</h5>
                </div>
                <div class="modal-body">
                    <p>Não foi possível editar usuário!</p>
                </div>
                <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-success">OK</button></a>               
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready (function (){
        $('#salvar') .modal('show');
    });
    </script>  
<?php } ?>

</body>
</html>


