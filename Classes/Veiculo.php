<?php
require 'Conexao.php'; 
if (session_status() === PHP_SESSION_NONE){
    session_start();
}

class Veiculo
{
    private $mysql;       

        public function __construct(mysqli $mysql)
        {
            $this->mysql = $mysql;            
        }
        public function consultaTodosVeiculos():array
        {
            $resultado = $this->mysql->query('SELECT * FROM veiculo ORDER BY modelo');
            $veiculos = $resultado->fetch_all(MYSQLI_ASSOC);
            return $veiculos;
        }

        public function novoVeiculo(string $id, string $modelo, string $marca, string $ano, string $placa, string $chassis):void
        {
            date_default_timezone_set('America/Sao_Paulo');
            $getDate = date('y-m-d');   
            $id_user = $_SESSION['id_usuario'];
            $_SESSION['novoVeiculo'] =true;
            $_SESSION['mensagemHeader'] = 'Salvar';
            $_SESSION['mensagem'] = 'Salvo com sucesso!';
            $encapsulaVeiculo = $this->mysql->prepare("INSERT INTO veiculo (data_cadastro, modelo, marca, ano, placa, chassis, id_clientes, id_usuario) VALUES ('$getDate' ,?,?,?,?,?,?,$id_user)");
            $encapsulaVeiculo->bind_param('ssssss',$modelo,$marca,$ano,$placa,$chassis,$id);
            $encapsulaVeiculo->execute();
        }
        public function consultaVeiculoPorId(string $id)
        {
            $selecionaVeiculo = $this->mysql->prepare('SELECT * FROM veiculo WHERE id=?');
            $selecionaVeiculo->bind_param('s',$id);
            $selecionaVeiculo->execute();
            $veiculo = $selecionaVeiculo->get_result()->fetch_assoc();
            return $veiculo;
        }
        public function editarVeiculoCliente(string $id, string $modelo, string $marca, string $ano, string $placa, string $chassis,string $id_cliente):void
        {
            $id_user = $_SESSION['id_usuario'];
            $_SESSION['editarVeiculo'] =true;
            $_SESSION['mensagemHeader'] = 'Editar';
            $_SESSION['mensagem'] = 'Editado com sucesso!';
            $encapsulaVeiculo = $this->mysql->prepare("UPDATE veiculo SET modelo = ?, marca = ?, ano = ?, placa = ?, chassis = ?,id_clientes=?, id_usuario = $id_user WHERE id=?");
            $encapsulaVeiculo->bind_param('sssssss',$modelo,$marca,$ano,$placa,$chassis,$id_cliente,$id);
            $encapsulaVeiculo->execute();
        }
        public function removerVeiculo(string $id):void
        {
            
            $_SESSION['removerVeiculo'] =true;
            $_SESSION['mensagemHeader'] = 'Remover';
            $_SESSION['mensagem'] = 'Excluído com sucesso!';

            $lista_orcamentos = $this->buscaOrcamentosPorVeiculo($id);           

            foreach($lista_orcamentos as $orc){
                $id_orcamento =$orc['id'];
                $removeListaPeca = $this->mysql->prepare("DELETE FROM lista_peca WHERE lista_peca.id_orcamento= ?");
                $removeListaPeca->bind_param('s',$id_orcamento);
                $removeListaPeca->execute();
                $removeListaServico = $this->mysql->prepare("DELETE FROM lista_peca WHERE lista_peca.id_orcamento= ?");
                $removeListaServico->bind_param('s',$id_orcamento);
                $removeListaServico->execute();           
    
            }
            $removerOrcamento = $this->mysql->prepare('DELETE FROM orcamentos WHERE id_veiculo=?');
            $removerOrcamento->bind_param('s',$id);
            $removerOrcamento->execute();
            
            $removerVeiculo = $this->mysql->prepare('DELETE FROM veiculo WHERE id=?');
            $removerVeiculo->bind_param('s',$id);
            $removerVeiculo->execute();
        }
        public function consultaTodosClientes():array
        {
            $resultado = $this->mysql->query('SELECT * FROM clientes ORDER BY nome');
            $clientes = $resultado->fetch_all(MYSQLI_ASSOC);
            return $clientes;
        }
        public function consultaClientePorId(string $id)
        {
            $selecionaUsuario = $this->mysql->prepare('SELECT * FROM clientes WHERE id=?');
            $selecionaUsuario->bind_param('s',$id);
            $selecionaUsuario->execute();
            $usuario = $selecionaUsuario->get_result()->fetch_assoc();
            return $usuario;
        }
        public function buscaOrcamentosPorVeiculo(string $id):array
        {
            $orcamento = $this->mysql->prepare('SELECT id FROM orcamentos WHERE id_veiculo=?');
            $orcamento->bind_param('s',$id);
            $orcamento->execute();
            $lista_orcamentos = $orcamento->get_result()->fetch_all(MYSQLI_ASSOC);

            return $lista_orcamentos;
        }
}