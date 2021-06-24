<?php
    include '../../includes/verificaSeLogado.php';
    include_once '../../includes/connectDb.php';
    $conn = getConnection(); //funcao existente no connectDb
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
    
    <title>Editar Peças</title>
</head>
<body>
<header>
<?php
        
        include_once "../layout/menu.php";

?>
</header>
    <div class="container">
        <div class="row-2">
            <div class="header-peca col-sm-12">
                <h2 class="col-6 offset-2 text-center">Editar Peças</h2>
            </div>
        </div>
        <form method="POST"action="atualizarPeca.php"> 
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
                <?php
                    $sql = "SELECT * from pecas where id = '{$_GET['id']}'"; 
                    $stmt = $conn->prepare($sql); // prepara a query para ser executada
                    $stmt->execute(); // realiza a execução da query
                    $resultado = $stmt->fetchAll();

                    $nome = $resultado[0]['nome'];
                    $categoria = $resultado[0]['categoria'];
                    $preco = $resultado[0]['preco'];
                    $qtd= $resultado[0]['qtd'];

                ?>
                    <div class="form-group">
                    <?php echo " <input type='text' name='id' class='form-control' id='id' aria-describedby='nome'  value='{$_GET['id']}' hidden"?>
                    
                        <label for="nome">nome:</label>
                        <?php echo " <input type='text' name='login' class='form-control' id='nome' aria-describedby='nome'  value='{$nome}' placeholder='Digite o nome'>"?>
                        </div>
                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <?php echo " <input type='text' name='preco' class='form-control' value='{$preco}' id='preco' placeholder='Digite o Preço:'>"?>
                    </div>
                    <div class="form-group">
                        <label for="preco">qtd:</label>
                        <?php echo " <input type='number' name='qtd' class='form-control' value='{$qtd}' id='qtd' placeholder='Digite a Qtd:'>"?>
                    </div>
                    <div class="form-group">
                        <label for="categoria" class=col-sm-3>CATEGORIA:</label>
                        <select class="form-control" name="categoria" id="categoria">
                            <option selected hidden><?php echo $categoria?></option>
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