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
        <link rel="stylesheet" href="../../styles/novoUsuario.css"/>
        <link rel="stylesheet" href="../alerts/modal.css">
        <title>Novo Usuário</title>
    </head>
    <body>

    <?php
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $funcao = $_POST['funcao'];

    $sql= "INSERT INTO usuario (login, senha, funcao) VALUES ('$nome', '$senha', '$funcao')";
    $stmt = $conn->prepare($sql); // prepara a query para ser executada
    $stmt->execute(); // realiza a execução da query
    $resultado = $stmt->fetchAll(); // pega o resultado da execução da query

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
                        <a href="novoUsuario.php"><button type="button" class="btn btn-success">OK</button></a>               
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
                        <a href="novoUsuario.php"><button type="button" class="btn btn-success">OK</button></a>               
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

