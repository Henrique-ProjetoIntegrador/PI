<?php
    include '../../includes/verificaSeLogado.php';
    include '../../includes/redireciona.php';
    require '../../Classes/Conexao.php';
    require '../../Classes/Usuario.php';
    $conteudo = new Usuario($mysql);
    $usuarios = $conteudo->consultaTodosUsuarios();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){  
        $conteudo->removerUsuario($_POST['id']);
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
    <link rel="stylesheet" href="../../styles/usuario.css"/>
    <title>Usuários</title>   
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
                <div class="header-usuarios col-sm-8">
                    <h2 class="text-center">Usuários Cadastrados</h2>
                </div>
                <div class="group-usuarios col-sm-6 offset-1">
                    <div class="row">
                        <div class="table-responsive">                                    
                            <table class="table table-striped text-center">
                                <thead class="thead-dark">
                                    <tr>                      
                                        <th scope="col">Login</th>
                                        <th scope="col">Função</th>
                                        <th scope="col"colspan="2">Ação</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($usuarios as $usuario): ?>
                                        <?php if($usuario['id'] != $_SESSION['id_usuario'] && $usuario['id'] != '1' ): ?>                                           
                                            <tr>
                                                <td><?php echo $usuario['login']; ?></td>
                                                <td><?php echo $usuario['funcao']; ?></td>
                                                <td><a href="editarUsuario.php?id=<?php echo $usuario['id'] ?>">Editar</a></td>
                                                <form action="index.php" method="POST">
                                                    <input type="text" name="id" value="<?php echo $usuario['id'] ?>" hidden>
                                                    
                                                    <td><a href=""><button class="botao-excluir-usuario" type="submit">Excluir</button></a></td>
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
                            <a href="novoUsuario.php" class="btn btn-danger btn-lg btn-block">Novo</a>
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
            if(!isset($_SESSION['novoUsuario'])){
                $_SESSION['novoUsuario'] = false;
            }
            if(!isset($_SESSION['editarUsuario'])){
                $_SESSION['editarUsuario'] = false;
            }
            if(!isset($_SESSION['removerUsuario'])){
                $_SESSION['removerUsuario'] = false;
            }
        ?>
        <?php if($_SESSION['novoUsuario']==true||$_SESSION['editarUsuario'] ==true|| $_SESSION['removerUsuario'] ==true ){ ?>
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
                            <a href="index.php"><button type="button" onclick="<?php $_SESSION['removerUsuario'] =false; $_SESSION['novoUsuario']=false;  $_SESSION['editarUsuario'] =false; ?>" class="btn btn-success">OK</button></a>               
                        </div>
                    </div>
                </div>
            </div>
            <script>                
                $(document).ready (function (){
                    $('#salvar') .modal('show');
                });                
            </script>
        <?php } ?>  
    </main>   
</body>
</html>