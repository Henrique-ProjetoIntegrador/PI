
<?php
    include '../../includes/verificaSeLogado.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/menu.css"/>
    <link rel="stylesheet" href="../../styles/novoUsuario.css"/>
    <link rel="stylesheet" href="../alerts/modal.css">

    <title>Novo Usuário</title>
</head>
<body>
<header>
<?php

    include_once "../layout/menu.php";

?>
</header> 
    <div class="row-2">
        <div class="header-usuario col-sm-12">
            <h1 class="col-6 offset-3 text-center">Novo Usuário</h1>
        </div>
    </div>
    <form method="POST"action="processaNovoUsuario.php"> 
    <div class="row">       
        <div class="formulario col-sm-4 offset-4">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" class="form-control" id="nome" aria-describedby="nome" placeholder="Digite o nome">
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
                </div>
                <div class="form-group">
                    <label for="categoria" class=col-sm-3>CATEGORIA:</label>
                    <select class="form-control" name="funcao" id="categoria">
                        <option>Selecione uma opção</option>
                        <option>Administrador</option>
                        <option>Mecânico</option>  
                    </select> 
                </div>

                

                <?php

                // o que eu fiz, ao invez de criar a classe do alerta varias vezes la na session
                //isset, verifica se o que esta dentro do isset(aqui) existe ou nao, se sim retorna True,
                // se nao retorna False
                // e se True ele vai executar o echo $_SESSION['erroCampos'];
                // se nao, ele nao vai executa nada 
                // agr para nao fica aparecendo a mensagfem sempre, vc precisa elminar essa sessão
                // usando o unset

                // no caso aqui, e com isso eu apenas recebo a mensagem do erro que da, ja com a class do alerta pronto
                // blz amor, tem alguma duvisa?, preciso volta a trabalhar ja voltooooooooooooooooooooooooooooooooooooooooooo
                    if(isset($_SESSION['erroCampos'])){
                        // criando a classe alerta
                        echo "<div class='alert alert-danger'>";
                            //mensagem que vai estar no alerta sacou brow?
                            echo $_SESSION['erroCampos'];
                        echo "</div>";
                        // fechando o div da class alerta
                        unset($_SESSION['erroCampos']);
                    }
                    // apenas isso ja vai fazer com que mostra a mensagem caso os campos estejam vazios
                    // mas antes é precisa verificar se essa sessao existe, no caso criar uma condição
                    // para verificar isso
                ?>          
        </div>
        <div class="options-buttons col-sm-2">
            <div class= "row">
                <div class="col-sm-12">
                    <button type="submit"class=" btn btn-danger btn-lg btn-block">Salvar</button>                          
                    <br>
                </div>
                <div class="col-sm-12">
                    <button type= "button"class="btn btn-danger btn-lg btn-block">Cancelar</button>
                </div>
            </div>
        </div>      
    </div> 
        </form> 
                    <!-- <div class="modal" id= "salvar" tabindex="-1" role="dialog">
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
                 
                     -->
                       
        
        
</body>
</html>