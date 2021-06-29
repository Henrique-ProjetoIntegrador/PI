<?php
   include '../../includes/verificaSeLogado.php';
   include '../../includes/redireciona.php';
   require '../../Classes/Conexao.php';
   require '../../Classes/Cliente.php';
   $conteudo = new Cliente($mysql);
   $veiculos = $conteudo->exibeTodosVeiculosCliente($_GET['id']);   
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
                                            <td><a href='../veiculo/consultarVeiculo.php?id=<?php echo $veiculo['id']; ?>'><?php echo $veiculo['marca']; ?></a></td>
                                            <td><a href='../veiculo/consultarVeiculo.php?id=<?php echo $veiculo['id']; ?>'><?php echo $veiculo['placa']; ?></a></td>
                                            <td><a href='../veiculo/editarVeiculo.php?id="<?php echo $veiculo['id']; ?>'>Editar</a></td>
                                            <td><a href='../veiculo/deletarVeiculo.php?id="<?php echo $veiculo['id']; ?>' class=''>Excluir</a></td>
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
                            <br>
                        </div>
                    </div>
                </div>
            </div>    
        </div>     
    </main>   
</body>
</html>