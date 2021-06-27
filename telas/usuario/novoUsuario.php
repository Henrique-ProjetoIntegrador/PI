
<?php
     include '../../includes/verificaSeLogado.php';
     require '../../includes/Conexao.php';
     require '../../includes/ControlerSql.php';
     $conteudo = new Controler($mysql);
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['nome'] == "" || $_POST['senha'] == "" || $_POST['funcao']== ""){
            $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
            header('Location: novoUsuario.php');
        }
        $conteudo->cadastraNovoUsuario($_POST['nome'],$_POST['senha'],$_POST['funcao']);
     }
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
    <div class="container">
        <div class="row-2">
            <div class="header-usuario col-sm-12">
                <h2 class="col-6 offset-2 text-center">Novo Usuário</h2>
            </div>
        </div>
        <form method="POST"action="novoUsuario.php"> 
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
                    <div class="form-group">
                        <label for="nome">Login:</label>
                        <input type="text" name="nome" class="form-control" id="nome" aria-describedby="nome" placeholder="Digite o nome">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label for="categoria" class=col-sm-3>CATEGORIA:</label>
                        <select class="form-control" name="funcao" id="categoria">
                            <option hidden>Selecione uma opção</option>
                            <option>Administrador</option>
                            <option>Mecânico</option>  
                        </select> 
                    </div>
                    <?php
                       
                        if(isset($_SESSION['erroCampos'])&& $_SESSION['erroCampos'] != ''){
                            // criando a classe alerta
                            echo "<div class='alert alert-danger'>";
                                
                                echo $_SESSION['erroCampos'];
                            echo "</div>";
                            // fechando o div da class alerta
                            unset($_SESSION['erroCampos']);
                        }
                        // apenas isso ja vai fazer com que mostra a mensagem caso os campos estejam vazios
                        // mas antes é precisa verificar se essa sessao existe, no caso criar uma condição
                    
                    ?>          
            </div>
            <div class="options-buttons col-sm-2">
                <div class= "row">
                    <div class="col-sm-12">
                        <button type="submit"class=" btn btn-danger btn-lg btn-block">Salvar</button>                          
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <a href ="index.php"><button type= "button"class="btn btn-danger btn-lg btn-block">Voltar</button></a>
                    </div>
                </div>
            </div>      
        </div> 
        </form> 
    </div>   
</body>
</html>