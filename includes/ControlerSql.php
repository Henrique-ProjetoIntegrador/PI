<!-- Classe responsável pela manipulação de dados no banco -->
<?php    
    require 'Conexao.php'; 
    
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }

    class Controler
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
        public function cadastraNovoUsuario(string $nome, string $senha, string $funcao)
        {

        }

    }
?>