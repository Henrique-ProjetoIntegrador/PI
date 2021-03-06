<?php
    include '../../includes/verificaSeLogado.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/orcamentoSalvo.css">
    <link rel="stylesheet" href="../alerts/modal.css">
    <title>Novo orçamento</title>
</head>
<body>
<header>
    <?php
    include_once "../layout/menu.php";
    ?>
</header>
<h1 class="col-6 offset-3 text-center">ORÇAMENTO</h1>
<br>
    <div id="areas"> 
        <form class="formularios">
            <div class="container">
                <div class="row">
                    <div class="campos col-sm-8 text-center">
                        <div class="campos-input">
                            <div class="row">
                                <label for="nuorcamento" class="message col-sm-3">N° ORÇ</label>
                                <input class="form form-control form-control-sm col-sm-5" id="nuorcamento" type="text" required/>
                            </div>
                        </div>
                        <div class="campos-input">
                            <div class="row">
                                <label for="emissaodate" class="col-sm-3">Data de emissão</label>
                                <input class="form form-control form-control-sm col-sm-5"   id="emissaodate" type="date" required/>
                            </div>
                        </div>
                        <div class="campos-input">
                            <div class="row">
                                <label for="veiculo" class="col-sm-3">Veículo</label>
                                <input class="form form-control form-control-sm col-sm-5"    id="veiculo" type="text" required/>
                            </div>
                        </div>
                        <div class="campos-input">
                            <div class="row">
                                <label for="placa" class="col-sm-3">Placa</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="placa" type="text" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="proprietario" class="col-sm-3">Proprietário</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="proprietario" type="text" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="odometro" class="col-sm-3">Odômetro</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="odometro" type="text" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="mecanico" class="col-sm-3">Mecânico</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="mecanico" type="text" required/>
                            </div>
                        </div>    
                    </div>
                    <div class="option col-3 offset-1">
                        <div class="row">
                        <div class="col-12">
                                <a href="novaPeca.php" class="btn btn-danger btn-lg btn-block">Emitir O.S</a>
                                <br>
                            </div>
                            <div class="col-12">
                                <a href="../principal/index.php" class="btn btn-danger btn-lg btn-block">Imprimir</a>
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
        </form>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="group-Pecas col-sm-12">
                    <div class="row">        
                        <table class="table table-hover table-striped col-sm-8">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 380px">QTD</th>
                                    <th style="width: 380px">DESCRIÇÃO</th>
                                    <th style="width: 380px">VALOR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">2</th>
                                    <th scope="row">Disco de Freio</th>
                                    <th scope="row">R$ 140,00</th>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <th scope="row">Par de pastihas de freio</th>
                                    <th scope="row">R$ 65,00</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>