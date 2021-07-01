<?php
    include '../../includes/verificaSeLogado.php';
include '../../Classes/Pecas.php';
include_once '../../includes/connectDb.php';
$conn = getConnection();
$pecas = new Pecas($conn);

$listPecas = $pecas->getAllPecas();
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
    <link rel="stylesheet" href="../../styles/pecas.css">
    <link rel="stylesheet" href="../../styles/menu.css"/>
    <link rel="stylesheet" href="../alerts/modal.css">
    <title>Peças</title>
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
                <div class="header-pecas col-sm-8">
                    <h2 class="text-center">Peças Cadastradas</h2>
                </div>
                <div class="group-pecas col-sm-6 offset-1">
                    <div class="row">
                        <div class="table-responsive">               
                            <table class="table table-striped text-center">
                                <thead class="thead-dark">
                                    <tr>                      
                                        <th scope="col">Nome</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Preço</th>
                                        <th scope="col">Qtd</th>
                                        <th scope="col"colspan="2">Ação</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        
                                        foreach($listPecas as $res){
                                            echo "<tr>";
                                                echo "<td>".$res['nome']." </td>";
                                                echo "<td>".$res['categoria']." </td>";
                                                echo "<td>".$res['preco']." </td>";
                                                echo "<td>".$res['qtd']." </td>";
                                                echo "<td><a href='editarPeca.php?id=".$res['id']."'>Editar<a/></td>";
                                                echo "<td><a href='deletarPeca.php?id=".$res['id']."' class=''>Excluir<a/></td>";
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
                            <a href="novaPeca.php" class="btn btn-danger btn-lg btn-block">Novo</a>
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
    </main>
</body>
</html>


    <!-- <main>
    <div class="container">
        <div class="row">
            <div class="header-Pecas col-sm-8">
                <h1 class="col-6 offset-3 text-center">PEÇAS</h1>
            </div>

            <div class="group-Pecas col-sm-12">
                <div class="row">        
        <table class="table table-hover table-striped text-center col-sm-8">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 600px">CATEGORIA</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Ar Condicionado</th>
                            
                        </tr>
                        <tr>
                            <th scope="row">Borracharia</th>
                            
                        </tr>
                        <tr>
                            <th scope="row">Direção</th>
                            
                        </tr>
                        <tr>
                            <th scope="row">Elétrica</th>
                           
                        </tr>
                        <tr>
                            <th scope="row">Freio</th>
                            
                        </tr>

                        </tbody>
                    </table>
                    <div class="option col-3 offset-1">
                        <div class="row">
                        <div class="col-12">
                                <a href="novaPeca.php" class="btn btn-danger btn-lg btn-block">Novo</a>
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
        </div>
    </div>
    </main>
</body>
</html> -->