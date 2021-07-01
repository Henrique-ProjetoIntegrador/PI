<?php


class Pecas
{
    private $connect;

    public function __construct($conn)
    {
        $this->connect = $conn;
    }

    public function getAllPecas()
    {
        $query = "SELECT pecas.id as id, pecas.nome, pecas.preco as preco, pecas.qtd as qtd,  categoria.name as categoria FROM pecas
                    INNER JOIN categoria ON
                    categoria.id = pecas.categoria";
        $stmt = $this->connect->prepare($query); // prepara a query para ser executada
        $stmt->execute(); // realiza a execução da query

        return $stmt->fetchAll(); // pega o resultado da execução da query
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