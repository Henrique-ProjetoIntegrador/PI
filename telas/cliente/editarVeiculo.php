<?php
    include '../../includes/verificaSeLogado.php';
    include '../../includes/redireciona.php';
    require '../../Classes/Conexao.php';
    require '../../Classes/Cliente.php';
    $conteudo = new Cliente($mysql);
    $veiculo = $conteudo->consultaVeiculoClientePorId($_GET['id']);
    
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['modelo']==''||$_POST['marca']==''||$_POST['ano']==''||$_POST['placa']==''||$_POST['chassis']==''){
            $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';                              
        } else {
            $conteudo->editarVeiculoCliente($_POST['id'],$_POST['modelo'],$_POST['marca'],$_POST['ano'],$_POST['placa'],$_POST['chassis']);
            $endereco = "veiculoCliente.php?id=";
            $endereco .=  $veiculo['id_clientes'];
            redireciona($endereco);
        }   
     }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/novoVeiculo.css">
    <link rel="stylesheet" href="../alerts/modal.css">
    <title>Editar Veículo</title>
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
        <form method="POST" action="">
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
                <input type='text' class='form-control' name='id' id='id_cliente' value='<?php echo $veiculo['id']; ?>' hidden>
                                
                <div class="form-group">
                    <label for="modelo"><strong>Modelo:</strong></label>
                    <input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo $veiculo['modelo']; ?>" placeholder="Modelo">
                </div>
                <div class="form-group">
                    <label for="marca"><strong>Marca:</strong></label>
                    <input type="text" class="form-control" name="marca" id="marca" value="<?php echo $veiculo['marca']; ?>" placeholder="Marca">
                </div>
                <div class="form-group">
                    <label for="ano"><strong>Ano:</strong></label>
                    <input type="text" class=" form-control" name="ano" id="ano" value="<?php echo $veiculo['ano']; ?>" placeholder="Ano">
                </div>
            
                <div class="form-group">
                    <label for="placa"><strong>Placa:</strong></label>
                    <input type="text" class="form-control " name="placa" id="placa" value="<?php echo $veiculo['placa']; ?>" placeholder="Placa">
                </div> 
                <div class="form-group">
                    <label for="chassis"><strong>Chassis:</strong></label>
                    <input type="text" class="form-control" name="chassis" id="chassis" value="<?php echo $veiculo['chassis']; ?>" placeholder="Chassis">
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
                        <button type="submit" class=" btn btn-danger btn-lg btn-block">Salvar</button>
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <a href ="veiculoCliente.php?id=<?php echo $veiculo['id_clientes'] ?>"><button type= "button" class="btn btn-danger btn-lg btn-block">Voltar</button></a>
                    </div>
                </div>
            </div>      
        </div> 
        </form> 
    </div>   
</body>
</html>