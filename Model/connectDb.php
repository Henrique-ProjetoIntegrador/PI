<?php
/**
 * @return \PDO
 */
function getConnection(){
    try {
        $dbServernName = "localhost";
        $dbUserName = "root";
        $dbPassword = "";
        $dbName = "cido_auto_center";

        $conn = new PDO("mysql:host=$dbServernName;dbname=$dbName;charset=utf8", $dbUserName, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }catch (PDOException $e){
        echo "Erro ao se conectar com o banco: --- Detals: {$e->getMessage()}";
    }
}


?>