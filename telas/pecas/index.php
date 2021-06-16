<?php
    include '../../includes/verificaSeLogado.php';
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
    <link rel="stylesheet" href="../../styles/pecas.css">
    <link rel="stylesheet" href="../../styles/menu.css"/>
    <title>Peças</title>
</head>
<body>
<header>
    <?php

        include_once "../layout/menu.php";

    ?>
</header>
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
</body>
</html>