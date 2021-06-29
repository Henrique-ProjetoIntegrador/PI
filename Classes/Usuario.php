<!-- Classe responsável pela manipulação de dados no banco -->
<?php    
    require 'Conexao.php';  
    
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }

    class Usuario
    {
        private $mysql;

        public function __construct(mysqli $mysql)
        {
            $this->mysql = $mysql;
        }
        public function consultaTodosUsuarios():array
        {
            $resultado = $this->mysql->query('SELECT * FROM usuario');
            $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
            return $usuarios;
        }
        public function consultaUsuarioPorId(string $id)
        {
            $selecionaUsuario = $this->mysql->prepare('SELECT * FROM usuario WHERE id=?');
            $selecionaUsuario->bind_param('s',$id);
            $selecionaUsuario->execute();
            $usuario = $selecionaUsuario->get_result()->fetch_assoc();
            return $usuario;
        }
        public function cadastraNovoUsuario(string $nome, string $senha, string $funcao): void
        {              
            $_SESSION['novoUsuario'] =true;
            $_SESSION['mensagemHeader'] = 'Salvar';
            $_SESSION['mensagem'] = 'Salvo com sucesso!';
            $encapsulaUsuario = $this->mysql->prepare('INSERT INTO usuario (login, senha, funcao) VALUES (?,?,?)');
            $encapsulaUsuario->bind_param('sss',$nome,password_hash($senha, PASSWORD_DEFAULT),$funcao);
            $encapsulaUsuario->execute();

        }
        public function editarUsuario(string $id, string $nome, string $senha, string $funcao):void
        {
            $_SESSION['editarUsuario'] =true;
            $_SESSION['mensagemHeader'] = 'Editar';
            $_SESSION['mensagem'] = 'Editado com sucesso!';
            $encapsulaUsuario = $this->mysql->prepare('UPDATE usuario SET login = ?, senha = ?, funcao = ? WHERE id=?');
            $encapsulaUsuario->bind_param('ssss',$nome,password_hash($senha, PASSWORD_DEFAULT),$funcao,$id);
            $encapsulaUsuario->execute();
        }
        public function removerUsuario(string $id):void
        {
            $_SESSION['removerUsuario'] =true;
            $_SESSION['mensagemHeader'] = 'Remover';
            $_SESSION['mensagem'] = 'Excluído com sucesso!';
            $removeEmClientes = $this->mysql->prepare('UPDATE clientes SET id_usuario = 1 WHERE id = ?');
            $removeEmClientes->bind_param('s', $id);
            $removeEmClientes->execute();
            $removeEmEstoque = $this->mysql->prepare('UPDATE itens_estoque SET id_usuario = 1 WHERE id = ?');
            $removeEmEstoque->bind_param('s', $id);
            $removeEmEstoque->execute();
            $removeEmOrcamentos = $this->mysql->prepare('UPDATE orcamentos SET id_usuario = 1 WHERE id = ?');
            $removeEmOrcamentos->bind_param('s', $id);
            $removeEmOrcamentos->execute();
            $removeEmVeiculos = $this->mysql->prepare('UPDATE veiculo SET id_usuario = 1 WHERE id = ?');
            $removeEmVeiculos->bind_param('s', $id);
            $removeEmVeiculos->execute();
            $removeEmcategoria = $this->mysql->prepare('UPDATE categoria SET id_usuario = 1 WHERE id = ?');
            $removeEmcategoria->bind_param('s', $id);
            $removeEmcategoria->execute();
            
            $removerUsuario = $this->mysql->prepare('DELETE FROM usuario WHERE id=?');
            $removerUsuario->bind_param('s',$id);
            $removerUsuario->execute();            
        }

    }
?>