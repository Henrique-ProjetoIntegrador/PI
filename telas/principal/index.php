<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

<div class="row text-center">

    <div class="imagem-usuarios col-sm-3">
        <figure>
            <a href="usuario.html"><img src="../../icones/Usuario.png" alt="Ícone usuários" width="63%"></a>
            <figcaption class="leg-usuarios">GERENCIAMENTO DE USUÁRIOS</figcaption>
    </figure>
    </div>

    <div class="imagem-clientes col-sm-2">
        <figure>
            <a href="../cliente/clientes.php"><img src="../../icones/Clientes.png" alt="Ícone Clientes."width="97%"></a>
            <figcaption class="leg-clientes">GERENCIAMENTO DE CLIENTES</figcaption>
        </figure>
    </div>

    <div class="imagem-veiculos col-sm-2">
        <figure class="figure">
            <a href="../veiculo/veiculo.php"><img src="../../icones/veiculo.png" alt="Ícone veículo"width="100%"></a>
            <figcaption class="leg-veiculos">GERENCIAMENTO DE VEICULOS</figcaption>
        </figure>
    </div>

<div class="imagem-pecas col-sm-2">
    <figure>
        <a href="pecas.html"><img src="../../icones/pecas.png" alt="Ícone peças"width="95%"></a>
        <figcaption class="leg-pecas">GERENCIAMENTO DE PEÇAS</figcaption>
    </figure>
</div>
<div class="imagem-orcamentos col-sm-3">
        <figure class="figure">
            <a href="orcamentos.html"><img src="../../icones/orcamentos.png" alt="Ícone Orçamentos." width="95%"></a>
            <figcaption class="leg-orcamentos">GERENCIAMENTO DE ORÇAMENTOS</figcaption>
        </figure>


</div>

<!-- <div class="imagem-clientes col-sm-6">
        <figure class="figure">
            <a href="../cliente/clientes.php"><img src="../../icones/Clientes.png" class="figure-img img-fluid rounded"alt="Ícone Clientes" ></a>
            <figcaption class="legenda-clientes figure-caption">GERENCIAMENTO DE CLIENTES</figcaption>
        </figure>
    </div>

    <div class="imagem-veiculos col-sm-6">
        <figure class="figure">
            <a href="../veiculo/veiculo.php"><img src="../../icones/veiculo.png" class="figure-img img-fluid rounded" alt="Ícone veículo"></a>
            <figcaption class="legenda-veiculos figure-caption">GERENCIAMENTO DE VEICULOS</figcaption>
        </figure>
    </div>
</div> -->

<!-- <div class="row text-center">
    <div class="imagem-usuarios col-sm-3">
        <figure class="figure">
            <a href="usuario.html"><img src="../../icones/Usuario.png" class="figure-img img-fluid rounded"alt="Ícone usuários"></a>
            <figcaption class="legenda-usuarios figure-caption">GERENCIAMENTO DE USUÁRIOS</figcaption>
        </figure>
    </div>
    <div class="imagem-pecas col-lg-3">
        <figure class="figure">
            <a href="pecas.html"><img src="../../icones/pecas.png" class="figure-img img-fluid rounded" alt="Ícone peças."></a>
            <figcaption class="legenda-pecas figure-caption">GERENCIAMENTO DE PEÇAS</figcaption>
        </figure>
    </div>
    <div class="imagem-orcamentos col-lg-4 offset-1">
        <figure class="figure">
            <a href="orcamentos.html"><img src="../../icones/orcamentos.png" class="figure-img img-fluid rounded" alt="Ícone Orçamentos."></a>
            <figcaption class=" legenda-orcamentos figure-caption">GERENCIAMENTO DE ORÇAMENTOS</figcaption>
        </figure>
    </div>
    <div class="imagem-clientes col-lg-4 offset-2">
        <figure class="figure">
            <a href="../cliente/clientes.php"><img src="../../icones/Clientes.webp" class="figure-img img-fluid rounded"alt="Ícone Clientes"></a>
            <figcaption class="legenda-clientes figure-caption">GERENCIAMENTO DE CLIENTES</figcaption>
        </figure>
    </div>
    <div class="imagem-veiculos col-lg-4 ">
        <figure class="figure">
            <a href="../veiculo/veiculo.php"><img src="../../icones/veiculo.png" class="figure-img img-fluid rounded" alt="Ícone veículo"></a>
            <figcaption class="legenda-veiculos figure-caption">GERENCIAMENTO DE VEICULOS</figcaption>
        </figure>
    </div>
</div> -->
</body>
</html>
