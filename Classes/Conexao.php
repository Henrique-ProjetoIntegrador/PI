<!-- Processo que realiza conexão ao banco de dados --> 
<?php      

    $adress = 'localhost';
    $user = 'root';
    $passwd = '';
    $db = 'cido_auto_center';
    $mysql = new mysqli($adress,$user,$passwd, $db);
    $mysql->set_charset('utf8');

    if($mysql==FALSE){
        echo 'Erro na conexão';
    }
?>