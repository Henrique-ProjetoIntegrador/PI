<?php
session_start();
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
        <form action="validaLogin.php" method="POST"> <!-- Formulario -->
            <label for="usuario">USUÁRIO</label>    
            <input type="text" name="usuario" id="usuario" placeholder="Digite seu nome" autocomplete="off">
            <label for="password">SENHA</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
            <input type="submit" value="ACESSAR">
        </form>
    </div>
    <div class="row">
                <?php              
                    if (isset($_SESSION['erroLogin'])){
                            echo '<div class="alert alert-danger col-sm-4 offset-4 text-center" role="alert">';
                            echo $_SESSION['erroLogin'];      
                            unset($_SESSION['erroLogin']);
                            echo '</div>';               
                    }
                ?>        
    </div>

</body>
</html>