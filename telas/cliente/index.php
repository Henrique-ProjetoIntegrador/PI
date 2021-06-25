<?php
    include '../../includes/verificaSeLogado.php';
    include_once '../../includes/connectDb.php';
    $conn = getConnection(); //funcao existente no connectDb
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/menu.css"/>
    <link rel="stylesheet" href="../../styles/clientes.css"/>

    <title>CLIENTES</title>
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
                    <h2 class="text-center">Clientes Cadastrados</h2>
                </div>
                <div class="group-veiculos col-sm-6 offset-1">
                    <div class="row">
                        <div class="table-responsive">               
                            <table class="table table-striped text-center">
                                <thead class="thead-dark">
                                    <tr>                      
                                        <th scope="col">Nome</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col"colspan="2">Ação</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $query = "SELECT * FROM clientes;";
                                    $stmt = $conn->prepare($query); // prepara a query para ser executada
                                    $stmt->execute(); // realiza a execução da query
                                    $resultado = $stmt->fetchAll(); // pega o resultado da execução da query
                                    
                                    foreach($resultado as $res){
                                        echo "<tr>";
                                            echo "<td><a href='mostrarCliente.php?id=".$res['id']."'<a/>".$res['nome']."</td>";
                                            echo "<td>".$res['telefone']." </td>";
                                            echo "<td><a href='editarClientes.php?id=".$res['id']."'>Editar<a/></td>";
                                            echo "<td><a href='deletarClientes.php?id=".$res['id']."' class=''>Excluir<a/></td>";
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
                            <a href="novoClientes.php" class="btn btn-danger btn-lg btn-block">Novo</a>
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
            <div class="header-Clientes col-sm-8">
                <h1 class="col-6 offset-3 text-center">CLIENTES</h1>
            </div>

            <div class="group-Clientes col-sm-12">
                <div class="row">
                    <table class="table table-hover table-striped text-center col-sm-8">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 600px">Clientes</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Ozeias Antares</th>
                            
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            
                        </tr>
                        <tr>
                            <th scope="row"></th>
                           
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            
                        </tr>

                        </tbody>
                    </table>
                    <div class="option col-3 offset-1">
                        <div class="row">
                            <div class="col-12">
                                <a href="novoClientes.php" class="btn btn-danger btn-lg btn-block">Novo</a>
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
    <footer>

    </footer>


</body>
</html> -->