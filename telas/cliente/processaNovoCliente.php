<?php 
session_start();

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


    // ! quer dizer o contrario da logica
    if (!isset($_POST['nome']) || !isset($_POST['cpf']) || !isset($_POST['data_cadastro']) || !isset($_POST['telefone']) || !isset($_POST['celular']) || !isset($_POST['nascimento']) || !isset($_POST['endereco'])){
        echo "Campo não existe";
        die();
    }

    // aqui está verificando se os 3 campos estão vazios
    if($_POST['nome'] == "" && $_POST['cpf'] == "" && $_POST['data_cadastro']== "" && $_POST['telefone']=="" && $_POST['celular']=="" && $_POST['nascimento']=="" && $_POST['endereco']==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoClientes.php');
    }

    if($_POST['nome'] ==""){
        // aqui no caso, fiz apenas 1 vez no proprio lugar de retorno
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoClientes.php');
    }
    if($_POST['cpf'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoClientes.php');
    }
    if($_POST['data_cadastro'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoClientes.php');
    }
    if($_POST['telefone'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoClientes.php');
    }
    if($_POST['celular'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoClientes.php');
    }
    if($_POST['nascimento'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoClientes.php');
    }
    if($_POST['endereco'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoClientes.php');
    }

    $nome = $_POST ['nome'];
    $cpf = $_POST['cpf'];
    $data_cadastro = $_POST['data_cadastro'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];
    $id_usuario= $_SESSION['id_usuario'];

    $sql= "INSERT INTO clientes (nome, cpf, data_cadastro, telefone, celular, nascimento, endereco, id_usuario) VALUES ('$nome', '$cpf', '$data_cadastro', '$telefone', '$celular', '$nascimento', '$endereco', $id_usuario)";
    $stmt = $conn->prepare($sql); // prepara a query para ser executada
    $stmt->execute(); // realiza a execução da query

    if($stmt){ ?>
        <div class="modal" id= "salvar" tabindex="-1" role="dialog">
            <div class= "modal-dialog" role="document">
                <div class= "modal-content">
                    <div class="modal-header">
                        <h5 class= "modal-title">Salvar</h5> 
                    </div>
                    <div class="modal-body">
                        <p>Salvo com sucesso!</p>
                    </div>
                    <div class="modal-footer">
                        <a href="novoClientes.php"><button type="button" class="btn btn-success">OK</button></a>               
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
                        <h5 class= "modal-title">Salvar</h5>
                    </div>
                    <div class="modal-body">
                        <p>Não foi possível cadastrar!</p>
                    </div>
                    <div class="modal-footer">
                        <a href="novoClientes.php"><button type="button" class="btn btn-success">OK</button></a>               
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