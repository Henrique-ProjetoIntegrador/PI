<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/pesquisarVeiculo.css">
    <title>Pesquisar Veiculo</title>
</head>
<body>
<header>
    <?php

    include_once "../layout/menu.php";

    ?>
</header>
<div class="container">
    <div class="row">
        <div class="header-veiculo col-sm-12">
            <h1 class="col-6 offset-3 text-center">Veiculos</h1>
        </div>
        <div class="group-veiculo col-sm-12">
            <div class="row">
                <div class="campos col-sm-8">
                    <div class="container">
                        <div class="row">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Pesquisar por veiculo" aria-label="Pesquisar por veiculo" aria-describedby="basic-addon2" value="ABC-1234" id="veiculo" name="veiculo">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" id="buttonInput" type="button"><i class="fas fa-search fa-2x"></i></button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover table-striped text-center col-sm-12">
                            <thead class="thead-dark">
                            <tr>
                                <th style="width: 600px">Placa</th>
                                <th style="width: 600px">Veículo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">ABC-123</th>
                                <td>Renault Sandero</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="option col-3 offset-1">
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-danger btn-lg btn-block"> Pesquisar </button>
                            <br>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-danger btn-lg btn-block"> Novo </button>
                            <br>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-danger btn-lg btn-block"> Voltar </button>
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