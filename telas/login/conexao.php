<?php
    $servidor = "localhost";
    $usuario= "root";
    $senha = "";
    $dbname = "cido_auto_center";
    
    /// criando conexão///
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    if (!$conn){// se falso (contrário)
        die("Falha na conexão: ". mysqli_connect_error());// die = interrompe a execução do script
    }else{
        echo "conexão realizada com sucesso";
    }
  
?>