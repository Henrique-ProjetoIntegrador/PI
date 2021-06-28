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
<!--                                        <th scope="col"colspan="2">Ação</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT clientes.nome, 
                                                   veiculo.marca, 
                                                   veiculo.placa, 
                                                   veiculo.id 
                                            FROM veiculo 
                                            INNER JOIN 
                                                clientes on veiculo.id_clientes = clientes.id 
                                            WHERE clientes.id = '".$_GET['id']."'";
                                    $stmt = $conn->prepare($query); // prepara a query para ser executada
                                    $stmt->execute(); // realiza a execução da query
                                    $resultado = $stmt->fetchAll(); // pega o resultado da execução da query
                                    
                                    foreach($resultado as $res){
                                            echo "<tr>";
                                            echo "<td><a href='../veiculo/consultarVeiculo.php?id={$res['id']}'>{$res['marca']}</a></td>";
                                        echo "<td><a href='../veiculo/consultarVeiculo.php?id={$res['id']}'>{$res['placa']}</a></td>";
//                                            echo "<td><a href='../veiculo/editarVeiculo.php?id=".$res['id']."'>Editar<a/></td>";
//                                            echo "<td><a href='../veiculo/deletarVeiculo.php?id=".$res['id']."' class=''>Excluir<a/></td>";
                                            echo "</tr>";
                                        }
                                ?> 
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