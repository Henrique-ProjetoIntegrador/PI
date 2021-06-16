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
                            <th style="width: 600px">
                            <div class="campos-input">
                            <div class="row">
                                <label for="nome" class="col-sm-3">Nome da Peça</label>
                                <input class="form form-control form-control-sm col-sm-5" id="name" type="name" required/>
                            </div>
                            
                            <div class="row">
                                <label for="nome" class="col-sm-3">Categoria da Peça</label>
                            <select name="select">
                            <option value="valor1" selected>Selecione</option>
                            <option value="valor2" >Ar Condicionado</option>
                            <option value="valor3">Borracharia</option>
                            <option value="valor3">Direção</option>
                            <option value="valor3">Elétrica</option>
                            <option value="valor3">Freio</option>
                            <option value="valor3">Injeção</option>
                            <option value="valor3">Motor</option>
                            
                            </select>
                            </div>
                            </div>
                            </th>
                            
                        </tr>
                        </thead>
                        
                    </table>
                    <div class="option col-3 offset-1">
                        <div class="row">
                        <div class="col-12">
                        <button id="salvar" name="salvar" type="Submit" class="btn btn-danger btn-lg btn-block">Salvar</button>
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