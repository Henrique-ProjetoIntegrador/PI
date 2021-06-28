<?php
    include '../../includes/verificaSeLogado.php';    
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/index.css">
    <title>Tela Principal</title>
</head>
<body>
<header>
    <?php

        include_once "../layout/menu.php";

    ?>
</header>

<div class="conteiner-icones row text-center">

    <div class="icones-opcoes imagem-usuarios col-sm-4">
        <figure>
            <a href="../usuario/index.php"><i class="fas fa-user mod-icon" alt="Ícone usuários"></i></a>
             <figcaption class="figure-caption">GERENCIAMENTO DE USUÁRIOS</figcaption>
    </figure>
    </div>

    <div class="icones-opcoes imagem-clientes col-sm-4">
        <figure>
            <a href="../cliente/index.php"><i class="fas fa-users mod-clientes" alt="Ícone Clientes."></i></a>
            <figcaption class="figure-caption">GERENCIAMENTO DE CLIENTES</figcaption>
        </figure>
    </div>

    <div class="icones-opcoes imagem-veiculos col-sm-4">
        <figure class="figure">
            <a href="../veiculo/index.php"><i class="fas fa-car mod-veiculo" alt="Ícone veículo"></i></a>
            <figcaption class="figure-caption">GERENCIAMENTO DE VEÍCULOS</figcaption>
        </figure>
    </div>

<div class="icones-opcoes imagem-pecas col-sm-6">
    <figure>
        <a href="../pecas/index.php"><i class="fas fa-wrench mod-pecas" alt="Ícone peças"></i></a>
        <figcaption class="figure-caption">GERENCIAMENTO DE PEÇAS</figcaption>
    </figure>
</div>
<div class="icones-opcoes imagem-orcamentos col-sm-6">
        <figure class="figure">
            <a href="../orcamento/index.php"><i class="fas fa-file-invoice-dollar mod-orcamento" alt="Ícone Orçamentos"></i></a>
            <figcaption class="figure-caption">NOVO ORÇAMENTOS</figcaption>
        </figure>
</div>

</body>
</html>
