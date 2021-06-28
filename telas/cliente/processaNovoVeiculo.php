
<?php
    include '../../includes/verificaSeLogado.php';
    include_once '../../includes/connectDb.php';
    $conn = getConnection(); //funcao existente no connectDb
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/veiculo.css">
    <title>Veículos</title>
</head>
<body>

    <?php
    if (!isset($_POST['modelo']) || !isset($_POST['marca']) || !isset($_POST['ano']) || !isset($_POST['placa']) ||  !isset($_POST['chassis']) || !isset($_POST['data_cadastro'])){
        echo "Informações inexistentes";
        die();
    }

    if($_POST['modelo'] == "" && $_POST['marca'] == "" && $_POST['ano']== "" && $_POST['placa']=="" && $_POST['chassis']=="" && $_POST['data_cadastro']==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header("Location: novoVeiculo.php?id_cliente={$_POST['id_cliente']}");
        die();
    }

    if($_POST['modelo'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header("Location: novoVeiculo.php?id_cliente={$_POST['id_cliente']}");
        die();
    }
    if($_POST['marca'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header("Location: novoVeiculo.php?id_cliente={$_POST['id_cliente']}");
        die();
    }
    if($_POST['ano'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header("Location: novoVeiculo.php?id_cliente={$_POST['id_cliente']}");
        die();
    }
    if($_POST['placa'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header("Location: novoVeiculo.php?id_cliente={$_POST['id_cliente']}");
        die();
    }
    if($_POST['data_cadastro'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header("Location: novoVeiculo.php?id_cliente={$_POST['id_cliente']}");
        die();
    }
   
    $modelo = $_POST ['modelo'];
    $marca = $_POST['marca']; 
    $ano = $_POST['ano'];
    $placa = $_POST['placa'];
    $chassis = $_POST['chassis'];
    $data_cadastro = $_POST['data_cadastro'];
    $id_usuario= $_SESSION['id_usuario'];
    $id_cliente = $_POST['id_cliente'];

    $sql= "INSERT INTO veiculo (modelo, marca,  ano, placa, chassis, data_cadastro, id_usuario, id_clientes) VALUES ('$modelo', '$marca', '$ano', '$placa', '$chassis', '$data_cadastro', '$id_usuario','$id_cliente')";
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
                        <a href="../cliente"><button type="button" class="btn btn-success">OK</button></a>
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
                        <a href="../cliente"><button type="button" class="btn btn-success">OK</button></a>
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