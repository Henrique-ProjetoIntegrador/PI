<?php
    include '../../includes/verificaSeLogado.php';
    include '../../includes/redireciona.php';
    require '../../Classes/Conexao.php';
    require '../../Classes/Veiculo.php';
    $conteudo = new Veiculo($mysql);
    $clientes = $conteudo->consultaTodosClientes();
    $veiculo = $conteudo->consultaVeiculoPorId($_GET['id']);
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['modelo']==''||$_POST['marca']==''||$_POST['ano']==''||$_POST['placa']==''||$_POST['chassis']==''){
            $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';                              
        } else {
            $conteudo->editarVeiculoCliente($_POST['id'],$_POST['modelo'],$_POST['marca'],$_POST['ano'],$_POST['placa'],$_POST['chassis'],$_POST['id_cliente']);
            redireciona('index.php');
        }   
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
        <form method="POST" action="">
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">           
                <div class="proprietario">
                    <label for="basic"><strong>Proprietário:</strong></label>                    
                        <select id="basic" name="id_cliente" class="selectpicker show-tick form-control" data-live-search="true">
                            <?php foreach ($clientes as $cliente): ?>
                                <?php if($cliente['id']!='1'): ?>
                                    <option value="<?php echo $cliente['id']; ?>" 
                                    <?php if($veiculo['id_clientes'] == $cliente['id']){
                                        echo 'selected';
                                    } ?>                                    
                                    ><?php echo $cliente['nome']; ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>                    
                </div>          
                <div class="form-group">
                    <label for="modelo"><strong>Modelo:</strong></label>
                    <input type="text" name="id" value="<?php echo $veiculo['id']; ?>" hidden>
                    <input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo $veiculo['modelo']; ?> " placeholder="Modelo">
                </div>
                <div class="form-group">
                    <label for="marca"><strong>Marca:</strong></label>
                    <input type="text" class="form-control" name="marca" id="marca" value="<?php echo $veiculo['marca']; ?> " placeholder="Marca">
                </div>
                <div class="form-group">
                    <label for="ano"><strong>Ano:</strong></label>
                    <input type="text" class=" form-control" name="ano" id="ano" value="<?php echo $veiculo['ano']; ?> " placeholder="Ano">
                </div>
            
                <div class="form-group">
                    <label for="placa"><strong>Placa:</strong></label>
                    <input type="text" class="form-control " name="placa" id="placa" value="<?php echo $veiculo['placa']; ?> " placeholder="Placa">
                </div> 
                <div class="form-group">
                    <label for="chassis"><strong>Chassis:</strong></label>
                    <input type="text" class="form-control" name="chassis" id="chassis" value="<?php echo $veiculo['chassis']; ?> " placeholder="Chassis">
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
                        <a href ="index.php"><button type= "button" class="btn btn-danger btn-lg btn-block">Voltar</button></a>
                    </div>
                </div>
            </div>      
        </div> 
        </form> 
    </div>     
    <script src="../../js/bootstrap-select.js"></script>
    <script>
        function createOptions(number) {
            var options = [], _options;

            for (var i = 0; i < number; i++) {
                    var option = '<option value="' + i + '">Option ' + i + '</option>';
                    options.push(option);
                }

            _options = options.join('');
            
            $('#number')[0].innerHTML = _options;
            $('#number-multiple')[0].innerHTML = _options;


            $('#number2')[0].innerHTML = _options;
            $('#number2-multiple')[0].innerHTML = _options;
        }

        var mySelect = $('#first-disabled2');

        createOptions(4000);

        $('#special').on('click', function () {
            mySelect.find('option:selected').prop('disabled', true);
            mySelect.selectpicker('refresh');
        });

        $('#special2').on('click', function () {
            mySelect.find('option:disabled').prop('disabled', false);
            mySelect.selectpicker('refresh');
        });

        $('#basic2').selectpicker({
            liveSearch: true,
            maxOptions: 1
        });
    </script>
</body>
</html>