<?php
    include '../../includes/verificaSeLogado.php';
    require '../../includes/Conexao.php';
    require '../../includes/ControlerSql.php';
    $conteudo = new Controler($mysql);
    $usuarios = $conteudo->consultaTodosUsuarios();
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
                                        <?php if($usuario['id'] != $_SESSION['id_usuario']): ?>                                           
                                            <tr>
                                                <td><?php echo $usuario['login']; ?></td>
                                                <td><?php echo $usuario['funcao']; ?></td>
                                                <td><a href="editarUsuario.php?id=<?php echo $usuario['id'] ?>">Editar</a></td>
                                                <td><a href="deletarUsuario.php?id=<?php echo $usuario['id'] ?>">Excluir</a></td>
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
    </main>   
</body>
</html>