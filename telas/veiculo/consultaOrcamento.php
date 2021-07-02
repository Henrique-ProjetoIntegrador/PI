<?php
   include '../../includes/verificaSeLogado.php';
    include '../../includes/redireciona.php';
    require '../../Classes/Conexao.php';
    require '../../Classes/Veiculo.php';
    $conteudo = new Veiculo($mysql);
    $template_orcamento = $conteudo->preparaTemplateOrcamentoPorId($_GET['id']);
    $lista_itens = $conteudo->criaListaParaExibirOrcamentoPorId($_GET['id']); 
    $id_veiculo;   
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/print.css" media="print" />
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
                <h1 class="col-6 offset-3 text-center">Orçamento</h1>
            </div>

            <div class="veiculo col-sm-12">
                <div class="row">
                    <p class="info-orcamento"><strong>Código:</strong> <?php echo $template_orcamento['id_orcamento'] ?></p>                    
                </div>
                <div class="row">
                    <p class="info-orcamento"><strong>Veículo:</strong>  <?php echo $template_orcamento['modelo_carro'];echo' (';echo $template_orcamento['placa_carro'];echo ")"; ?></p>
                    <p class="info-orcamento"><strong>Proprietário:</strong>  <?php echo $template_orcamento['nome_cliente'] ?></p>
                    <p class="info-orcamento"><strong>Odometro:</strong>  <?php echo $template_orcamento['odometro_carro'] ?></p>
                </div>
                <div class="row">
                    <p class="info-orcamento"><strong>Mecânico:</strong>  <?php echo $template_orcamento['mecanico'] ?></p>
                    <p class="info-orcamento"><strong>Data cadastro:</strong>  <?php echo date('d/m/Y',strtotime($template_orcamento['data_cadastro'])) ?></p>
                </div>
                
            </div>

            <div class="group-veiculo col-sm-12">
                <div class="row">
                    <table class="table table-hover table-striped text-center col-sm-8">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 300px">Qtd</th>                            
                            <th style="width: 300px">Descrição</th>
                            <th style="width: 300px">Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista_itens as $item): ?> 
                                <?php $id_veiculo= $item['id_veiculo'] ?>                               
                                <tr>                                    
                                    <td scope="row"><?php echo $item['qtd'] ?></td>
                                    <td scope="row"><?php echo $item['descricao'] ?></td>
                                    <td scope="row"><?php echo $item['valor'] ?></td>  
                                                                      
                                </tr>                                
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="option col-3 offset-1">
                        <div class="row">                            
                            <div class="col-12">
                                <button class="btn btn-danger btn-lg btn-block" onClick="window.print()"> Imprimir </button>
                                <br>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-12">
                                <a href="orcamentoVeiculo.php?id=<?php echo $id_veiculo ?>"><button class="btn btn-danger btn-lg btn-block"> Voltar </button></a>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p class="info-orcamento"><strong>Total:</strong> R$  <?php echo $template_orcamento['valor_total'] ?>,00</p>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>