<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/novoVeiculo.css">
    <title>Cadastrar veiculo</title>
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
            <h1 class="col-6 offset-3 text-center">Novo Veiculo</h1>
        </div>
        <div class="group-veiculo col-sm-12">
            <div class="row">
                <div class="campos col-sm-8">
                    <div class="container">
                        <div class="row">
                            <div class="idVeiculo col-sm-6">
                                <div class="row">
                                <label for="id_veiculo" class="col-sm-4"><strong>idVeiculo</strong></label>
                                    <input type="number" class="form form-control form-control-sm col-sm-8" name="id_veiculo" id="id_veiculo" placeholder="Id do veiculo:">
                                </div>
                            </div>
                            <div class="dataCadastro col-sm-6">
                                <div class="row">
                                    <label for="data_cadastro" class="col-sm-6"><strong>Data de cadastro</strong></label>
                                    <input type="date" class="form form-control form-control-sm col-sm-6" name="data_cadastro" id="data_cadastro">
                                </div>
                            </div>
                            <div class="proprietario col-sm-12">
                                <div class="row">
                                    <label for="proprietario" class="col-sm-2"><strong>Proprietario</strong></label>
                                    <input type="text" class="form form-control form-control-sm col-sm-10" name="proprietario" id="proprietario" placeholder="Nome do proprietário:">
                                </div>
                            </div>
                            <div class="modelo col-sm-6">
                                <div class="row">
                                    <label for="modelo" class="col-sm-4"><strong>Modelo</strong></label>
                                    <input type="text" class="form form-control form-control-sm col-sm-8" name="modelo" id="modelo" placeholder="Modelo:">
                                </div>
                            </div>
                            <div class="marca col-sm-6">
                                <div class="row">
                                    <label for="marca" class="col-sm-4"><strong>Marca</strong></label>
                                    <input type="text" class="form form-control form-control-sm col-sm-8" name="marca" id="marca" placeholder="Marca:">
                                </div>
                            </div>
                            <div class="modeloAno col-sm-4">
                                <div class="row">
                                    <label for="modeloAno" class="col-sm-6"><strong>Ano</strong></label>
                                    <input type="text" class="form form-control form-control-sm col-sm-6" name="modeloAno" id="modeloAno" placeholder="Ano">
                                </div>
                            </div>
                            <div class="tamanhoRoda col-sm-4">
                                <div class="row">
                                    <label for="tamanho_roda" class="col-sm-6"><strong>Tam. Roda</strong></label>
                                    <input type="number" class="form form-control form-control-sm col-sm-6" name="tamanho_roda" id="tamanho_roda">
                                </div>
                            </div>
                            <div class="placa col-sm-4">
                                <div class="row">
                                    <label for="placa" class="col-sm-4"><strong>Placa</strong></label>
                                    <input type="text" class="form form-control form-control-sm col-sm-8" name="placa" id="placa" placeholder="Placa:">
                                </div>
                            </div>
                            <div class="chassis col-sm-6">
                                <div class="row">
                                    <label for="chassis" class="col-sm-4"><strong>Chassis</strong></label>
                                    <input type="text" class="form form-control form-control-sm col-sm-8" name="chassis" id="chassis" placeholder="Chassis:">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option col-3 offset-1">
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-danger btn-lg btn-block"> Salvar </button>
                            <br>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-danger btn-lg btn-block">Cancelar</button>
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