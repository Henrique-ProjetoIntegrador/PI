<?php    
    include '../../includes/verificaSeLogado.php';
    include '../../includes/redireciona.php';
    require '../../Classes/Conexao.php';
    require '../../Classes/Cliente.php';
    $conteudo = new Cliente($mysql);
    $clientes = $conteudo->consultaTodosClientes();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){      
        $conteudo->removerCliente($_POST['id']);
        redireciona('index.php'); 
     } 
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/menu.css"/>
    <link rel="stylesheet" href="../../styles/clientes.css"/>
    <link rel="stylesheet" href="../alerts/modal.css"/>


    <title>Clientes</title>
</head>
<body>
<header>
    <?php

        include_once "../layout/menu.php";

    ?>
</header>
    <main>   
        <div class="container">
            <div class="row">
                <div class="header-veiculos col-sm-8">
                    <h2 class="text-center">Clientes Cadastrados</h2>
                </div>
                <div class="group-veiculos col-sm-6 offset-1">
                    <div class="row">
                        <input id="myInput" type="text" placeholder=" &#128270; Pesquisar Cliente ">
                        <div class="table-responsive">               
                            <table class="table table-striped text-center">
                                <thead class="thead-dark">
                                    <tr>                      
                                        <th scope="col">Nome</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col"colspan="2">Ação</th> 
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                <?php foreach($clientes as $cliente): ?>
                                    <?php if($cliente['id'] != '1' ): ?>
                                        <tr>
                                            <td><a href='mostrarCliente.php?id=<?php echo $cliente['id']; ?>'><?php echo $cliente['nome']; ?></a></td>
                                            <td><?php echo $cliente['celular']; ?></td>
                                            <td><a href='editarClientes.php?id=<?php echo $cliente['id']; ?>'>Editar</a></td>
                                            <form action="index.php" method="POST">
                                                <input type="text" name="id" value="<?php echo $cliente['id'] ?>" hidden>
                                                
                                                <td><a href=""><button class="botao-excluir-cliente" type="submit">Excluir</button></a></td>
                                            </form>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?> 
                                </tbody>
                            </table>        
                        </div>
                    </div>
                </div>
                <div class="option col-3 offset-1">
                    <div class="row">  
                        <div class="col-12">
                            <a href="novoClientes.php" class="btn btn-danger btn-lg btn-block">Novo</a>
                            <br>
                        </div>
                        <div class="col-12">
                            <a href="../principal/index.php" class="btn btn-danger btn-lg btn-block">Voltar</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <?php 
            if(!isset($_SESSION['novoCliente'])){
                $_SESSION['novoCliente'] = false;
            }
            if(!isset($_SESSION['editarCliente'])){
                $_SESSION['editarCliente'] = false;
            }
            if(!isset($_SESSION['removerCliente'])){
                $_SESSION['removerCliente'] = false;
            }
        ?>
        <?php if($_SESSION['novoCliente']==true||$_SESSION['editarCliente'] ==true|| $_SESSION['removerCliente'] ==true ){ ?>
            <div class="modal" id= "salvar" tabindex="-1" role="dialog">
                <div class= "modal-dialog" role="document">
                    <div class= "modal-content">
                        <div class="modal-header">
                            <h5 class= "modal-title"><?php echo $_SESSION['mensagemHeader']; ?></h5> 
                        </div>
                        <div class="modal-body">                            
                            <p><?php echo $_SESSION['mensagem']; ?></p>
                        </div>
                        <div class="modal-footer">
                            <a href="index.php"><button type="button" onclick="<?php $_SESSION['removerCliente'] =false; $_SESSION['novoCliente']=false;  $_SESSION['editarCliente'] =false; ?>" class="btn btn-success">OK</button></a>               
                        </div>
                    </div>
                </div>
            </div>            
        <?php } ?>
        <script>                
            $(document).ready (function (){
                $('#salvar') .modal('show');
            });
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });            
        </script>   
    </main>   
</body>
</html>