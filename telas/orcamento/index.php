<?php
include '../../includes/verificaSeLogado.php';
include '../../Classes/Veiculo.php';
include '../../Classes/Usuario.php';
include '../../Classes/Categoria.php';
include '../../Classes/Orcamento.php';
include '../../Classes/Pecas.php';
require '../../Classes/Conexao.php';
include_once '../../includes/connectDb.php';
$conn = getConnection();
$veiculo = new Veiculo($mysql);
$usuario = new Usuario($mysql);
$categoria = new Categoria($conn);
$orcamento = new Orcamento($conn);
$pecas = new Pecas($conn);

$id_orcamento = $orcamento->saveOcorrencia($_POST);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/print.css" media="print" />
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
<h1 class="col-6 offset-3 text-center novo-orcamento">NOVO ORÇAMENTO</h1>
<h1 class="col-6 offset-3 text-center ordem-servico">ORDEM DE SERVIÇO</h1>
<br>
<form class="formularios" method="POST">
    <?php
        if (!empty($id_orcamento)){
            echo "<input name='id_orcamento' value='{$id_orcamento}' hidden>";
            $listaPecas = $orcamento->getListPeca($id_orcamento);
            $totalPrice = $orcamento->getTotalPrice($id_orcamento);
        }
    ?>
    <div id="areas">
        <div class="container">
            <div class="row">
                <div class="campos col-sm-8 text-center">
                    <div class="campos-input">
                        <div class="row">
                            <label for="veiculo" class="col-sm-3">Veículo</label>
                            <select name="veiculo" id="veiculo"  class="form  form-control form-control-sm col-sm-5" onchange="this.form.submit()">
                                <?php
                                $resultado = $veiculo->consultaTodosVeiculos();
                                $value = "";
                                foreach ($resultado as $res) {
                                    if (isset($_POST['veiculo'])){
                                        echo ($_POST['veiculo'] == $res['id'] ? "<option value='{$res['id']}' selected>{$res['modelo']} - {$res['placa']}</option>" : "<option value='{$res['id']}'>{$res['modelo']} - {$res['placa']}</option>");
                                    }else{
                                        echo "<option value='{$res['id']}'>{$res['modelo']} - {$res['placa']}</option>";
                                    }

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
                                   type="text" value="<?php echo(isset($_POST['odometro']) ? $_POST['odometro'] : "") ?>"/>
                        </div>
                    </div>
                    <div class="campos-input">
                        <div class="row">
                            <label for="usuario" class="col-sm-3">Mecanico</label>
                            <select name="usuario" id="usuario" class="form  form-control form-control-sm col-sm-5"
                                    onchange="this.form.submit()">
                                <?php
                                $resultado = $usuario->consultaTodosUsuarios();
                                foreach ($resultado as $res) {
                                    if (isset($_POST['usuario'])){
                                        echo ($_POST['usuario'] == $res['id'] ? "<option value='{$res['id']}' selected>{$res['login']}</option>" : "<option value='{$res['id']}'>{$res['login']}</option>");
                                    }else{
                                        echo "<option value='{$res['id']}'>{$res['login']}</option>>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="option col-3 offset-1">
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="save" id="save" value=true class="btn btn-danger btn-lg btn-block">Salvar</button>
                            <br>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-danger btn-lg btn-block" onClick="window.print()"> Emitir O.S </button>
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
                                <th style="width: 320px" class="orcamento">Confirmar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (isset($listaPecas)){
                                    foreach ($listaPecas as $peca){
                                        echo "<tr>";
                                            echo "<td>{$peca['qtd']}</td>";
                                            echo "<td>{$peca['name']}</td>";
                                            echo "<td>{$peca['nome']}</td>";
                                            echo "<td>{$peca['valor']}</td>";
                                            echo "<td>
                                                    <button type='submit' class='btn btn-danger btn-block orcamento' name='delete' id='delete' value='{$peca['id_peca']}'>Remover</button>
                                                  </td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                            <tr>
                                <td><input type="text" class="form-control orcamento" name="qtd" value="<?php echo (isset($_POST['qtd']) ? $_POST['qtd'] : "")?>"></td>
                                <td>
                                    <select name="id_categoria" id="id_categoria" class="form-control orcamento" onchange="this.form.submit()">
                                    <?php
                                    $resultado = $categoria->getCategoria();
                                    foreach ($resultado as $res) {
                                        if (isset($_POST['id_categoria'])){
                                            echo ($_POST['id_categoria'] == $res['id'] ? "<option value='{$res['id']}' selected>{$res['name']}</option>" : "<option value='{$res['id']}'>{$res['name']}</option>");
                                        }else{
                                            echo "<option value='{$res['id']}'>{$res['name']}</option>>";
                                        }
                                    ?>

                                    <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pecas" id="pecas" class="form-control orcamento" onchange="this.form.submit()">
                                        <option>Selecionar peça</option>
                                        <?php
                                        if (isset($_POST['id_categoria'])){
                                            $resultado = $pecas->getPecasOfCategoria($_POST['id_categoria']);
                                            $preco = "";
                                            foreach ($resultado as $res) {
                                                if (isset($_POST['pecas'])) {
                                                    echo($_POST['pecas'] == $res['id'] ? "<option value='{$res['id']}' selected>{$res['nome']}</option>" : "<option value='{$res['id']}'>{$res['nome']}</option>");
                                                } else {
                                                    echo "<option value='{$res['id']}'>{$res['nome']}</option>>";
                                                }
                                            }

                                            if (isset($_POST['pecas'])){
                                                $preco = $pecas->getValorOfIdPecas($_POST['id_categoria'], $_POST['pecas']);
                                            }


                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="preco" id="preco" value="<?php echo (isset($preco[0]['preco']) ? $preco[0]['preco'] : "") ?>" class="form-control orcamento">
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-success btn-block orcamento" name="confirm" id="confirm" value=confirmar>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-sm-12">
                            <h3><?php echo (isset($totalPrice[0]['valor']) ?  "Total: R$ " . round($totalPrice[0]['valor'],2) : "") ?></h3>
                        </div>
                    </div
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($_POST['save']) == true ){ ?>
        <div class="modal" id= "salvar" tabindex="-1" role="dialog">
            <div class= "modal-dialog" role="document">
                <div class= "modal-content">
                    <div class="modal-header">
                        <h5 class= "modal-title">Novo orçamento</h5>
                    </div>
                    <div class="modal-body">
                        <p>Salvo com sucesso</p>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php"><button type="button" value="<?php echo $id_orcamento?>" class="btn btn-success">OK</button></a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready (function (){
                $('#salvar') .modal('show');
            });
        </script>
    <?php } ?>
</form>
<script>
    document.getElementById('filtro').addEventListener('change', function () {
        this.form.submit();
    });
</script>
</body>
</html>