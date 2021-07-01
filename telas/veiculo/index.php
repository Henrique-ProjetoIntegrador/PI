<?php
include '../../includes/verificaSeLogado.php';
include '../../includes/redireciona.php';
require '../../Classes/Conexao.php';
require '../../Classes/Veiculo.php';
$conteudo = new Veiculo($mysql);
$veiculos = $conteudo->consultaTodosVeiculos();
if($_SERVER['REQUEST_METHOD'] === 'POST'){      
    $conteudo->removerVeiculo($_POST['id']);
    redireciona('index.php'); 
 } 
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/veiculo.css">
    <link rel="stylesheet" href="../alerts/modal.css"/>
    <title>Veículos</title>
</head>
<body>
<header>
    <?php

    include_once "../layout/menu.php";

    ?>

</header>
<main>
    <div class="container">
        <div class="row">
            <div class="header-veiculos col-sm-8">
                <h2 class="text-center">Veículos Cadastrados</h2>
            </div>
            <div class="group-veiculos col-sm-6 offset-1">
                <div class="row">
                    <input id="myInput" type="text" placeholder=" &#128270; Pesquisar Veículo ">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Veículo</th>
                                <th scope="col">Placa</th>
                                <th scope="col" colspan="2">Ação</th>
                            </tr>
                            </thead>
                            <tbody id="myTable">
                            <?php foreach ($veiculos as $veiculo): ?>
                                <tr>
                                    <td><a href='consultarVeiculo.php?id=<?php echo $veiculo['id']; ?>'><?php echo $veiculo['modelo']; ?></a></td>
                                    <td><a href='consultarVeiculo.php?id=<?php echo $veiculo['id']; ?>'><?php echo $veiculo['placa']; ?></a></td>
                                    <td><a href='editarVeiculo.php?id=<?php echo $veiculo['id']; ?>'>Editar</a></td>
                                    <form action="index.php" method="POST">
                                        <input type="text" name="id" value="<?php echo $veiculo['id'] ?>" hidden>                                        
                                        <td><a href=""><button class="botao-excluir-veiculo" type="submit">Excluir</button></a></td>
                                    </form>                                    
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="option col-3 offset-1">
                <div class="row">
                    <div class="col-12">
                        <a href="novoVeiculo.php" class="btn btn-danger btn-lg btn-block">Novo</a>
                        <br>
                    </div>
                    <div class="col-12">
                        <a href="../principal/index.php" class="btn btn-danger btn-lg btn-block">Voltar</a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
            if(!isset($_SESSION['novoVeiculo'])){
                $_SESSION['novoVeiculo'] = false;
            }
            if(!isset($_SESSION['editarVeiculo'])){
                $_SESSION['editarVeiculo'] = false;
            }
            if(!isset($_SESSION['removerVeiculo'])){
                $_SESSION['removerVeiculo'] = false;
            }
        ?>
        <?php if($_SESSION['novoVeiculo']==true||$_SESSION['editarVeiculo'] ==true|| $_SESSION['removerVeiculo'] ==true ){ ?>
            <div class="modal" id= "salvar" tabindex="-1" role="dialog">
                <div class= "modal-dialog" role="document">
                    <div class= "modal-content">
                        <div class="modal-header">
                            <h5 class= "modal-title"><?php echo $_SESSION['mensagemHeader']; ?></h5> 
                        </div>
                        <div class="modal-body">                            
                            <p><?php echo $_SESSION['mensagem']; ?></p>
                        </div>
                        <div class="modal-footer">
                            <a href="index.php"><button type="button" onclick="<?php $_SESSION['removerVeiculo'] =false; $_SESSION['novoVeiculo']=false;  $_SESSION['editarVeiculo'] =false; ?>" class="btn btn-success">OK</button></a>               
                        </div>
                    </div>
                </div>
            </div>            
        <?php } ?>
        <script>                
            $(document).ready (function (){
                $('#salvar') .modal('show');
            });    
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });            
        </script>
</main>
</body>
</html>