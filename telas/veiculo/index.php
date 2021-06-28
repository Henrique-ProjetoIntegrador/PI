<?php
include '../../includes/verificaSeLogado.php';
include_once '../../includes/connectDb.php';
include '../../Classes/Veiculo.php';
$conn = getConnection(); //funcao existente no connectDb
$veiculo = new Veiculo($conn);

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
    <link rel="stylesheet" href="../../styles/veiculo.css">
    <title>Veículos</title>
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
                <h2 class="text-center">Veículos Cadastrados</h2>
            </div>
            <div class="group-veiculos col-sm-6 offset-1">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Veículo</th>
                                <th scope="col">Placa</th>
                                <th scope="col" colspan="2">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $resultado = $veiculo->getVeiculos();
                            foreach ($resultado as $res) {
                                echo "<tr>";
                                echo "<td><a href='consultarVeiculo.php?id={$res['id']}'>{$res['marca']}</a></td>";
                                echo "<td><a href='consultarVeiculo.php?id={$res['id']}'>{$res['placa']}</a></td>";
                                echo "<td><a href='editarVeiculo.php?id=" . $res['id'] . "'>Editar<a/></td>";
                                echo "<td><a href='deletarVeiculo.php?id=" . $res['id'] . "' class=''>Excluir<a/></td>";
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
                        <a href="../cliente/novoVeiculo.php" class="btn btn-danger btn-lg btn-block">Novo</a>
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

<!-- <div class="container">
    <div class="row">
        <div class="header-veiculos col-sm-8">
            <h2 class="text-center">Veículos Cadastrados</h2>
        </div>

        <div class="group-veiculos col-sm-6 offset-1">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Veículo</th>
                                <th scope="col">Placa</th>
                                <th scope="col"colspan="2">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="option col-3 offset-1">
            <div class="row">
                <div class="col-12">
                    <a href="pesquisarVeiculo.php" class="btn btn-danger btn-lg btn-block">Pesquisar</a>
                    <br>
                </div>
                <div class="col-12">
                    <a href="novoVeiculo.php" class="btn btn-danger btn-lg btn-block">Novo</a>
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
</html> -->
<!-- </header>
<br>
    <div class="container">
        <div class="row">
            <div class="header-veiculo col-sm-8">
                <h1 class="col-6 offset-3 text-center">VEÍCULOS</h1>
            </div>

            <div class="group-veiculo col-sm-12">
                <div class="row">
                    <table class="table table-hover table-striped text-center col-sm-8">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 300px">Placa</th>
                            <th style="width: 300px">Veículo</th>
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
                    <div class="option col-3 offset-1">
                        <div class="row">
                            <div class="col-12">
                            <a href="pesquisarVeiculo.php"><button class="btn btn-danger btn-lg btn-block"> Pesquisar </a></button>
                                <br>
                            </div>
                            <div class="col-12">
                                <a href="novoVeiculo.php"><button class="btn btn-danger btn-lg btn-block"> Novo</a></button>
                                <br>
                            </div>
                            <div class="col-12">
                                <a href="../principal/index.php"><button class="btn btn-danger btn-lg btn-block"> Voltar</a></button>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- </body>
</html> -->