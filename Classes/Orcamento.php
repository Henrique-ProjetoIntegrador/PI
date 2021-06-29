<?php


class Orcamento
{
    private $connect;

    public function __construct($conn)
    {
        $this->connect = $conn;
    }

    public function saveOcorrencia($request){
        try {
            if (!isset($request['id_orcamento'])){
                if (!empty($request['confirm']) && !empty($request['veiculo']) && !empty($request['odometro']) && !empty($request['usuario']) && !empty($request['qtd']) && !empty($request['id_categoria']) && !empty($request['pecas']) && !empty($request['preco'])){
                    $today = date('Y-m-d');
                    $sql = "INSERT INTO orcamentos (id_veiculo, data_cadastro, id_usuario, odometro) VALUES ('{$request['veiculo']}', '{$today}', '{$request['usuario']}', '{$request['odometro']}')";

                    $stmt = $this->connect->prepare($sql); // prepara a query para ser executada
                    $stmt->execute(); // realiza a execução da query
                    $orcamento = $this->getLastDataOfOrcamento();

                    $idOrcamento = $orcamento[0]['id'];

                    $this->savePecas($idOrcamento, $request);
                    return $idOrcamento;
                }
            }else{
                if (!empty($request['confirm']) && !empty($request['veiculo']) && !empty($request['odometro']) && !empty($request['usuario']) && !empty($request['qtd']) && !empty($request['id_categoria']) && !empty($request['pecas']) && !empty($request['preco'])) {
                    $this->savePecas($request['id_orcamento'], $request);
                    return $request['id_orcamento'];
                }else{
                    return $request['id_orcamento'];
                }
            }
        } catch (Exception $e){
            return "error";
        }
    }

    private function getLastDataOfOrcamento()
    {
        try {
            $sql = "SELECT * FROM orcamentos ORDER BY id DESC LIMIT 1";

            $stmt = $this->connect->prepare($sql); // prepara a query para ser executada
            $stmt->execute(); // realiza a execução da query
            $resultado = $stmt->fetchAll(); //
            return $resultado;
        }catch (Exception $e){
            return "error";
        }
    }

    private function savePecas($idOrcamento, $request)
    {
        try {
            $sql = "INSERT INTO lista_peca (id_peca, id_orcamento, qtd, valor) VALUES ('{$request['pecas']}', '{$idOrcamento}', '{$request['qtd']}', '{$request['preco']}')";
            $stmt = $this->connect->prepare($sql); // prepara a query para ser executada
            $stmt->execute(); // realiza a execução da query
        }catch (Exception $e){
            return "error";
        }
    }

    public function getListPeca($id_orcamento)
    {
        try {
            $sql = "SELECT lista_peca.qtd, categoria.name, p.nome, lista_peca.valor FROM lista_peca
                    INNER JOIN pecas p on lista_peca.id_peca = p.id
                    INNER JOIN categoria on categoria = categoria.id
                    WHERE lista_peca.id_orcamento = {$id_orcamento}";
            $stmt = $this->connect->prepare($sql); // prepara a query para ser executada
            $stmt->execute(); // realiza a execução da query
            $resultado = $stmt->fetchAll(); //
            return $resultado;
        }catch (Exception $e){
            return "error";
        }
    }



}