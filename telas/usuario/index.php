<?php
    include '../../includes/verificaSeLogado.php';
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/menu.css"/>
    <link rel="stylesheet" href="../../styles/usuario.css"/>

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
            <div class="header-Clientes col-sm-8">
                <h1 class="col-6 offset-3 text-center">USUÁRIOS</h1>
            </div>

            <div class="group-Clientes col-sm-5 offset-2">
                <div class="row">
                <div class="table-responsive">
                <table class="table table-striped">
                <thead class="thead-dark">
                        <tr>
                        
                        <th scope="col">ID</th>
                        <th scope="col">Login</th>
                        <th scope="col">Função</th>
                        <th scope="col"colspan="2" >Ação</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th> </th>
                        <td>Mark </td>
                        <td>Otto</td>
                        <td><a href="">editar</a></td>
                        <td><a href="">excluir</a></td>
                        </tr>

                        <tr>
                        <th></th> 
                        <td>Jacob</td>
                        <td>Thornton</td>
                        </tr>

        
                                             
                    </tbody>
                    </table>
                       
                    <div class="option col-3 offset-1">
                        <div class="row">
                            
                            <div class="col-12">
                                <a href="novoUsuario.php" class="btn btn-danger btn-lg btn-block">Novo</a>
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
</html>