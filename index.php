<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/menu.css"/>
    <link rel="stylesheet" href="styles/index.css"/>
    <title>HOME</title>
</head>
<body>
<?php

    include_once "layout/menu.php";

?>
<main>
    <ul class="tarefas">
        <li>
            <a href="usuario.html"><img src="icones/Usuario.png" width=100 height=100></a>
            <p class="tarefa-descricao">GERENCIAMENTO DE USUÁRIOS</p>
        </li>
         <li>
            <a href="pecas.html"><img src="icones/pecas.png" width=100 height=100></a>
            <p class="tarefa-descricao">GERENCIAMENTO DE PEÇAS</p>
         </li>   
        <li>
            <a href="orcamentos.html"><img src="icones/orcamentos.png" alt="orcamentos" width=100 height=100></a>
            <p class="tarefa-descricao">NOVO ORÇAMENTO</p>
        </li>
        <li id="clienteborder">
            <a href="telas/clientes.php"><img src="icones/Clientes.webp" alt="clientes" width=100 height=100></a>
            <p class="tarefa-descricao">GERENCIAMENTOS DE CLIENTES</p>
        </li> 
        <li>
            <a href="ca.html"><img src="icones/drawing4-512.png" alt="carros" width=100 height=100></a>
            <p class="tarefa-descricao">GERENCIAMENTO DE VEICULOS</p>
        </li>
    </ul>
</main>  
<footer>

</footer>

</body>
</html>