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

            <div class="group-Clientes col-sm-12">
                <div class="row">
                    <table class="table table-hover table-striped text-center col-sm-8">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 600px">Usuários</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Luiz de Oliveira</th>
                            
                        </tr>
                        <tr>
                            <th scope="row">Ozeias da Silva</th>
                            
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