<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/menu.css"/>
    <link rel="stylesheet" href="../../styles/novoClientes.css"/>

    <title>HOME</title>
</head>
<body>
<header>
<?php

    include_once "../layout/menu.php";

?>
</header>

<main>
<h1>NOVO CLIENTE</h1>
    <div id="areas"> 
        <form class="formularios">
            <div class="container">
                <div class="row">
                    <div class="campos col-sm-8 text-center">
                        <div class="campos-input">
                            <div class="row">
                                <label for="idClient" class="message col-sm-3">idCliente</label>
                                <input class="form form-control form-control-sm col-sm-5" id="idClient" type="text" required/>
                            </div>
                        </div>
                        <div class="campos-input">
                            <div class="row">
                                <label for="Data de Cadastro" class="col-sm-3">Data de Cadastro</label>
                                <input class="form form-control form-control-sm col-sm-5"   id="Data de Cadastro" type="date" required/>
                            </div>
                        </div>
                        <div class="campos-input">
                            <div class="row">
                                <label for="Nome" class="col-sm-3">Nome</label>
                                <input class="form form-control form-control-sm col-sm-5"    id="Nome" type="text" required/>
                            </div>
                        </div>
                        <div class="campos-input">
                            <div class="row">
                                <label for="cpf" class="col-sm-3">CPF</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="cpf" type="text" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="rg" class="col-sm-3">RG</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="rg" type="text" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="nascimento" class="col-sm-3">Nascimento</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="nascimento" type="data" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="telefone" class="col-sm-3">telefone</label>
                                <input class="form form-control form-control-sm col-sm-5"  placeholder="(DDD)x xxxx-xxxx"  id="telefone" type="tel" required/>
                             </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="email" class="col-sm-3">E-mail</label>
                                <input class="form form-control form-control-sm col-sm-5"  placeholder="email@dominio.com" id="email" type="email" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="endereco" class="col-sm-3">Endereço</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="endereco" type="text" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="numero" class="col-sm-3">Numero</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="numero" type="text" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="complemento" class="col-sm-3">Complemento</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="complemento" type="text" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="cidade" class="col-sm-3">Cidade</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="cidade" type="text" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="UF" class="col-sm-3">UF</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="uf" type="text" required/>
                            </div>
                        </div>

                        <div class="campos-input">
                            <div class="row">
                                <label for="cep" class="col-sm-3">CEP</label>
                                <input class="form form-control form-control-sm col-sm-5"  id="cep" type="text" required/> 
                            </div>
                        </div>    
                    </div>
                    <div class="option col-sm-3 offset-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-danger btn-lg btn-block"> Pesquisar </button>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

</footer>
</body>
</html>