<?php
    include_once "../conexao_bd.php";
    include_once "../models/cliente_model.php";
    include_once "../models/endereco_model.php";
    include_once "../models/pessoa_model.php";

    $idcliente = $_GET['id'];

    $cliente_model = new Cliente_model();
    $pessoa_model = new Pessoa_model();
    $endereco_model = new Endereco_model();

    
    $recult_cliente = $cliente_model ->buscar_cliente($idcliente, $conn);

    $cliente = $recult_cliente ->fetch_assoc();

    $result_pessoa = $pessoa_model ->buscar_pessoa($cliente['idpessoa'], $conn);
    $pessoa = $result_pessoa ->fetch_assoc();
    

    $endereco = $endereco_model ->buscar_endereco($pessoa['idendereco'], $conn);

    $endereco = $endereco ->fetch_assoc();



?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Formulário Alterar</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- jquery - link cdn -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap 3.7.min.css-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/stilos.css" rel="stylesheet">
  
   
  
</head>
<body>
<nav class="navbar navbar-inverse ">
    <div class="container-fluid">
        <!--Campo de pesquisa-->
        <form class="navbar-form navbar-left " action="" method='POST'>
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
            <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logoff</a></li>
        </ul>
    </div>

</nav>

    
    <!--Corpo da pagina-->
    
    <div class="container-fluid text-center">  

        <div class="row content"> 

            <!--Lado esquerdo-->
            <div class="col-sm-2 sidenav">
                <div class="well"><!--Criar bortadas arredondadas-->
                 
                </div>
               
            </div><!--Fim do Lado esquerdo-->

            <!--Centro da págia-->    
            <div class="container col-sm-8 text-left"> 
                
                <!--Formulário de alterar de cliente--> 
                <form action="../models/alterar_cliente_model.php" method="post" class="modal fade" id="idcliente">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><!--define conteudo da janela-->
                            <!--Cabeçalho--> 
                            <div class="modal-header">                                
                                <button type="button" class="close" data-dismiss="modal">
                                    <span> &times; </span>
                                </button>

                                <h4 class="modal-title">Alterar dados do cliente</h4>
                            </div>

                            <!--Corpo-->
                            <div class="modal-body">
                                
                                <!--Campos do form-->

                                <div class="row"> <!--Primeira linha com 2 colunas-->

                                    <div class="form-group col-md-6">
                                        <input type="hidden" name = "idpessoa" value ="<?php echo $pessoa['idpessoa'];?>" >
                                        <input type="hidden" name = "idcliente" value ="<?php echo $cliente['idcliente'];?>" >
                                        <input type="hidden" name = "idendereco" value ="<?php echo $endereco['idendereco'];?>" >

                                        <label>Nome</label>
                                        <input type="text" class="form-control" name ="nome" id="exampleFormControlInput1" value ="<?php echo $pessoa['nome'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name ="email" id="exampleFormControlInput1" value ="<?php echo $pessoa['email'];?>">
                                    </div>

                                    
                                    
                                </div><!--fim do row-->

                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label>CPF</label>
                                        <input type="text" class="form-control" name ="cpf" id="exampleFormControlInput1" maxlength="11" value ="<?php echo $cliente['cpf'];?>">
                                    </div>
                                    
                                    <div class="form-group col-md-2">
                                        <label>Sexo</label>
                                        <select class="form-control" name='sexo' id="exampleFormControlSelect1">
                                        <option value ="<?php echo $pessoa['sexo'];?>"><?php echo $pessoa['sexo'];?></option>
                                        <option>M</option>
                                        <option>F</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" name ="telefone" id="exampleFormControlInput1" maxlength="11" value ="<?php echo $pessoa['telefone'];?>">

                                    </div>
                                </div><!--fim do row-->

                                <div class="row">
                                    
                                    <div class="form-group col-md-4">
                                        <label>Rua</label>
                                        <input type="text" class="form-control" name ="rua" id="exampleFormControlInput1" value ="<?php echo $endereco['rua'];?>">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Número</label>
                                        <input type="text" class="form-control" name ="numero" id="exampleFormControlInput1" value ="<?php echo $endereco['numero'];?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" name ="bairro" id="exampleFormControlInput1" value ="<?php echo $endereco['bairro'];?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>CEP</label>
                                        <input type="text" class="form-control" name ="cep" id="exampleFormControlInput1" maxlength="8" value ="<?php echo $endereco['cep'];?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" name ="cidade" id="exampleFormControlInput1" value ="<?php echo $endereco['cidade'];?>">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>UF</label>
                                        <input type="text" class="form-control" name ="uf" id="exampleFormControlInput1" value ="<?php echo $endereco['uf'];?>">
                                    </div>

                                </div><!--fim do row-->


                            </div> <!--fim body-->

                            <!--Rodapé-->
                            <div class="modal-footer">
                                <button onclick="window.location.href='home.php'" type="button" class="btn btn-default" data-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-success">
                                    Alterar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

           
            </div><!--fim Centro da págia-->   

            <!--Lado Direito-->
            <div class="col-sm-2 sidenav">
                
            </div><!--Fim do Lado Direito-->


        </div><!--fim do row content-->
         
        </div><!--fim do row content-->
    </div>

    <footer class="container-fluid text-center">
    <p></p>
    </footer>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
   
    <script>
        $('#idcliente').modal('show')
    </script>
    
</body>
</html>
