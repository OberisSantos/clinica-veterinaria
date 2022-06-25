<?php
    
    session_start();

    if(isset($_SESSION['usuario']) AND $_SESSION['senha']){
        
    }else{
        header("Location: ../view/tela_login.php");
    }

    include_once "../models/cliente_model.php";
    include "../conexao_bd.php";

    #Cliente 
    $cliente_m = new Cliente_model();
    $cliente_lista = $cliente_m ->listar_cliente($conn);
   

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>index</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- jquery - link cdn -->

    <!-- bootstrap 3.7.min.css-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/stilos.css" rel="stylesheet">
    <!-- bootstrap.min.css
  -->
 
</head>
<body>
    <nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <!--Campo de pesquisa-->
            <form class="navbar-form navbar-left " action="listar_animal.php" method='POST'>
                <div class="input-group">    
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#"><label class="radio-inline"><input type="radio" value = "cpf" name="radio_pesquisa" checked>CPF Cliente</label></a></li>
                        <li><a href="#"><label class="radio-inline"><input type="radio" value = "animal" name="radio_pesquisa" checked>Nome do Animal</label></a></li>
                        
                    </ul>
                </div>
                <div class="input-group">
                
                    <input type="text" name ="input_pesquisa" class="form-control" placeholder="Pesquisa">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                    
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="../models/usuario_sair.php"><span class="glyphicon glyphicon-log-out"></span> Logoff</a></li>
            </ul>
        </div>

    </nav> <!--Fim do nav-->
    
    <!--Corpo da pagina-->
    
    <div class="container-fluid text-center">  

        <div class="row content"> 

            <!--Lado esquerdo-->
            <div class="col-sm-2 sidenav">
                <div class="well"><!--Criar bortadas arredondadas-->
                    <h4 class="display-1">Acesso Rápido</h4>
                    <button type="button"class="btn btn-success btn-block" data-toggle="modal" data-target="#idcliente">
                    Cadastrar Cliente
                    </button>

                    <!-- Outra maneira de enviar onclick="window.location.href='form_cadastro_aninal.php'"-->
                    <button onclick="window.location.href='form_cadastro_aninal.php'" type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#idanimal">
                    Cadastrar Animal
                    </button>

                    <h5 class="display-1">Menu Cadastro</h5>
                    <div class="dropdown">
                        
                        <button class="btn btn-primary btn-block dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="form_cadastro_funcionario.php">Funcionário</a></li>
                            <li><a href="form_cadastro_veterinario.php">Veterinário</a></li>
                            <li><a href="buscar_animal_tratamento.php">Tratamento</a></li>
                        </ul>
                    </div>

                    <h5 class="display-1">Menu Listar</h5>

                    <div class="dropdown">
                        
                        <button class="btn btn-primary btn-block dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="listar_animal.php">Animal</a></li>
                            <li><a href="listar_funcionario.php">Funcionário</a></li>
                            <li><a href="listar_veterinario.php">Veterinário</a></li>
                            <li><a href="listar_tratamento.php">Tratamento</a></li>
                        </ul>
                    </div>
                </div>
                <div class="well">
                    
                </div>    
                        
            </div>

            <!--Centro da págia-->    
            <div class="col-sm-10 text-left"> 

                <!--*************************************Conteudos da tabela modal ************************************-->    

                <!--************************************* Criação das abas ********************************************-->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active">
                        <a href="#tratamento" role="tab"  data-toggle="tab">Tratamento</a>
                    </li>

                    <li>
                        <a href="#listar_cliente" role="tab" data-toggle="tab">Listar Cliente</a>
                    </li>

                               
                </ul>

                <!--Conteúdos das listas-->
                <div class ="tab-content">
                        <!--Inicio-->
                    <div class="tab-pane active" role="tabpanel" id="tratamento">
                        
                        
                    </div>

                    <!--Listar clientes-->
                    <div class="tab-pane" role="tabpanel" id="listar_cliente">
                        
                        <?php
                            echo"
                                <div class='table-responsive'>
                                    <table class= 'table  table-striped table-hover '>
                                    <br>
                                        <caption>Lista de Clientes</caption>
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                                <th>Telefone</th>
                                                <th>Rua</th>
                                                <th>Cidade</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                            
                                        <tbody>";
                                        if ($cliente_lista ->num_rows >0) {
                                            while($linha = $cliente_lista ->fetch_assoc()){
                                                echo"
                                                    <tr>
                                                    <td>$linha[nome]</td>
                                                    <td>$linha[cpf]</td>
                                                    <td>$linha[telefone]</td>
                                                    <td>$linha[rua]</td>
                                                    <td>$linha[cidade]</td>
                                                    <td><a type='submit' href='form_alterar.php?id=$linha[idcliente]'>Editar</a></td>
                                                    <td><a type='submit' href='../models/deletar_cliente_model.php?id=$linha[idcliente]'>Deletar</a></td>
                                                    </tr>
                                                ";
                                            }
                                        }
                            
                            echo"
                                        </tbody>    
                                    </table>
                                </div>
                            ";
                        ?>

                    </div>
                </div> <!--fim tab-content-->
                

                <!--Formulário de cadastro de cliente--> 
                <form action="../models/inserir_cliente_model.php" method="post" class="modal fade" id="idcliente">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><!--define conteudo da janela-->
                            <!--Cabeçalho--> 
                            <div class="modal-header">                                
                                <button type="button" class="close" data-dismiss="modal">
                                    <span> &times; </span>
                                </button>

                                <h4 class="modal-title">Cadastro de Cliente</h4>
                            </div>

                            <!--Corpo-->
                            <div class="modal-body">
                                
                                <!--Campos do form-->

                                <div class="row"> <!--Primeira linha com 2 colunas-->
                                    <div class="form-group col-md-6">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name ="nome" id="exampleFormControlInput1" placeholder="Nome completo ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name ="email" id="exampleFormControlInput1" placeholder="Ex.: teste@teste.com.br">
                                    </div>

                                    
                                    
                                </div><!--fim do row-->

                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label>CPF</label>
                                        <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                                        <!--<input type="text" class="form-control" name ="cpf" id="exampleFormControlInput1" placeholder="Somente Números">-->
                                    </div>
                                    
                                    <div class="form-group col-md-2">
                                        <label>Sexo</label>
                                        <select class="form-control" name='sexo' id="exampleFormControlSelect1">
                                        <option>M</option>
                                        <option>F</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Telefone</label>
                                        <input id="prependedtext" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                                        OnKeyPress="formatar('## #####-####', this)">
                                        <!--<input type="text" class="form-control" name ="telefone" id="exampleFormControlInput1" placeholder="Ex.: (xx)xxxxx-xxxx">-->

                                    </div>
                                </div><!--fim do row-->

                                <div class="row">
                                    
                                    <div class="form-group col-md-4">
                                        <label>Rua</label>
                                        <input type="text" class="form-control" name ="rua" id="exampleFormControlInput1" placeholder="Ex.: Rua X">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Número</label>
                                        <input type="text" class="form-control" name ="numero" id="exampleFormControlInput1" placeholder="">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" name ="bairro" id="exampleFormControlInput1" placeholder="Ex.: Centro">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>CEP</label>
                                        <input id="cep" name="cep" placeholder="Apenas números" class="form-control input-md" required="" value="" type="search" maxlength="8" pattern="[0-9]+$">
                                        <!--<input type="text" class="form-control" name ="cep" id="exampleFormControlInput1" >-->
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" name ="cidade" id="exampleFormControlInput1" >
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>UF</label>
                                        <input type="text" class="form-control" name ="uf" maxlength="2" id="exampleFormControlInput1">
                                    </div>

                                </div><!--fim do row-->


                            </div> <!--fim body-->

                            <!--Rodapé-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-success">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                  
                <!--Alerta de ok-->
    <div class="modal fade" id="alertas_ok" tabindex="-1" role="dialog" aria-labelledby="alertasLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                <p>Operação finalizada com sucesso</p>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
            </div>
        </div>
    </div>
    
         <!--Alerta de erro-->
    <div class="modal fade" id="alertas_error" tabindex="-1" role="dialog" aria-labelledby="alertasLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    <p>Operação finalizada com erro</p>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
            </div>
            </div>
        </div>
    </div>

            </div>

            <!--Lado Direito
            <div class="col-sm-2 sidenav">
                
            </div>-->
        </div><!--fim do row content-->
    </div>

    <footer class="container-fluid text-center">
    <p></p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script>
        $('#idlogin').modal('show')
    </script>                              
                                        
    <?php

        if (isset($_GET['index'])){
            $cadastro = $_GET['index'];

            if ($cadastro == 1) {
                $alerta = "Cliente Cadastrado com sucesso!";
                echo"
                <script>
                    $('#alertas_ok').modal('show')
                </script>";

            }elseif($cadastro == 0){
                $alerta = "Error ao tentar cadastrar Cliente!";
                echo"
                <script>
                    $('#alertas_error').modal('show')
                </script>";
                

            }
        };
       
   

    ?>
   
</body>
</html>
