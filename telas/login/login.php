<?php
    session_start();
    require '../../Classes/validaAcesso.php';
    require '../../Classes/Conexao.php';   
    $acesso = new Acesso($mysql); 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){       
        $acesso->validaAcesso($_POST['usuario'],$_POST['senha']);              
    }
    
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head> <!-- Tag de configuração -->
    <meta charset="UTF-8">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/login.css"/>
    <title>LOGIN</title>
</head>
<body> <!-- Elementos que aparece na tela -->
    <div id="login-container"> <!-- Elementos que aparece na tela -->
    <img src="../../icones/logomarca.png" width=335 height=200>
        <!-- Formulario -->
        <?php $acesso->exibeFormulario(); ?>
    </div>
    <div class="row">
                <?php                                               
                    if (isset($_SESSION['errologin'])){
                            echo '<div class="alert alert-danger col-sm-4 offset-4 text-center" role="alert">';
                            echo $_SESSION['erroLogin'];                            
                            echo '</div>';               
                    }
                ?>                   
    </div>

</body>
</html>