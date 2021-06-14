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
    <link rel="stylesheet" href="../../styles/orcamentoVeiculo.css">
    <title>Orçamento Veiculo</title>
</head>
<body>
<header>
    <?php

        include_once "../layout/menu.php";

    ?>
</header>
<br>
    <div class="container">
        <div class="row">
            <div class="header-veiculo col-sm-12">
                <h1 class="col-6 offset-3 text-center">Orçamento Veiculo</h1>
            </div>

            <div class="veiculo col-sm-12">
                <div class="row">
                    <div class="col-sm-1">
                        <label for="veiculo"><strong>Veiculo:</strong></label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form form-control form-control-sm" value="CORSA HETCH ABC-1234" disabled>
                    </div>
                </div>
            </div>

            <div class="group-veiculo col-sm-12">
                <div class="row">
                    <table class="table table-hover table-striped text-center col-sm-8">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 300px">COD</th>
                            <th style="width: 300px">Data</th>
                            <th style="width: 300px">Mecanico</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">001</th>
                            <th scope="row">14/11/2020</th>
                            <td>Ozeias da Silva</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="option col-3 offset-1">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-danger btn-lg btn-block"> Novo </button>
                                <br>
                            </div>
                            <div class="col-12">
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