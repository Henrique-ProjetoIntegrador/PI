<?php


class Pecas
{
    private $connect;

    public function __construct($conn)
    {
        $this->connect = $conn;
    }

    public function getPecasOfCategoria($id)
    {
        try {
            $sql = "SELECT * FROM pecas where categoria = {$id}";

            $stmt = $this->connect->prepare($sql); // prepara a query para ser executada
            $stmt->execute(); // realiza a execução da query
            $resultado = $stmt->fetchAll(); //

            return $resultado;
        } catch (Exception $e){
            return "error";
        }
    }

    public function getValorOfIdPecas($id_categoria, $id_peca)
    {
        try {
            $sql = "SELECT preco FROM pecas where categoria = {$id_categoria} AND id = {$id_peca}";

            $stmt = $this->connect->prepare($sql); // prepara a query para ser executada
            $stmt->execute(); // realiza a execução da query
            $resultado = $stmt->fetchAll(); //

            return $resultado;
        } catch (Exception $e){
            return "error";
        }
    }
}