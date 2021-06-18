<?php
    include '../../includes/verificaSeLogado.php';
    include_once '../../includes/connectDb.php';
    $conn = getConnection(); //funcao existente no connectDb
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
                              <?php
                                $query = "SELECT * FROM usuario;";
                                $stmt = $conn->prepare($query); // prepara a query para ser executada
                                $stmt->execute(); // realiza a execução da query
                                $resultado = $stmt->fetchAll(); // pega o resultado da execução da query
                                
                                foreach($resultado as $res){
                                    echo "<tr>";
                                        echo "<td>".$res['login']." </td>";
                                        echo "<td>".$res['funcao']." </td>";
                                        echo "<td><a href='editarUsuario.php?id=".$res['id']."'>Editar<a/></td>";
                                        echo "<td><a href='deletarUsuario.php?id=".$res['id']."' class=''>Excluir<a/></td>";
                                        echo "</tr>";
                                }

                              ?>                 
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