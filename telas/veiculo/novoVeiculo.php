<?php
    include '../../includes/verificaSeLogado.php';
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
    <title>Cadastrar veiculo</title>
</head>
<body>
<header>
    <?php

    include_once "../layout/menu.php";

    ?>
</header>
<div class="row-2">
        <div class="header-usuario col-sm-12">
            <h1 class="col-6 offset-3 text-center">Novo veiculo</h1>
        </div>
    </div>
    <div class="row">
        <div class="formulario col-sm-4 offset-4">
            <form>  
            <div class="form-group">
                <label for="id_veiculo"><strong>idVeiculo</strong></label>
                <input type="number" class="form-control" name="id_veiculo" id="id_veiculo" placeholder="Id do veiculo:">
            </div>
            <div class="form-group">
                <label for="data_cadastro"><strong>Data de cadastro</strong></label>
                <input type="date" class="form-control" name="data_cadastro" id="data_cadastro">
            </div>
            <div class="form-group">
                <label for="proprietario" ><strong>Proprietario</strong></label>
                <input type="text" class="form-control" name="proprietario" id="proprietario" placeholder="Nome do proprietário:">
            </div>
            <div class="form-group">
                <label for="modelo"><strong>Modelo</strong></label>
                <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo:">
            </div>
            <div class="form-group">
                <label for="marca"><strong>Marca</strong></label>
                <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca:">
            </div>
            <div class="form-group">
                <label for="modeloAno"><strong>Ano</strong></label>
                <input type="text" class=" form-control" name="modeloAno" id="modeloAno" placeholder="Ano">
            </div>
            <div class="form-group">
                <label for="tamanho_roda" class="col-sm-6"><strong>Tam. Roda</strong></label>
                <input type="number" class="form form-control form-control-sm col-sm-6" name="tamanho_roda" id="tamanho_roda">
            </div>
            <div class="form-group">
                <label for="placa"><strong>Placa</strong></label>
                <input type="text" class="form-control " name="placa" id="placa" placeholder="Placa:">
            </div> 
            <div class="form-group">
                <label for="chassis"><strong>Chassis</strong></label>
                <input type="text" class="form-control" name="chassis" id="chassis" placeholder="Chassis:">
            </div>
            </form>
        </div>
        <div class="options-buttons col-sm-2">
            <div class= "row">
                <div class="col-sm-12">
                    <button class="btn btn-danger btn-lg btn-block"data-toggle="modal" data-target="#salvar">Salvar</button>                          
                        <div class="modal" id= "salvar" tabindex="-1" role="dialog">
                            <div class= "modal-dialog" role="document">
                                <div class= "modal-content">
                                    <div class="modal-header">
                                        <h5 class= "modal-title">Salvar</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Salvo com sucesso!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>                
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    
                    <br>
                </div>
                <div class="col-sm-12">
                  <a href="../veiculo/novoVeiculo.php"><button class="btn btn-danger btn-lg btn-block">Cancelar</a></button>
                </div>
            </div>
        </div>      
    </div>     
        
        
</body>
</html>