<?php 
    session_start();
    include_once("conexao.php");

    if($_POST['usuario']!="" && $_POST['senha'] !=""){ 
        header('Location: ../principal/index.php');
    }else{
        $_SESSION['erroLogin']= "usuário ou senha não informados";
        header('Location: login.php');
    }
    // $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    // $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    // $senha = md5($senha);
   $usuario = $_POST['usuario'];
   $senha = $_POST['senha'];


    $sql = "SELECT * FROM usuario WHERE login = '$usuario' && senha = '$senha' ";
    $result = mysqli_query($conn, $sql); //executando a query acima
    $resultado = mysqli_fetch_assoc($result); //pegando a resposta

    if(empty($resultado)){
        $_SESSION['erroLogin'] = "usuário ou senha incorretos";
        header('Location: login.php');

    }elseif(isset($resultado)){
        header('Location: ../principal/index.php');
    }
    else{
        $_SESSION['erroLogin']= "usuário ou senha incorretos";
        header('Location: login.php');
    }
?>