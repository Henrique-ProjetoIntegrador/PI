
<?php
    include '../../includes/verificaSeLogado.php';
    include '../../includes/redireciona.php';
    require '../../Classes/Conexao.php';
    require '../../Classes/Usuario.php';

    if($_SESSION['type_user'] != "ADM"){
        redireciona('../principal/index.php');
    }

    $conteudo = new Usuario($mysql);
    $usuario = $conteudo->consultaUsuarioPorId($_GET['id']);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
       if($_POST['login'] == "" || $_POST['senha'] == "" || $_POST['funcao']== ""){
           $_SESSION['erroCampos'] =  'Favor preencher todos os campos!';
           redireciona('editarUsuario.php?id='.$usuario['id']);           
       } else {
           $conteudo->editarUsuario($_GET['id'],$_POST['login'],$_POST['senha'],$_POST['funcao']);
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
        <form method="POST"action="editarUsuario.php?id=<?php echo $usuario['id']; ?>"> 
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
               
                    <div class="form-group">
                    <input type='text' name='id' class='form-control' id='id' aria-describedby='nome'  value='<?php echo $usuario['id'] ?>' hidden>
                    
                        <label for="nome">Login:</label>
                        <input type='text' name='login' class='form-control' id='nome' aria-describedby='nome'  value='<?php echo $usuario['login'] ?>' placeholder='Digite o nome'>
                        </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type='password' name='senha' class='form-control'  id='senha' placeholder='Digite sua senha:'>
                    </div>
                    <div class="form-group">
                        <label for="categoria" class=col-sm-3>CATEGORIA:</label>
                        <select class="form-control" name="funcao" id="categoria">
                            <option selected hidden><?php echo $usuario['funcao'] ?></option>
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
                        <a href ="index.php"><button type= "button"class="btn btn-danger btn-lg btn-block">Voltar</button></a>
                    </div>
                </div>
            </div>      
        </div> 
        </form>
    </div>    
</body>
</html>