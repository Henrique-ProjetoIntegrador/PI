<?php


class Usuario
{
    private $connect;

    public function __construct($conn)
    {
        $this->connect = $conn;
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM usuario";

        $stmt = $this->connect->prepare($sql); // prepara a query para ser executada
        $stmt->execute(); // realiza a execução da query
        $resultado = $stmt->fetchAll(); //

        return $resultado;
    }

}