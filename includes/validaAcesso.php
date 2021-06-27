<!-- Processo que valida o a tentativa de acesso ao banco de dados -->
<?php    
    require 'Conexao.php'; 
    
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }

    class Acesso
    {
        private $sql;

        public function __construct(mysqli $mysql)
        {
            $this->sql = $mysql;
        }
        public function validaAcesso(string $login, string $senha){            
            
            if(!isset($_SESSION['tentativas'])){
                $_SESSION['tentativas'] = 0;
            }
            if($_SESSION['tentativas']>=5){
                $counter = time();                
                if(!isset($_SESSION['cont'])){
                    $_SESSION['cont'] = $counter;
                }
                if($counter - $_SESSION['cont']>=30){
                    unset($_SESSION['tentativas']);
                    unset($_SESSION['errologin']);
                    $_SESSION['cont'] = $counter;
                    $this->exibeFormulario();
                } else {
                    $_SESSION['erroLogin']= "Foi excedido o número de tentativas! Tente mais tarde";
                    header('Location: login.php');
                }
            } else {
                $_SESSION['erroLogin'] = "usuário ou senha incorretos";
                if ($login == "" || $senha == ""){
                    $_SESSION['errologin'] = "Favor preencher os campos login e senha!";
                    $tentativas = $_SESSION['tentativas'];
                    $_SESSION['tentativas'] = $tentativas+1;
                    header('location: login.php');
                }else{
    
                    $valida = $this->sql->prepare('SELECT * FROM usuario WHERE login = ?');            
                    $valida->bind_param('s',$login);
                    $valida->execute();
    
                    $resultado = $valida->get_result()->fetch_assoc();

                    if (empty($resultado)){
                        $_SESSION['errologin'] = "usuário ou senha incorretos";
                        $tentativas = $_SESSION['tentativas'];
                        $_SESSION['tentativas'] = $tentativas+1;                  
                        header('Location: login.php');
                    }
                    else if(isset($resultado) && password_verify($senha,$resultado['senha'])){
                        $_SESSION['status'] = true;
                        unset($_SESSION['errologin']);
                        unset($_SESSION['tentativas']);                   
                        $_SESSION['id_usuario']=$resultado['id'];
                        header('Location: ../principal/index.php');
                    }else{
                        $_SESSION['errologin']= "usuário ou senha incorretos";
                        $tentativas = $_SESSION['tentativas'];
                        $_SESSION['tentativas'] = $tentativas+1;
                        header('Location: login.php');
                    }
                }
            }           
        }        
        public function exibeFormulario():void
        {
            if(!isset($_SESSION['tentativas'])){
                $_SESSION['tentativas'] = 0;               
            }
            if($_SESSION['tentativas']>=5){
                $counter = time();                
                if(!isset($_SESSION['cont'])){
                    $_SESSION['cont'] = $counter;
                }
                if($counter - $_SESSION['cont']>=30){
                    unset($_SESSION['tentativas']);
                    unset($_SESSION['errologin']);
                    $_SESSION['cont'] = $counter;           
                    $this->exibeFormulario();
                } else {
                    $_SESSION['erroLogin']= "Foi excedido o número de tentativas! Tente mais tarde";
                    echo '';
                }
            }else{
                echo '
                <form action="login.php" method="POST"> 
                <label for="usuario">USUÁRIO</label>    
                <input type="text" name="usuario" id="usuario" placeholder="Digite seu nome" autocomplete="off">
                <label for="password">SENHA</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                <input type="submit" value="ACESSAR">
                </form>
                ';
            }
        }
        
    }

?>