<?php
    session_start();
    include "../conexao_bd.php";

    if (isset($_POST['radio_pesquisa']) AND isset($_POST['input_pesquisa'])){
        $btn_radio = $_POST['radio_pesquisa'];
        include_once "../models/animal_model.php";

        $animal_model = new Animal_model();

        $pesquisa_dados = $_POST['input_pesquisa'];
        
        $modal = 1;

        if($btn_radio == "cpf"){
           #include_once "../models/cliente_model.php";
            include_once "../controllers/cliente.php";
            $cliente = new Cliente();
            #$cliente_modal = new Cliente_model();
    
            $cliente ->setCpf($pesquisa_dados);
    
            $cpf = $cliente ->getCpf();
    
           $resultado_busca = $animal_model ->busca_tutor($cpf, $conn);

           var_dump($resultado_busca);
            
    
        }elseif($btn_radio == "animal"){
            include_once "../controllers/animal.php";
            $animal = new Animal();
    
            $animal ->setCodigo($pesquisa_dados);
            
            $codigo = $animal ->getCodigo();
            
            
        }
    };
        

   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>form cadastro de animal</title>

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
        <form class="navbar-form navbar-left " action="#" method='POST'>
           
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
            <li><a href="../models/usuario_sair.php"><span class="glyphicon glyphicon-log-out"></span> Logoff</a></li>
        </ul>
    </div>

</nav>

    
    <!--Corpo da pagina-->
    
    <div class="container-fluid text-center">  

        <div class="row content"> 

            <!--Lado esquerdo-->
            <div class="col-sm-2 sidenav">
                <div class="well"><!--Criar bortadas arredondadas-->
                 
                    <!-- Outra maneira de enviar onclick="window.location.href='form_cadastro_aninal.php'"-->
                    <button disabled onclick="window.location.href='form_cadastro_funcionario.php'" type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#ifuncionario">
                    Cadastrar Funcionario
                    </button>
                </div>
               
            </div><!--Fim do Lado esquerdo-->

            <!--Centro da págia-->    
            <div class="container col-sm-8 text-left"> 
                        
                <!--Formulário de cadastro de Funcionario--> 
                <form action="../models/inserir_funcionario_model.php" method="post" class="modal fade" id="idfuncionario">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><!--define conteudo da janela-->
                            <!--Cabeçalho--> 
                            <div class="modal-header">                                
                                <button type="button" class="close" data-dismiss="modal">
                                    <span> &times; </span>
                                </button>

                                <h4 class="modal-title">Cadastro de Funcionário</h4>
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
                                        <label>Matrícula</label>
                                        <input id="codigo" name="codigo" placeholder="Matricula do Funcionário" class="form-control input-md" required="" type="text" maxlength="20" >
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
                            <button onclick="window.location.href='index.php'" type="button" class="btn btn-default" data-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-success">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--fim Centro da págia-->   

            <!--Lado Direito-->
            <div class="col-sm-2 sidenav">
            <ul class="nav nav-list">
                        <li class="nav-header">Navegar</li>
                        <li class="active"><a href="index.php">Home</a></li>
                        
                </ul>
                
                </ul>
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
        $('#idfuncionario').modal('show')
    </script>
</body>
</html>
