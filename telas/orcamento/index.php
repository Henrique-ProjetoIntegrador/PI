<?php
include '../../includes/verificaSeLogado.php';
include '../../Classes/Veiculo.php';
include '../../Classes/Usuario.php';
include '../../Classes/Categoria.php';
include '../../Classes/Orcamento.php';
include_once '../../includes/connectDb.php';
$conn = getConnection();
$veiculo = new Veiculo($conn);
$usuario = new Usuario($conn);
$categoria = new Categoria($conn);
$orcamento = new Orcamento($conn);
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
    <link rel="stylesheet" href="../../styles/orcamento.css">
    <link rel="stylesheet" href="../alerts/modal.css">
    <title> Orçamentos</title>
</head>
<body>
<header>
    <?php
    include_once "../layout/menu.php";
    ?>
</header>
<h1 class="col-6 offset-3 text-center">NOVO ORÇAMENTO</h1>
<br>
<form method="POST">
    <div id="areas">
        <form class="formularios">
            <div class="container">
                <div class="row">
                    <div class="campos col-sm-8 text-center">
                        <div class="campos-input">
                            <div class="row">
                                <label for="veiculo" class="col-sm-3">Veículo</label>
                                <select name="veiculo" id="veiculo" class="form  form-control form-control-sm col-sm-5">
                                    <option hidden>Favor selecionar veiculo</option>
                                    <?php
                                    $resultado = $veiculo->getVeiculos();
                                    $value = "";
                                    foreach ($resultado as $res) {
                                        echo "<option value='{$res['modelo']} - {$res['placa']}'>{$res['modelo']} - {$res['placa']}</option>>";
                                    }
                                    echo $value;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="campos-input">
                            <div class="row">
                                <label for="odometro" class="col-sm-3">Odômetro</label>
                                <input class="form form-control form-control-sm col-sm-5" id="odometro" name="odometro"
                                       type="text" value="<?php echo(isset($_POST['maoe']) ? $_POST['maoe'] : "") ?>"/>
                            </div>
                        </div>
                        <div class="campos-input">
                            <div class="row">
                                <label for="usuario" class="col-sm-3">Mecanico</label>
                                <select name="usuarui" id="usuarui" class="form  form-control form-control-sm col-sm-5"
                                        onchange="this.form.submit()">
                                    <option hidden>Favor selecione mecanico</option>
                                    <?php
                                    $resultado = $usuario->getUsers();
                                    foreach ($resultado as $res) {
                                        echo "<option value='{$res['id']}'>{$res['login']}</option>>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="option col-3 offset-1">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-danger btn-lg btn-block">Salvar</button>
                                <br>
                            </div>
                            <div class="col-12">
                                <a href="../principal/index.php" class="btn btn-danger btn-lg btn-block">Cancelar</a>
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
                                <th style="width: 320px">QTD</th>
                                <th style="width: 320px">CATEGORIA</th>
                                <th style="width: 320px">PEÇA</th>
                                <th style="width: 320px">VLR</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="text" class="form-control" name="qtd"></td>
                                <td>
                                    <form class="form-inline left" method="POST">
                                        <select name="filtro" id="filtro" class="form-control" onchange="this.form.submit()>
                                        <?php
                                        $tipoBeneficiario = "";
                                        $selectedCategoria = "";
                                        $resultado = $categoria->getCategoria();
                                        foreach ($resultado as $res) {
                                        ?>
                                                <option value="<?php echo $res['name'] ?>"><?php echo $res['name'] ?></option>
                                        <?php } ?>
                                        </select>
                                        <?php echo $_POST['filtro']; ?>
                                    </form>
                                </td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    document.getElementById('filtro').addEventListener('change', function () {
        this.form.submit();
    });
</script>
</body>
</html>

<!-- <h1>NOVO CLIENTE</h1>
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
                                <a href="orcamentoSalvo.php" class="btn btn-danger btn-lg btn-block">Salvar</a>
                                <br>
                            </div>
                            <div class="col-12">
                                <a href="../principal/index.php" class="btn btn-danger btn-lg btn-block">Cancelar</a>
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
                                    <th style="width: 320px">QTD</th>
                                    <th style="width: 320px">DESCRIÇÃO</th>
                                    <th style="width: 320px">VALOR</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="option col-3 offset-1">
                            <div class="row">
                                <div class="col-12">
                                    <a href="./pecas/index.php" class="btn btn-danger btn-lg btn-block">Adicionar Item</a>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->