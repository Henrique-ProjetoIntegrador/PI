
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
    <link rel="stylesheet" href="../../styles/novoUsuario.css"/>
    <link rel="stylesheet" href="../alerts/modal.css">

    <title>Editar Usuário</title>
</head>
<body>
<header>
<?php

    include_once "../layout/menu.php";

?>
</header>
    <div class="container">
        <div class="row-2">
            <div class="header-usuario col-sm-12">
                <h2 class="col-6 offset-2 text-center">Editar Usuário</h2>
            </div>
        </div>
        <form method="POST"action="atualizarUsuario.php"> 
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
                <?php
                    $sql = "SELECT * from usuario where id = '{$_GET['id']}'"; 
                    $stmt = $conn->prepare($sql); // prepara a query para ser executada
                    $stmt->execute(); // realiza a execução da query
                    $resultado = $stmt->fetchAll();

                    $nome = $resultado[0]['login'];
                    $senha = $resultado[0]['senha'];
                    $funcao = $resultado[0]['funcao'];

                ?>
                    <div class="form-group">
                    <?php echo " <input type='text' name='id' class='form-control' id='id' aria-describedby='nome'  value='{$_GET['id']}' hidden"?>
                    
                        <label for="nome">Login:</label>
                        <?php echo " <input type='text' name='login' class='form-control' id='nome' aria-describedby='nome'  value='{$nome}' placeholder='Digite o nome'>"?>
                        </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <?php echo " <input type='password' name='senha' class='form-control' value='{$senha}' id='senha' placeholder='Digite sua senha:'>"?>
                    </div>
                    <div class="form-group">
                        <label for="categoria" class=col-sm-3>CATEGORIA:</label>
                        <select class="form-control" name="funcao" id="categoria">
                            <option selected hidden><?php echo $funcao?></option>
                            <option>Administrador</option>
                            <option>Mecânico</option>  
                        </select> 
                    </div>
                    <?php

                        if(isset($_SESSION['erroCampos'])){
                            // criando a classe alerta
                            echo "<div class='alert alert-danger'>";
                                
                                echo $_SESSION['erroCampos'];
                            echo "</div>";
                            // fechando o div da class alerta
                            unset($_SESSION['erroCampos']);
                        }
                        // apenas isso ja vai fazer com que mostra a mensagem caso os campos estejam vazios
                        // mas antes é precisa verificar se essa sessao existe, no caso criar uma condição
                    
                    ?>          
            </div>
            <div class="options-buttons col-sm-2">
                <div class= "row">
                    <div class="col-sm-12">
                        <button type="submit"class=" btn btn-danger btn-lg btn-block">Salvar</button>                          
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <a href ="../usuario/index.php"><button type= "button"class="btn btn-danger btn-lg btn-block">Voltar</a></button>
                    </div>
                </div>
            </div>      
        </div> 
            </form>    
</body>
</html>