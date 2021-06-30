<?php
    include '../../includes/verificaSeLogado.php';
    include '../../includes/redireciona.php';
    require '../../Classes/Conexao.php';
    require '../../Classes/Cliente.php';
    $conteudo = new Cliente($mysql);
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['nome']==''||$_POST['cpf']==''||$_POST['nascimento']==''||$_POST['endereco']==''||$_POST['telefone']==''||$_POST['celular']==''){
            $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
            redireciona('novoClientes.php');           
        } else {
            $conteudo->cadastraNovoCliente($_POST['nome'],$_POST['cpf'],$_POST['nascimento'],$_POST['endereco'],$_POST['telefone'],$_POST['celular']);
            redireciona('index.php');
        }   
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
    <link rel="stylesheet" href="../../styles/novoClientes.css"/>
    <link rel="stylesheet" href="../alerts/modal.css"/>


    <title>Novo Cliente</title>
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
                <h2 class="col-6 offset-2 text-center">Novo Cliente</h2>
            </div>
        </div>
        <form method="POST"action="novoClientes.php">  
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
                <div class="form-group">
                    <label for="nome-cliente">Nome do cliente:</label>
                    <input type= "text" class="form-control" name="nome" id="nome" placeholder="Insira o nome">
                </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Insira o CPF">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type ="number" class="form-control" name="telefone" id="telefone" placeholder="(DDD)x xxxx-xxxx">
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type ="number" class="form-control" name="celular" id="celular" placeholder="(DDD)x xxxx-xxxx">
            </div>
            <div class="form-group">
                <label for="nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" name="nascimento" id="nascimento" placeholder="Insira a data">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Insira o endereço">
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
                        <button type="submit"class=" btn btn-danger btn-lg btn-block">Salvar</button>                          
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <a href ="../cliente/index.php"><button type= "button"class="btn btn-danger btn-lg btn-block">Voltar</a></button>
                    </div>
                </div>
            </div>      
        </div> 
        </form> 
    </div>   
</body>
</html>