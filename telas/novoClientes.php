<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../styles/menu.css"/>
    <link rel="stylesheet" href="../styles/novoClientes.css"/>
    <title>HOME</title>
</head>
<body>
<header>
<?php

    include_once "../layout/menu.php";

?>
</header>

<main>
    <form class="formulario">
            <label for="idClient">idCliente</label>
            <input class="cadastroCliente" id="idClient" type="text" required/>

            <label for="Data de Cadastro">Data de Cadastro</label>
            <input class="cadastroCliente"   id="Data de Cadastro" type="email" required/>

            <label for="Nome">Nome</label>
            <input class="InfPessoais"   id="Nome" type="text" required/>

            <label for="cpf">CPF</label>
            <input class="InfPessoais" id="cpf" type="text" required/>

            <label for="rg">RG</label>
            <input class="InfPessoais" id="rg" type="text" required/>

            <label for="nascimento">Nascimento</label>
            <input class="InfPessoais" id="nascimento" type="data" required/>

            <label for="telefone">telefone</label>
            <input class="infContato" placeholder="(DDD)x xxxx-xxxx"  id="telefone" type="tel" required/>

            <label for="email">E-mail</label>
            <input class="infContato" placeholder="email@dominio.com" id="email" type="email" required/>

            <label for="endereco">Endereço</label>
            <input class="infEnd" id="endereco" type="text" required/>

            <label for="numero">Numero</label>
            <input class="infEnd" id="numero" type="text" required/>

            <label for="complemento">Complemento</label>
            <input class="infEnd" id="complemento" type="text" required/>

            <label for="cidade">Cidade</label>
            <input class="infEnd" id="cidade" type="text" required/>

            <label for="UF">UF</label>
            <input class="infEnd" id="uf" type="text" required/>

            <label for="cep">CEP</label>
            <input class="infEnd" id="cep" type="text" required/>

            
                <input id="salvar"  type="submit" value="SALVAR"/>
           
            
</form>
            
</main>   
<footer>

</footer>
</body>
</html>