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
    <link rel="stylesheet" href="testeModal/../modal.css">
  

    <title>Alerts</title>
</head>
<body>
    <!-- Alerta de remover clientes -->
    <button type= "button"class="btn btn-danger "data-toggle="modal" data-target="#testeModal"> 
        REMOVER
    </button>

    <div class="modal"id= "testeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog"role="document">
            <div class="modal-content">    
                <div class="modal-header">
                    <h5 class="modal-title">Remover</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Tem certeza que deseja remover?</p>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Remover</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- Alerta de Confirmação de exclusão de clientes-->
    <button type= "button"class="btn btn-danger "data-toggle="modal" data-target="#testeModal4"> 
    REMOVER 
    </button>
    <div class="modal" id= "testeModal4" tabindex="-1" role="dialog">
        <div class= "modal-dialog" role="document">
            <div class= "modal-content">
                <div class="modal-header">
                    <h5 class= "modal-title">Remover</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Removido com sucesso!</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>                
                </div>
            </div>
        </div>
    </div>
    <br>


    <!-- Alerta de Confirmação ao Salvar-->
    <button type= "button"class="btn btn-danger "data-toggle="modal" data-target="#testeModal2">
    SALVAR
    </button> 
    <div class="modal" id= "testeModal2" tabindex="-1" role="dialog">
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>                
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Alerta de confirmação ao editar -->
    <button type= "button"class="btn btn-danger "data-toggle="modal" data-target="#testeModal3"> 
        EDITAR
    </button>
    <div class="modal" id= "testeModal3" tabindex="-1" role="dialog">
        <div class= "modal-dialog" role="document">
            <div class= "modal-content">
                <div class="modal-header">
                    <h5 class= "modal-title">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Editado com sucesso!</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>                
                </div>
            </div>
        </div>
    </div>

</body>
</html>