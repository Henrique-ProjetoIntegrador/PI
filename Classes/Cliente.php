<!-- Classe responsável pela manipulação de dados no banco -->
<?php    
    require 'Conexao.php';   
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }

    class Cliente
    {
        private $mysql;       

        public function __construct(mysqli $mysql)
        {
            $this->mysql = $mysql;            
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
        public function cadastraNovoCliente(string $nome, string $cpf, string $nascimento, string $endereco, string $telefone, string $celular): void
        {       
            date_default_timezone_set('America/Sao_Paulo');
            $getDate = date('y-m-d');   
            $id = $_SESSION['id_usuario'];
            $_SESSION['novoCliente'] =true;
            $_SESSION['mensagemHeader'] = 'Salvar';
            $_SESSION['mensagem'] = 'Salvo com sucesso!';
            $encapsulaUsuario = $this->mysql->prepare("INSERT INTO clientes (data_cadastro, nome, cpf, nascimento, endereco, telefone, celular, id_usuario) VALUES ('$getDate' ,?,?,?,?,?,?,$id)");
            $encapsulaUsuario->bind_param('ssssss',$nome,$cpf,$nascimento,$endereco,$telefone,$celular);
            $encapsulaUsuario->execute();

        }
        public function editarCliente(string $id, string $data_cadastro, string $nome, string $cpf, string $nascimento, string $endereco, string $telefone, string $celular):void
        {
            $id_user = $_SESSION['id_usuario'];
            $_SESSION['editarCliente'] =true;
            $_SESSION['mensagemHeader'] = 'Editar';
            $_SESSION['mensagem'] = 'Editado com sucesso!';
            $encapsulaUsuario = $this->mysql->prepare("UPDATE clientes SET data_cadastro = ?, nome = ?, cpf = ?, nascimento = ?, endereco = ?, telefone = ?, celular = ?, id_usuario = $id_user WHERE id=?");
            $encapsulaUsuario->bind_param('ssssssss',$data_cadastro,$nome,$cpf,$nascimento,$endereco,$telefone,$celular,$id);
            $encapsulaUsuario->execute();
        }
        public function removerCliente(string $id):void
        {
            $_SESSION['removerCliente'] =true;
            $_SESSION['mensagemHeader'] = 'Remover';
            $_SESSION['mensagem'] = 'Excluído com sucesso!';
            
            $removeEmVeiculos = $this->mysql->prepare('UPDATE veiculo SET id_clientes = 1 WHERE id = ?');
            $removeEmVeiculos->bind_param('s', $id);
            $removeEmVeiculos->execute();            
            $removerUsuario = $this->mysql->prepare('DELETE FROM clientes WHERE id=?');
            $removerUsuario->bind_param('s',$id);
            $removerUsuario->execute();            
        }
        public function exibeTodosVeiculosCliente(string $id):array
        {
            $resultado = $this->mysql->prepare('SELECT * FROM veiculo WHERE id_clientes = ?');
            $resultado->bind_param('s', $id);
            $resultado->execute(); 
            $veiculosCliente = $resultado->get_result()->fetch_all(MYSQLI_ASSOC);
            return $veiculosCliente;
        }
        public function consultaVeiculoClientePorId(string $id)
        {
            $selecionaVeiculo = $this->mysql->prepare('SELECT * FROM veiculo WHERE id=?');
            $selecionaVeiculo->bind_param('s',$id);
            $selecionaVeiculo->execute();
            $veiculo = $selecionaVeiculo->get_result()->fetch_assoc();
            return $veiculo;
        }
        public function novoVeiculoCLiente(string $id, string $modelo, string $marca, string $ano, string $placa, string $chassis):void
        {
            date_default_timezone_set('America/Sao_Paulo');
            $getDate = date('y-m-d');   
            $id_user = $_SESSION['id_usuario'];
            $_SESSION['novoVeiculoCliente'] =true;
            $_SESSION['mensagemHeader'] = 'Salvar';
            $_SESSION['mensagem'] = 'Salvo com sucesso!';
            $encapsulaVeiculo = $this->mysql->prepare("INSERT INTO veiculo (data_cadastro, modelo, marca, ano, placa, chassis, id_clientes, id_usuario) VALUES ('$getDate' ,?,?,?,?,?,?,$id_user)");
            $encapsulaVeiculo->bind_param('ssssss',$modelo,$marca,$ano,$placa,$chassis,$id);
            $encapsulaVeiculo->execute();
        }
        public function editarVeiculoCliente(string $id, string $modelo, string $marca, string $ano, string $placa, string $chassis):void
        {
            $id_user = $_SESSION['id_usuario'];
            $_SESSION['editarVeiculoCliente'] =true;
            $_SESSION['mensagemHeader'] = 'Editar';
            $_SESSION['mensagem'] = 'Editado com sucesso!';
            $encapsulaVeiculo = $this->mysql->prepare("UPDATE veiculo SET modelo = ?, marca = ?, ano = ?, placa = ?, chassis = ?, id_usuario = $id_user WHERE id=?");
            $encapsulaVeiculo->bind_param('ssssss',$modelo,$marca,$ano,$placa,$chassis,$id);
            $encapsulaVeiculo->execute();
        }
        public function removerVeiculoCliente(string $id):void
        {
            $_SESSION['removerVeiculoCliente'] =true;
            $_SESSION['mensagemHeader'] = 'Remover';
            $_SESSION['mensagem'] = 'Excluído com sucesso!';
            
            $removerUsuario = $this->mysql->prepare('DELETE FROM veiculo WHERE id=?');
            $removerUsuario->bind_param('s',$id);
            $removerUsuario->execute();
        }

    }
?>