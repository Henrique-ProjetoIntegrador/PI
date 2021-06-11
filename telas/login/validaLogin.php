<?php 
    session_start();
    if($_POST['usuario']!="" && $_POST['senha'] !=""){ 
        header('Location: ../principal/index.php');
    }else{
        $_SESSION['erroLogin']= "usuário ou senha não informados";
        header('Location: login.php');
    }
?>