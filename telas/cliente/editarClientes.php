<?php
    include '../../includes/verificaSeLogado.php';
    include_once '../../includes/connectDb.php';
    $conn = getConnection();
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
    <link rel="stylesheet" href="../alerts/modal.css">

    <title>Editar Cliente</title>
</head>
<body>
<header>
<?php

    include_once "../layout/menu.php";

?>
</header>

</header>
    <div class="container">
        <div class="row-2">
            <div class="header-veiculo col-sm-12">
                <h2 class="col-6 offset-2 text-center">Editar Clientes</h2>
            </div>
        </div>
        <form method="POST"action="atualizarClientes.php">  
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
            <?php
                    $sql = "SELECT * from clientes where id = '{$_GET['id']}'"; 
                    $stmt = $conn->prepare($sql); // prepara a query para ser executada
                    $stmt->execute(); // realiza a execução da query
                    $resultado = $stmt->fetchAll();

                    $nome = $resultado[0]['nome'];
                    $cpf = $resultado[0]['cpf'];
                    $data_cadastro = $resultado[0]['data_cadastro'];
                    $telefone = $resultado[0]['telefone'];
                    $celular = $resultado[0]['celular'];
                    $nascimento = $resultado[0]['nascimento'];
                    $endereco = $resultado[0]['endereco'];

                ?>

                <div class="form-group">
                <?php echo " <input type='text' name='id' class='form-control' id='id' value='{$_GET['id']}' hidden"?>
                    
                        <label for="nome-cliente">Nome do cliente:</label>
                        <?php echo " <input type='text' name='nome' class='form-control' id='nome'  value='{$nome}' placeholder='Insira o nome'>"?>
                </div>

                <div class="form-group">
                    <label for="data_cadastro">Data de Cadastro:</label>
                    <?php echo " <input type= 'date' name='data_cadastro' class='form-control' id='data_cadastro' value='{$data_cadastro}' placeholder ='Insira a data'>"?>  
                </div>
                
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <?php echo " <input type='text' name='cpf' class='form-control' id='cpf' value='{$cpf}' placeholder ='Insira o CPF'>"?> 
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <?php echo " <input type='tel' name='telefone' class='form-control' id='telefone' value='{$telefone}' placeholder ='Insira o telefone'>"?>
                </div>

                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <?php echo " <input type='tel' name='celular' class= 'form-control' id= 'celular' value='{$celular}' placeholder ='Insira o celular'>"?>
                </div>

                <div class="form-group">
                    <label for="nascimento">Data de Nascimento:</label>
                    <?php echo " <input type='date' name='nascimento' class= 'form-control' id='nascimento' value='{$nascimento}' placeholder='Insira a data de nascimento'>"?>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <?php echo " <input type ='text' name='endereco' class='form-control' id= 'endereco' value ='{$endereco}' placeholder 'Insira o endereço'>"?>
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
                        <a href ="../cliente/PesquisarCliente"><button type= "button"class="btn btn-danger btn-lg btn-block">Pesquisar</a></button>
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
