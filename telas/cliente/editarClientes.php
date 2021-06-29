<?php
 include '../../includes/verificaSeLogado.php';
 include '../../includes/redireciona.php';
 require '../../Classes/Conexao.php';
 require '../../Classes/Cliente.php';
 $conteudo = new Cliente($mysql);
 $cliente = $conteudo->consultaClientePorId($_GET['id']);
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
     if($_POST['nome']==''||$_POST['cpf']==''||$_POST['nascimento']==''||$_POST['endereco']==''||$_POST['telefone']==''||$_POST['celular']==''){
         $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
         redireciona('novoClientes.php');           
     } else {
         $conteudo->editarCliente($_POST['id'],$_POST['data_cadastro'],$_POST['nome'],$_POST['cpf'],$_POST['nascimento'],$_POST['endereco'],$_POST['telefone'],$_POST['celular']);
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
            <h2 class="col-6 offset-2 text-center">Editar Cliente</h2>
        </div>
    </div>
    <form method="POST" action="editarClientes.php?id=<?php echo $cliente['id'] ?>">
        <div class="row">
            <div class="formulario col-sm-6 offset-2">            

                <div class="form-group">
                    <input type='text' name='id' class='form-control' id='id' value='<?php echo $cliente['id']; ?>' hidden>                  
                    <label for="nome-cliente">Nome do cliente:</label>
                    <input type='text' name='nome' class='form-control' id='nome'  value='<?php echo $cliente['nome']; ?>'>
                </div>

                <div class="form-group">
                    <label for="data_cadastro">Data de Cadastro:</label>
                    <input type= 'datetime'  class='form-control' id='data_cadastro' value='<?php echo $cliente['data_cadastro']; ?>' disabled>
                    <input type='text' name='data_cadastro' class='form-control' id='id' value='<?php echo $cliente['data_cadastro']; ?>' hidden>
                </div>
                
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type='text' name='cpf' class='form-control' id='cpf' value='<?php echo $cliente['cpf']; ?>'>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                   <input type='tel' name='telefone' class='form-control' id='telefone' value='<?php echo $cliente['telefone']; ?>' >
                </div>

                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type='tel' name='celular' class= 'form-control' id= 'celular' value='<?php echo $cliente['celular']; ?>' >
                </div>

                <div class="form-group">
                    <label for="nascimento">Data de Nascimento:</label>
                   <input type='date' name='nascimento' class= 'form-control' id='nascimento' value='<?php echo $cliente['nascimento']; ?>' >
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type ='text' name='endereco' class='form-control' id= 'endereco' value ='<?php echo $cliente['endereco']; ?>' >
                </div>
                <?php
                if (isset($_SESSION['erroCampos'])) {
                    echo "<div class='alert alert-danger'>";
                    echo $_SESSION['erroCampos'];
                    echo "</div>";
                    unset($_SESSION['erroCampos']);
                }
                ?>
            </div>
            <div class="options-buttons col-sm-2">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class=" btn btn-danger btn-lg btn-block">Salvar</button>
                        <br>
                    </div>                    
                    <div class="col-sm-12">
                        <a href="../cliente/index.php">
                            <button type="button" class="btn btn-danger btn-lg btn-block">Voltar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
