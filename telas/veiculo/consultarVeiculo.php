<?php
    include '../../includes/verificaSeLogado.php';
    include '../../includes/redireciona.php';
    require '../../Classes/Conexao.php';
    require '../../Classes/Veiculo.php';
    $conteudo = new Veiculo($mysql);    
    $veiculo = $conteudo->consultaVeiculoPorId($_GET['id']);
    $proprietario = $conteudo->consultaClientePorId($veiculo['id_clientes']);

     if($_SERVER['REQUEST_METHOD'] === 'POST'){       
        $conteudo->removerVeiculo($_GET['id']);
        redireciona('index.php');          
     }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/ccsFIlter/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-select.css">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>    
    <link rel="stylesheet" href="../alerts/modal.css">
    <link rel="stylesheet" href="../../styles/novoVeiculo.css">
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
                <h2 class="col-6 offset-2 text-center">Novo Veículo</h2>
            </div>
        </div>
        
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">           
                <div class="form-group">
                    <label for="proprietario"><strong>Proprietário:</strong></label>                    
                    <input type="text" class="form-control" name="modelo" id="proprietario" value="<?php echo $proprietario['nome']; ?> " disabled>
                </div>
                <div class="form-group">
                    <label for="data-cadastro"><strong>Data de Cadastro:</strong></label>                    
                    <input type="text" class="form-control" name="modelo" id="data-cadastro" value="<?php echo $veiculo['data_cadastro']; ?> " disabled>
                </div>                   
                <div class="form-group">
                    <label for="modelo"><strong>Modelo:</strong></label>
                    <input type="text" name="id" value="<?php echo $veiculo['id']; ?>" hidden>
                    <input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo $veiculo['modelo']; ?> " placeholder="Modelo" disabled >
                </div>
                <div class="form-group">
                    <label for="marca"><strong>Marca:</strong></label>
                    <input type="text" class="form-control" name="marca" id="marca" value="<?php echo $veiculo['marca']; ?> " placeholder="Marca" disabled>
                </div>
                <div class="form-group">
                    <label for="ano"><strong>Ano:</strong></label>
                    <input type="text" class=" form-control" name="ano" id="ano" value="<?php echo $veiculo['ano']; ?> " placeholder="Ano" disabled>
                </div>
            
                <div class="form-group">
                    <label for="placa"><strong>Placa:</strong></label>
                    <input type="text" class="form-control " name="placa" id="placa" value="<?php echo $veiculo['placa']; ?> " placeholder="Placa" disabled>
                </div> 
                <div class="form-group">
                    <label for="chassis"><strong>Chassis:</strong></label>
                    <input type="text" class="form-control" name="chassis" id="chassis" value="<?php echo $veiculo['chassis']; ?> " placeholder="Chassis" disabled>
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
                        <a href="editarVeiculo.php?id=<?php echo $veiculo['id'] ?>"><button type="button" class=" btn btn-danger btn-lg btn-block">Editar</button></a>
                        <br>
                    </div>                    
                    <div class="col-sm-12">
                        <a href="orcamentoVeiculo.php?id=<?php echo $veiculo['id'] ?>"><button type="button" class=" btn btn-danger btn-lg btn-block">Orçamentos</button></a>
                        <br>
                    </div>
                    
                    <div class="col-sm-12">
                        <form action="" method="POST">                        
                            <button type="submit" class=" btn btn-danger btn-lg btn-block">Remover</button>
                            <br>
                        </form>
                    </div>
                    
                    <div class="col-sm-12">
                        <a href ="index.php"><button type= "button" class="btn btn-danger btn-lg btn-block">Voltar</button></a>
                    </div>
                </div>
            </div>      
        </div> 
        
    </div> 
</body>
</html>