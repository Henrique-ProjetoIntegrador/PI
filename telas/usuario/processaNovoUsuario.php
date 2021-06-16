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


// ! quer dizer o contrario da logica

    if (!isset($_POST['nome']) && !isset($_POST['senha']) && !isset($_POST['funcao'])){
        echo "Campo nao existe";
        die();
    }

    // estou fazendop uma validação se os campos são igual a nada  ( "") <- nada

    // aqui está verificando se os 3 campos estão vazios

    // agr vc precisa verificar um em um se estão vazios, tipo assim..
    if($_POST['nome'] == "" && $_POST['senha'] == "" && $_POST['funcao']== ""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoUsuario.php');
    }

    if($_POST['nome'] ==""){
        // aqui no caso, fiz apernas 1 vez no proprio lugar de retorno
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoUsuario.php');
    }
    if($_POST['senha'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoUsuario.php');
    }
    if($_POST['funcao'] ==""){
        $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
        header('Location: novoUsuario.php');
    }

    // ai blz, se os campos forem vazios, ele vai cria uma sessão com o nome errosCampos, e com uma mensagem
    // dizendo para preencher os campos, agr para mostrar essa mensage, preciso chaamar essa session erroCampo
    // no novoUsuario.php que é por ele que está sendo enviado
   
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $funcao = $_POST['funcao'];

    // if ((!isset( $_POST['nome'])) && (!isset( $_POST['senha'])) && (!isset($_POST['funcao']))){
    //     $_SESSION['erroCampos'] = 'Nada foi postado';
    // }
    
    // nao sei pq mas era para ser atraves do $resultado o negocio, mas blz
    // agr amor o que vc tem que fazer
    // só recapitulando o que foi feito
    // validamos se os campos estão vazios se sim ele retorna a mensagem de erro para a tela
    // mas nao validamos se todos os campos estão preenchidos, ou seja
    // se o cara digitar a senha mas nao informar o login ele registra no banco mesmo assim

    // isso nao pode acontecer, só pode registrar no banco se o campo login e senha estiverem preenchidos
    // isso, o select tbm precisa estar preenchidos, ou seja os 3 campos preenchidos para poder registrar no banco
    // caso contrario ele retorna a mensagem de favor preencher os campos

    

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

