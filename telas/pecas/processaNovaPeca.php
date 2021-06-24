<?php 
session_start();

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
    // ! quer dizer o contrario da logica
    if (!isset($_POST['nome']) || !isset($_POST['categoria']) || !isset($_POST['preco']) || !isset ($_POST['qtd'])){
        echo "Campo nao existe";
        die();
    }

    // aqui está verificando se os 3 campos estão vazios
    if($_POST['nome'] == "" && $_POST['categoria'] == "" && $_POST['preco']== "" && $_POST['qtd']== ""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novaPeca.php');
    }

    if($_POST['nome'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novaPeca.php');
    }
    if($_POST['categoria'] == ""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novaPeca.php');
    }
    if($_POST['preco'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novaPeca.php');
    }
    if($_POST['qtd'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novaPeca.php');
    }

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $qtd = $_POST['qtd'];

    $sql= "INSERT INTO pecas (nome, categoria, preco, qtd) VALUES ('$nome', '$categoria', '$preco', '$qtd')";
    $stmt = $conn->prepare($sql); // prepara a query para ser executada
    $stmt->execute(); // realiza a execução da query

if($stmt){ 
?>
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
                        <a href="novaPeca.php"><button type="button" class="btn btn-success">OK</button></a>               
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
                        <a href="novaPeca.php"><button type="button" class="btn btn-success">OK</button></a>               
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
