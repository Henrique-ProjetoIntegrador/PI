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
    <link rel="stylesheet" href="../../styles/adicionarProprietario.css">
    <title>Adicionar Proprietario</title>
</head>
<body>
<header>
    <?php

        include_once "../layout/menu.php";

    ?>
</header>
<br>
    <div class="container">
        <div class="row">
            <div class="header-veiculo col-sm-12">
                <h1 class="col-6 offset-3 text-center">Adicionar Proprietário</h1>
            </div>

            <div class="group-veiculo col-sm-12">
                <div class="row">
                    <table class="table table-hover table-striped col-sm-8">
                        <thead class="thead-dark text-center">
                        <tr>
                            <th>Nome</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row"><strong>Luiz Henrique </strong></th>
                        </tr>
                        <tr>
                            <th scope="row"><strong>Leonardo dos Santos</strong> </th>
                        </tr>
                        <tr>
                            <th scope="row"><strong>Bruna Pereira</strong> </th>
                        </tr>
                        <tr>
                            <th scope="row"><strong>Diego alguma coisa</strong> </th>
                        </tr>
                        <tr>
                            <th scope="row"><strong>Ozeias Thomas</strong> </th>
                        </tr>
                        <tr>
                            <th scope="row"><strong>Clistenes Bento</strong> </th>
                        </tr>
                        </tbody>
                    </table>
                    <div class="option col-3 offset-1">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-danger btn-lg btn-block"> Voltar </button>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>