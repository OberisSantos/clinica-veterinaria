
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Tela Inicial</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- jquery - link cdn -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
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

  <script>
    $('#idpessoa').modal('show');
  </script>



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
                <a href="../imagens/logo.png"><img class="navbar-brand" src="../imagens/logo.png" /> </a>
                
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <!--Corpo da pagina-->
    
    <div class="container-fluid text-center">  

        <div class="row content"> 
            <!--Lado esquerdo-->
            <div class="col-sm-2 sidenav">


                <p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>
            </div>

            <!--Centro-->    
            <div class="col-sm-8 text-left"> 

                <h1>Welcome</h1>
                 <hr>

                <h3>Test</h3>
                <p>Lorem ipsum...</p>

                <!--Formulário de cadastro de cliente--> 
                <form action="../models/inserir_cliente_model.php" method="post" class="modal fade" id="#idpessoa">
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
                    <button type="button"  class="btn btn-primary btn-block" data-toggle="modal" data-target ="#idpessoa">
                    Cadastrar Animal
                    </button>
                </div>
            </div>
        </div><!--fim do row content-->
    </div>

    <footer class="container-fluid text-center">
    <p>Footer Text</p>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

   <script>
        $(document).ready(function(){
            $('#idpessoa').modal('show');
        });
   </script>

</body>

</html>

  