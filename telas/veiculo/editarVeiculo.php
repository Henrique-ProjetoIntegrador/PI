<?php
include '../../includes/verificaSeLogado.php';
include_once '../../includes/connectDb.php';
$conn = getConnection();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/novoVeiculo.css">
    <link rel="stylesheet" href="../alerts/modal.css">
    <title>Novo Veículo</title>
</head>
<body>
<header>
    <?php

    include_once "../layout/menu.php";

    ?>
</header>

<div class="container">
    <div class="row-2">
        <div class="header-veiculo col-sm-12">
            <h2 class="col-6 offset-2 text-center">Editar Veículo</h2>
        </div>
    </div>
    <form method="POST" action="atualizaVeiculo.php">
        <div class="row">
            <div class="formulario col-sm-6 offset-2">
                <?php
                $sql = "SELECT * from veiculo where id = '{$_GET['id']}'";
                $stmt = $conn->prepare($sql); // prepara a query para ser executada
                $stmt->execute(); // realiza a execução da query
                $resultado = $stmt->fetchAll();

                $data_cadastro = $resultado[0]['data_cadastro'];
                $modelo = $resultado[0]['modelo'];
                $marca = $resultado[0]['marca'];
                $ano = $resultado[0]['ano'];
                $placa = $resultado[0]['placa'];
                $chassis = $resultado[0]['chassis'];

                ?>

                <?php echo " <input type='text' name='id' class='form-control' id='id' value='{$_GET['id']}' hidden" ?>

                <div class="form-group">
                    <label for="data_cadastro"><strong>Data de cadastro</strong></label>
                    <?php echo " <input type='date' name='data_cadastro' class='form-control' id='data_cadastro'  value='{$data_cadastro}'" ?>
                </div>
                <div class="form-group">
                    <label for="modelo"><strong>Modelo:</strong></label>
                    <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" value="<?php echo $modelo?>">
                </div>
                <div class="form-group">
                    <label for="marca"><strong>Marca:</strong></label>
                    <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca" value="<?php echo $marca?>">
                </div>
                <div class="form-group">
                    <label for="ano"><strong>Ano:</strong></label>
                    <input type="text" class=" form-control" name="ano" id="ano" placeholder="Ano" value="<?php echo $ano?>">
                </div>

                <div class="form-group">
                    <label for="placa"><strong>Placa:</strong></label>
                    <input type="text" class="form-control " name="placa" id="placa" placeholder="Placa" value="<?php echo $placa?>">
                </div>
                <div class="form-group">
                    <label for="chassis"><strong>Chassis:</strong></label>
                    <input type="text" class="form-control" name="chassis" id="chassis" placeholder="Chassis" value="<?php echo $chassis?>">
                </div>
                <?php
                if(isset($_SESSION['erroCampos'])){
                    echo "<div class='alert alert-danger'>";
                    echo $_SESSION['erroCampos'];
                    echo "</div>";
                    unset($_SESSION['erroCampos']);
                }
                ?>
            </div>
            <div class="options-buttons col-sm-2">
                <div class= "row">
                    <div class="col-sm-12">
                        <button type="submit"class=" btn btn-danger btn-lg btn-block">Salvar</button>
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <a href ="index.php"><button type= "button" class="btn btn-danger btn-lg btn-block">Voltar</a></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
