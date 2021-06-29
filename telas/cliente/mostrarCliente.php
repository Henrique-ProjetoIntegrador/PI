<?php
    include '../../includes/verificaSeLogado.php';
    include '../../includes/redireciona.php';
    require '../../Classes/Conexao.php';
    require '../../Classes/Cliente.php';
    $conteudo = new Cliente($mysql);
    $cliente = $conteudo->consultaClientePorId($_GET['id']);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){      
        $conteudo->removerCliente($_POST['id']);
        redireciona('index.php'); 
     }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/print.css" media="print" />
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
                <h2 class="col-6 offset-2 text-center">Informações do Cliente</h2>
            </div>
        </div>
          
        <div class="row">       
            <div class="formulario col-sm-6 offset-2"> 

                <div class="form-group">                    
                        <label for="nome-cliente">Nome do cliente:</label>
                        <input type='text' name='nome' class='form-control' id='nome'  value='<?php echo $cliente['nome']; ?>' disabled>
                </div>

                <div class="form-group">
                    <label for="data_cadastro">Data de Cadastro:</label>
                    <input type= 'datetime' name='data_cadastro' class='form-control' id='data_cadastro' value='<?php echo $cliente['data_cadastro']; ?>' disabled>
                </div>
                
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type='text' name='cpf' class='form-control' id='cpf' value='<?php echo $cliente['cpf']; ?>'disabled>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                   <input type='tel' name='telefone' class='form-control' id='telefone' value='<?php echo $cliente['telefone']; ?>' disabled>
                </div>

                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type='tel' name='celular' class= 'form-control' id= 'celular' value='<?php echo $cliente['celular']; ?>' disabled>
                </div>

                <div class="form-group">
                    <label for="nascimento">Data de Nascimento:</label>
                   <input type='date' name='nascimento' class= 'form-control' id='nascimento' value='<?php echo $cliente['nascimento']; ?>' disabled>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type ='text' name='endereco' class='form-control' id= 'endereco' value ='<?php echo $cliente['endereco']; ?>' disabled>
                </div>
                <div class="termo-autorizacao">
                    <p>Estou ciente e concordo que a empresa Cido Autocenter ltda armazene e trate as informações supracitadas com a finalidade de emitir notas fiscais referente a serviços a mim prestados, entrar em contato comigo em casos de promoções e períodos de revisão, emitir orçamentos e ordens de serviços por mim solicitados.</p>
                    
                    <br>
                    <p>________________________________________</p>
                    <p><?php echo $cliente['nome'] ?></p>
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
                        <a href =""><button type= "button"class="btn btn-danger btn-lg btn-block" onClick="window.print()">Emitir Termo</a></button>
                        <br>
                    </div>
                   
                    <div class="col-sm-12">
                        <a href='editarClientes.php?id=<?php echo $_GET['id'] ?>' class='btn btn-danger btn-lg btn-block' >Editar</a>
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <form action="mostrarCliente.php?id=<?php echo $cliente['id']; ?>" method="POST">
                            <input type='text' name='id' value='<?php echo $cliente['id']; ?>' hidden>                            
                            <button class="btn btn-danger btn-lg btn-block" type="submit">Excluir</button>                                    
                            <br>
                        </form>                        
                    </div>                    
                    <div class="col-sm-12">
                        <a href='veiculoCliente.php?id=<?php echo $cliente['id']; ?>' class='btn btn-danger btn-lg btn-block' >Veículos</a>                                    
                        <br>
                    </div>
                    <br>
                    <!-- Falta fazer essa parte de O.S -->
                    <div class="col-sm-12">
                        <a href =""><button type= "button"class="btn btn-danger btn-lg btn-block">O.S</a></button>
                        <br>
                    </div>
                   <!--  -->
                    <div class="col-sm-12">
                        <a href ="index.php"><button type= "button"class="btn btn-danger btn-lg btn-block">Voltar</button></a>
                    </div>
                    
                
                </div>
            </div>      
        </div>        
    </div>   
</body>
</html>
