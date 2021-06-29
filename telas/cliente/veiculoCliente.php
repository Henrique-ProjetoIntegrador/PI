<?php
   include '../../includes/verificaSeLogado.php';
   include '../../includes/redireciona.php';
   require '../../Classes/Conexao.php';
   require '../../Classes/Cliente.php';
   $conteudo = new Cliente($mysql);
   $veiculos = $conteudo->exibeTodosVeiculosCliente($_GET['id']);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){      
        $conteudo->removerVeiculoCliente($_POST['id']);
        $endereco = 'veiculoCliente.php?id='+ strval($_GET['id']);        
    } 
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
    <title>Veiculos</title>
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
                    <h2 class="text-center">Veículos</h2>
                </div>
                <div class="group-veiculos col-sm-6 offset-1">
                    <div class="row">
                        <div class="table-responsive table-hover">
                            <table class="table table-striped text-center">
                                <thead class="thead-dark">
                                    <tr>                      
                                        <th scope="col">Veículo</th>
                                        <th scope="col">Placa</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($veiculos as $veiculo):?>
                                        <tr>                                        
                                            <td><a href='../veiculo/consultarVeiculo.php?id=<?php echo $veiculo['id']; ?>'><?php echo $veiculo['modelo']; ?></a></td>
                                            <td><a href='../veiculo/consultarVeiculo.php?id=<?php echo $veiculo['id']; ?>'><?php echo $veiculo['placa']; ?></a></td>
                                            <td><a href='editarVeiculo.php?id=<?php echo $veiculo['id']; ?>'>Editar</a></td>
                                            <form action="veiculoCliente.php?id=<?php echo $_GET['id'] ?>" method="POST">                                                
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
                            <?php
                                echo "<a href='novoVeiculo.php?id_cliente=".$_GET['id']."' class='btn btn-danger btn-lg btn-block''>Novo</a>";
                            ?>
                            <br>
                        </div>
                        <div class="col-12">
                            <a href="index.php" class="btn btn-danger btn-lg btn-block">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <?php 
            if(!isset($_SESSION['novoVeiculoCliente'])){
                $_SESSION['novoVeiculoCliente'] = false;
            }
            if(!isset($_SESSION['editarVeiculoCliente'])){
                $_SESSION['editarVeiculoCliente'] = false;
            }
            if(!isset($_SESSION['removerVeiculoCliente'])){
                $_SESSION['removerVeiculoCliente'] = false;
            }
        ?>
        <?php if($_SESSION['novoVeiculoCliente']==true||$_SESSION['editarVeiculoCliente'] ==true|| $_SESSION['removerVeiculoCliente'] ==true ){ ?>
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
                            <a href="veiculoCliente.php?id=<?php echo $_GET['id'] ?>"><button type="button" onclick="<?php $_SESSION['removerVeiculoCliente'] =false; $_SESSION['novoVeiculoCliente']=false;  $_SESSION['editarVeiculoCliente'] =false; ?>" class="btn btn-success">OK</button></a>               
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
    </main>   
</body>
</html>