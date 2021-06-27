<?php

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

class Veiculo
{

    private $connect;

    public function __construct($conn)
    {
        $this->connect = $conn;
    }

    public function getVeiculoOfClient($id)
    {
        try {
            $sql = "SELECT *
                FROM veiculo
                INNER JOIN 
                    clientes c on veiculo.id_clientes = c.id
                WHERE veiculo.id = {$id}
                ";

            $stmt = $this->connect->prepare($sql); // prepara a query para ser executada
            $stmt->execute(); // realiza a execução da query
            $resultado = $stmt->fetchAll(); //

            return $resultado;
        } catch (Exception $e){
            return "error";
        }
    }

    public function getVeiculos()
    {
        $query = "SELECT * FROM veiculo;";
        $stmt = $this->connect->prepare($query); // prepara a query para ser executada
        $stmt->execute(); // realiza a execução da query
        $resultado = $stmt->fetchAll(); // pega o resultado da execução da query

        return $resultado;
    }
}