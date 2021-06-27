<?php
    include '../../includes/verificaSeLogado.php';
    include_once '../../includes/connectDb.php';
    include '../../Classes/Veiculo.php';
    $conn = getConnection();
    $veiculo = new Veiculo($conn);
    if (isset($_GET['id'])) {
        $res = $veiculo->getVeiculoOfClient($_GET['id']);
        if (empty($res)){
            echo "Nenhum veiculo encontrado!";
            die();
        }
    }else{
        echo "Não foi possivel encontrar nenhuma veiculo, favor contactar o administrador do sistema";
        die();
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/consultaVeiculo.css">
    <title>Consulta Veiculo</title>
</head>
<body>
<header>
    <?php

    include_once "../layout/menu.php";

    ?>
</header>
<?php if ($res != "error"){ ?>
    <div class="container">
        <div class="row">
            <div class="header-veiculo col-sm-12">
                <h1 class="col-6 offset-3 text-center">Consulta Veiculo</h1>
            </div>
            <div class="group-veiculo col-sm-12">
                <div class="row">
                    <div class="campos col-sm-8">
                        <div class="container">
                            <div class="row">
                                <div class="dataCadastro col-sm-6">
                                    <div class="row">
                                        <label for="data_cadastro" class="col-sm-6"><strong>Data de cadastro</strong></label>
                                        <input type="date" class="form form-control form-control-sm col-sm-6" name="data_cadastro" id="data_cadastro" value="<?php echo $res[0][1]?>" disabled>
                                    </div>
                                </div>
                                <div class="proprietario col-sm-6">
                                    <div class="row">
                                        <label for="proprietario" class="col-sm-2"><strong>Dono</strong></label>
                                        <input type="text" class="form form-control form-control-sm col-sm-10" name="proprietario" id="proprietario" value="<?php echo $res[0]['nome']?>" disabled>
                                    </div>
                                </div>
                                <div class="modelo col-sm-6">
                                    <div class="row">
                                        <label for="modelo" class="col-sm-4"><strong>Modelo</strong></label>
                                        <input type="text" class="form form-control form-control-sm col-sm-8" name="modelo" id="modelo" value="<?php echo $res[0]['modelo']?>" disabled>
                                    </div>
                                </div>
                                <div class="marca col-sm-6">
                                    <div class="row">
                                        <label for="marca" class="col-sm-4"><strong>Marca</strong></label>
                                        <input type="text" class="form form-control form-control-sm col-sm-8" name="marca" id="marca" value="<?php echo $res[0]['marca']?>" disabled>
                                    </div>
                                </div>
                                <div class="modeloAno col-sm-4">
                                    <div class="row">
                                        <label for="modeloAno" class="col-sm-6"><strong>Ano</strong></label>
                                        <input type="text" class="form form-control form-control-sm col-sm-6" name="modeloAno" id="modeloAno" value="<?php echo $res[0]['ano']?>" disabled>
                                    </div>
                                </div>
                                <div class="tamanhoRoda col-sm-4">
                                    <div class="row">
                                        <label for="tamanho_roda" class="col-sm-6"><strong>Tam. Roda</strong></label>
                                        <input type="number" class="form form-control form-control-sm col-sm-6" name="tamanho_roda" id="tamanho_roda" value="13" disabled>
                                    </div>
                                </div>
                                <div class="placa col-sm-4">
                                    <div class="row">
                                        <label for="placa" class="col-sm-4"><strong>Placa</strong></label>
                                        <input type="text" class="form form-control form-control-sm col-sm-8" name="placa" id="placa" value="<?php echo $res[0]['placa']?>" disabled>
                                    </div>
                                </div>
                                <div class="chassis col-sm-6">
                                    <div class="row">
                                        <label for="chassis" class="col-sm-4"><strong>Chassis</strong></label>
                                        <input type="text" class="form form-control form-control-sm col-sm-8" name="chassis" id="chassis" value="<?php echo $res[0]['chassis']?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="option col-3 offset-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="<?php echo "editarVeiculo.php?id={$_GET['id']}"?>" class="btn btn-danger btn-lg btn-block">Editar</a>
                                <br>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-danger btn-lg btn-block">Orçamentos</button>
                                <br>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-danger btn-lg btn-block">Remover</button>
                                <br>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-danger btn-lg btn-block">Voltar</button>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php } ?>
</body>
</html>