<?php
    include '../../includes/verificaSeLogado.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/menu.css"/>
    <link rel="stylesheet" href="../../styles/novaPeca.css"/>
    <link rel="stylesheet" href="../alerts/modal.css">
    <title>Nova Peça</title>
</head>
<body>
<header>
    <?php

        include_once "../layout/menu.php";

    ?>
</header>
    <div class="container">
        <div class="row-2">
            <div class="header-pecas col-sm-12">
                <h2 class="col-6 offset-2 text-center">Editar Peças</h2>
            </div>
        </div>
        <form method="POST"action="processaNovaPeca.php">  
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
                <div class="form-group">
                    <label for="nome">Nome da Peça:</label>
                    <input type= "text" name = "nome" class="form-control" id="nome"aria-describedby="nome" placeholder="Insira o nome">
                </div>
                <div class="form-group">
                    <label for=preco">Preço:</label>
                    <input type="text" name="preco" class="form-control" id="preco" placeholder="preco">
                </div>
                <div class="form-group">
                    <label for=qtd">Qtd:</label>
                    <input type="number" name="qtd" class="form-control" id="qtd" placeholder="qtd">
                </div>  
                <div class="form-group">
                        <label for="categoria" class=col-sm-3>CATEGORIA:</label>
                        <select class="form-control" name="funcao" id="categoria">
                            <option hidden>Selecione uma opção</option>
                            <option>Ar Condicionado</option>
                            <option>Borracharia</option>  
                            <option>Direção</option>
                            <option>Elétrica</option>  
                            <option>Freio</option>
                            <option>Injeção</option>
                            <option>Motor</option>   
                        </select> 
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
                        <a href ="../pecas/index.php"><button type= "button"class="btn btn-danger btn-lg btn-block">Voltar</a></button>
                    </div>
                </div>
            </div>      
        </div> 
        </form> 
    </div>   
</body>
</html>

            
<!-- <div class="container">
        <div class="row">
            <div class="header-Pecas col-sm-8">
                <h1 class="col-6 offset-3 text-center">PEÇAS</h1>
            </div>

            <div class="group-Pecas col-sm-12">
                <div class="row">        
        <table class="table table-hover table-striped text-center col-sm-8">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 600px">
                            <div class="campos-input">
                            <div class="row">
                                <label for="nome" class="col-sm-3">Nome da Peça</label>
                                <input class="form form-control form-control-sm col-sm-5" id="name" type="name" required/>
                            </div>
                            
                            <div class="row">
                                <label for="nome" class="col-sm-3">Categoria da Peça</label>
                            <select name="select">
                            <option value="valor1" selected>Selecione</option>
                            <option value="valor2" >Ar Condicionado</option>
                            <option value="valor3">Borracharia</option>
                            <option value="valor3">Direção</option>
                            <option value="valor3">Elétrica</option>
                            <option value="valor3">Freio</option>
                            <option value="valor3">Injeção</option>
                            <option value="valor3">Motor</option>
                            
                            </select>
                            </div>
                            </div>
                            </th>
                            
                        </tr>
                        </thead>
                        
                    </table>
                    <div class="option col-3 offset-1">
                        <div class="row">
                        <div class="col-12">
                        <button id="salvar" name="salvar" type="Submit" class="btn btn-danger btn-lg btn-block">Salvar</button>
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
        </div>
    </div>
</body>
</html> -->