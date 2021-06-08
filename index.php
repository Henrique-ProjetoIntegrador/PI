<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="styles/menu.css">
    <link rel="stylesheet" href="styles/index.css">

    <title>Tela Principal</title>
</head>
<body>
<header>
    <?php

        include_once "layout/menu.php";

    ?>
</header>
<div class="row text-center">
    <div class="imagem-usuarios col-lg-4 offset-1">
        <figure class="figure">
            <a href="usuario.html"><img src="icones/Usuario.png" class="figure-img img-fluid rounded"
                                        alt="Ícone usuários" width=250 height=250></a>
            <figcaption class="figure-caption">GERENCIAMENTO DE USUÁRIOS</figcaption>
        </figure>
    </div>
    <div class="imagem-peças col-lg-3">
        <figure class="figure">
            <a href="pecas.html"><img src="icones/pecas.png" class="figure-img img-fluid rounded" alt="Ícone peças."
                                      width=250 height=250></a>
            <figcaption class="figure-caption">GERENCIAMENTO DE PEÇAS</figcaption>
        </figure>
    </div>
    <div class="imagem-orcamentos col-lg-3">
        <figure class="figure">
            <a href="orcamentos.html"><img src="icones/orcamentos.png" class="figure-img img-fluid rounded"
                                           alt="Ícone Orçamentos." width=250 height=250></a>
            <figcaption class="figure-caption">GERENCIAMENTO DE ORÇAMENTOS</figcaption>
        </figure>
    </div>
    <div class="imagem-clientes col-lg-4 offset-2">
        <figure class="figure">
            <a href="telas/clientes.php"><img src="icones/Clientes.webp" class="figure-img img-fluid rounded"
                                              alt="Ícone Clientes" width=250 height=250></a>
            <figcaption class="figure-caption">GERENCIAMENTO DE CLIENTES</figcaption>
        </figure>
    </div>
    <div class="imagem-veiculos col-lg-4 ">
        <figure class="figure">
            <a href="telas/veiculo.php"><img src="icones/veiculo.png" class="figure-img img-fluid rounded" alt="Ícone veículo" width=250 height=250></a>
            <figcaption class="figure-caption">GERENCIAMENTO DE VEICULOS</figcaption>
        </figure>
    </div>
</div>
</body>
</html>
