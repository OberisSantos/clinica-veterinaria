<?php
    include_once "../models/cliente_model.php";
    include "../conexao_bd.php";

    #Cliente 
    $cliente_m = new Cliente_model();
    $cliente_lista = $cliente_m ->listar_cliente($conn);
    if($v = isset($_GET['valor'])? $_GET['valor'] : 0);
   
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Tela Inicial</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- jquery - link cdn -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap 3.7.min.css-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
    
  
    <!-- bootstrap.min.css
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  -->
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>
    

    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
            <div class="navbar-header">
                <!--
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                -->
                <a class="navbar-brand" href="../imagens/logo.png"><img  src="../imagens/logo.png" width="25" height="25" alt=""/> </a>
                
            </div>

           

            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="form-inline my-2 my-md-0">
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                </li>
            </ul>
            </div>
        </div>
        
    </nav> <!--Fim do nav-->
    
    <!--Corpo da pagina-->
    
    <div class="container-fluid text-center">  

        <div class="row content"> 
            <!--Lado esquerdo-->
            <div class="col-sm-2 sidenav">


                <p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>
            </div>

            <!--Centro da págia-->    
            <div class="col-sm-8 text-left"> 
                <br>

                <!--Criação das abas-->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="active">
                        <a href="#tratamento" role="tab"  data-toggle="tab">Inicio</a>
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
                                                <th></th>
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
                                                    <td><a type='submit' href='teste_cliente.php?valor=1'>Detalhe</a></td>
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
                                        <input type="text" class="form-control" name ="cpf" id="exampleFormControlInput1" placeholder="Somente Números">
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
                                        <input type="text" class="form-control" name ="telefone" id="exampleFormControlInput1" placeholder="Ex.: (xx)xxxxx-xxxx">

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
                                        <input type="text" class="form-control" name ="cep" id="exampleFormControlInput1" >
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" name ="cidade" id="exampleFormControlInput1" >
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>UF</label>
                                        <input type="text" class="form-control" name ="uf" id="exampleFormControlInput1">
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
                  

            </div>

            <!--Lado Direito-->
            <div class="col-sm-2 sidenav">
                <div class="well"><!--Criar bortadas arredondadas-->
                    <button type="button"class="btn btn-primary btn-block" data-toggle="modal" data-target="#idcliente">
                    Cadastrar Cliente
                    </button>
                </div>
                <div class="well">
                    <form action="teste_cliente.php" method="post">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target ="#idanimal">
                        Cadastrar Animal
                        </button>
                    </form>
                    
                </div>
            </div>
        </div><!--fim do row content-->
    </div>

    <footer class="container-fluid text-center">
    <p></p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
</body>
</html>
