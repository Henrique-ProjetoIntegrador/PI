<?php
include_once '../../includes/connectDb.php';
$conn = getConnection();
if (session_status() === PHP_SESSION_NONE){
    session_start();
}

    if (isset($_POST['usuario']) && isset($_POST['senha'])){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        if ($usuario == "" && $senha == ""){
            $_SESSION['erroLogin'] = "Favor preencher os campos login e senha!";
            header('location: login.php');
        }else{
            $sql = "SELECT * FROM usuario WHERE login = '$usuario' && senha = '$senha' ";
            $stmt = $conn->prepare($sql); // prepara a query para ser executada
            $stmt->execute(); // realiza a execução da query
            $resultado = $stmt->fetchAll(); // pega o resultado da execução da query

            if(empty($resultado)){
                $_SESSION['erroLogin'] = "usuário ou senha incorretos";
                header('Location: login.php');

            }elseif(isset($resultado)){
                $_SESSION['status'] = true;
                header('Location: ../principal/index.php');
            }
            else{
                $_SESSION['erroLogin']= "usuário ou senha incorretos";
                header('Location: login.php');
            }
        }
    }
    // $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    // $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    // $senha = md5($senha);




?>