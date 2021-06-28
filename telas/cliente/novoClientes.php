<?php
    include '../../includes/verificaSeLogado.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php
        include_once "../layout/designPatterns/stylesBootstrapEcssReset.php";
    ?>
    <link rel="stylesheet" href="../../styles/menu.css"/>
    <link rel="stylesheet" href="../../styles/novoClientes.css"/>
    <link rel="stylesheet" href="../alerts/modal.css">

    <title>Novo Cliente</title>
</head>
<body>
<header>
<?php

    include_once "../layout/menu.php";

?>
</header>
    <div class="container">
        <div class="row-2">
            <div class="header-veiculo col-sm-12">
                <h2 class="col-6 offset-2 text-center">Novo Clientes</h2>
            </div>
        </div>
        <form method="POST"action="processaNovoCliente.php">  
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
                <div class="form-group">
                    <label for="nome-cliente">Nome do cliente:</label>
                    <input type= "text" class="form-control" name="nome" id="nome" placeholder="Insira o nome">
                </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Insira o CPF">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type ="number" class="form-control" name="telefone" id="telefone" placeholder="(DDD)x xxxx-xxxx">
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type ="number" class="form-control" name="celular" id="celular" placeholder="(DDD)x xxxx-xxxx">
            </div>
            <div class="form-group">
                <label for="nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" name="nascimento" id="nascimento" placeholder="Insira a data">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Insira o endereço">
            </div>
            <?php
                if(isset($_SESSION['erroCampos'])){
                    echo "<div class='alert alert-danger'>";
                    echo $_SESSION['erroCampos'];
                    echo "</div>";
                    unset($_SESSION['erroCampos']);
                }
                ?>
            </div>
            <div class="options-buttons col-sm-2">
                <div class= "row">
                    <div class="col-sm-12">
                        <button type="submit"class=" btn btn-danger btn-lg btn-block">Salvar</button>                          
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <a href ="../cliente/PesquisarCliente"><button type= "button"class="btn btn-danger btn-lg btn-block">Pesquisar</a></button>
                    <br>
                    </div>
                    <div class="col-sm-12">
                        <a href ="../cliente/index.php"><button type= "button"class="btn btn-danger btn-lg btn-block">Voltar</a></button>
                    </div>
                </div>
            </div>      
        </div> 
        </form> 
    </div>   
</body>
</html>





<!-- <h1>NOVO CLIENTE</h1>
<div class="container">
        <div class="row-2">
            <div class="header-veiculo col-sm-12">
                <h2 class="col-6 offset-2 text-center">Novo Clientes</h2>
            </div>
        </div>
        <form method="POST"action="processaNovoCliente.php">  
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
                <div class="form-group">
                    <label for="nome-cliente">Nome do cliente:</label>
                    <input type= "text" class="form-control" name="nome" id="nome" placeholder="Insira o nome">
                </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Insira o CPF">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type ="number" class="form-control" name="telefone" id="telefone" placeholder="(DDD)x xxxx-xxxx">
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type ="number" class="form-control" name="celular" id="celular" placeholder="(DDD)x xxxx-xxxx">
            </div>
            <div class="form-group">
                <label for="nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" name="nascimento" id="nascimento" placeholder="Insira a data">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Insira o endereço">
            </div>

            <PHP>

            </div>
            <div class="options-buttons col-sm-2">
                <div class= "row">
                    <div class="col-sm-12">
                        <button type="submit"class=" btn btn-danger btn-lg btn-block">Salvar</button>                          
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <a href ="../cliente/PesquisarCliente"><button type= "button"class="btn btn-danger btn-lg btn-block">Pesquisar</a></button>
                    <br>
                    </div>
                    <div class="col-sm-12">
                        <a href ="../cliente/index.php"><button type= "button"class="btn btn-danger btn-lg btn-block">Voltar</a></button>
                    </div>
                </div>
            </div>      
        </div> 
        </form> 
    </div> -->





<!-- <h1>NOVO CLIENTE</h1>
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
</html> -->









<!-- 
<div class="container">
        <div class="row-2">
            <div class="header-clientes col-sm-12">
                <h2 class="col-6 offset-2 text-center">Editar Clientes</h2>
            </div>
        </div>
        <form method="POST"action="">  
        <div class="row">       
            <div class="formulario col-sm-6 offset-2">
                <div class="form-group">
                    <label for="idClient" class="message col-sm-3">idCliente</label>
                    <input class="form form-control form-control-sm col-sm-5" id="idClient" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="Data de Cadastro" class="col-sm-3">Data de Cadastro</label>
                    <input class="form form-control form-control-sm col-sm-5"   id="Data de Cadastro" type="date" required/>
                </div>
                <div class="form-group">
                    <label for="Nome" class="col-sm-3">Nome</label>
                    <input class="form form-control form-control-sm col-sm-5"    id="Nome" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="cpf" class="col-sm-3">CPF</label>
                    <input class="form form-control form-control-sm col-sm-5"  id="cpf" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="rg" class="col-sm-3">RG</label>
                    <input class="form form-control form-control-sm col-sm-5"  id="rg" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="nascimento" class="col-sm-3">Nascimento</label>
                    <input class="form form-control form-control-sm col-sm-5"  id="nascimento" type="data" required/>
                </div>
                <div class="form-group">
                    <label for="telefone" class="col-sm-3">telefone</label>
                    <input class="form form-control form-control-sm col-sm-5"  placeholder="(DDD)x xxxx-xxxx"  id="telefone" type="tel" required/>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3">E-mail</label>
                    <input class="form form-control form-control-sm col-sm-5"  placeholder="email@dominio.com" id="email" type="email" required/>
                </div>
                <div class="form-group">
                    <label for="endereco" class="col-sm-3">Endereço</label>
                    <input class="form form-control form-control-sm col-sm-5"  id="endereco" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="numero" class="col-sm-3">Numero</label>
                    <input class="form form-control form-control-sm col-sm-5"  id="numero" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="complemento" class="col-sm-3">Complemento</label>
                    <input class="form form-control form-control-sm col-sm-5"  id="complemento" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="cidade" class="col-sm-3">Cidade</label>
                    <input class="form form-control form-control-sm col-sm-5"  id="cidade" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="UF" class="col-sm-3">UF</label>
                    <input class="form form-control form-control-sm col-sm-5"  id="uf" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="cep" class="col-sm-3">CEP</label>
                    <input class="form form-control form-control-sm col-sm-5"  id="cep" type="text" required/> 
                </div>
            </div>
            <div class="options-buttons col-sm-2">
                <div class= "row">
                    <div class="col-sm-12">
                        <button type="submit"class=" btn btn-danger btn-lg btn-block">Salvar</button>                          
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <a href ="../cliente/index.php"><button type= "button"class="btn btn-danger btn-lg btn-block">Voltar</a></button>
                    </div>
                </div>
            </div>      
        </div> 
        </form> 
            </div>   
</body>
</html> -->