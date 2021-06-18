<?php
session_start();

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$data_cadastro = $_POST["data_cadastro"];
$telefone = $_POST["telefone"];
$celular = $_POST["celular"];
$nascimento = $_POST["nascimento"];
$endereco= $_POST["endereco"];
$id = $_POST["id"];



include_once '../../includes/connectDb.php';

$conn = getConnection();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <?php
            include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
        ?>
        <link rel="stylesheet" href="../../styles/menu.css"/>
        <link rel="stylesheet" href="../../styles/novoClientes.css"/>
        <link rel="stylesheet" href="../alerts/modal.css">
        <title>Novo Cliente</title>
    </head>
    <body>

<?php
$sql = "UPDATE clientes SET nome = '".$nome."', cpf = '".$cpf."', data_cadastro = '".$data_cadastro."', telefone = '".$telefone."', celular ='".$celular."', nascimento = '".$nascimento."', endereco = '".$endereco."' WHERE id =".$id; 
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
                    <p>Não foi possível editar cliente!</p>
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
