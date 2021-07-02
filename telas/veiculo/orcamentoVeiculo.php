<?php
   include '../../includes/verificaSeLogado.php';
    include '../../includes/redireciona.php';
    require '../../Classes/Conexao.php';
    require '../../Classes/Veiculo.php';
    $conteudo = new Veiculo($mysql);
    $orcamentos = $conteudo->buscaOrcamentosPorVeiculo($_GET['id']);
    $veiculo = $conteudo->consultaVeiculoPorId($_GET['id']);    
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
                        <input type="text" class="form form-control form-control-sm" value="<?php echo $veiculo['modelo'];echo " ("; echo $veiculo['placa']; echo ")"; ?>" disabled>
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
                            <th style="width: 300px">Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orcamentos as $orcamento): ?>
                                <?php $inf_orcamento = $conteudo->consultaListaOrcamentos($orcamento['id']); ?>
                                <tr>                                    
                                    <td scope="row"><a href="consultaOrcamento.php?id=<?php echo $orcamento['id'] ?>"><?php echo $inf_orcamento['id_orcamento'] ?></a></td>
                                    <td scope="row"><a href="consultaOrcamento.php?id=<?php echo $orcamento['id'] ?>"><?php echo date('d/m/Y',strtotime($inf_orcamento['data_cadastro'])) ?></a></td>
                                    <td><a href="consultaOrcamento.php?id=<?php echo $orcamento['id'] ?>"><?php echo $inf_orcamento['mecanico'] ?></a></td>
                                    <td><a href="consultaOrcamento.php?id=<?php echo $orcamento['id'] ?>">R$ <?php echo round($inf_orcamento['valor'], 2) ?></a></td>
                                </tr>   
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="option col-3 offset-1">
                        <div class="row">                            
                            <div class="col-12">
                                <a href="consultarVeiculo.php?id=<?php echo $_GET['id'] ?>"><button class="btn btn-danger btn-lg btn-block"> Voltar </button></a>
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