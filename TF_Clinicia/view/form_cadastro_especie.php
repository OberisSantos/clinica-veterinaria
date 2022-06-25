 

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastrar especie</title>

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
        <form class="navbar-form navbar-left " action="listar_raca.php" method='POST'>
            
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
                
               
            </div><!--Fim do Lado esquerdo-->

            <!--Centro da págia-->    
            <div class="container col-sm-8 text-left"> 
                        
                <!--Formulário de alterar de cliente--> 
                <form action="../models/inserir_especie_model.php" method="post" class="modal fade" id="idespecie">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><!--define conteudo da janela-->
                            <!--Cabeçalho--> 
                            <div class="modal-header">                                
                                <button type="button" class="close" data-dismiss="modal">
                                    <span> &times; </span>
                                </button>

                                <h4 class="modal-title">Cadastrar Marca</h4>
                            </div>

                            <!--Corpo-->
                            <div class="modal-body">
                                
                                <!--Campos do form-->

                                <div class="row"> <!--Primeira linha com 2 colunas-->

                                    <div class="form-group col-md-8">

                                        <label>Nome da Especie</label>
                                        <input type="text" placeholder="Ex.: Cachorro, Gato" class="form-control" name ="nome" id="exampleFormControlInput1">
                                    </div>

                                
                                    
                                    
                                </div><!--fim do row-->


                            </div> <!--fim body-->

                            <!--Rodapé-->
                            <div class="modal-footer">
                                <button onclick="window.location.href='listar_raca.php'" type="button" class="btn btn-default" data-dismiss="modal">
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
                        <li><a href="form_cadastro_animal.php">Animal</a></li>
                        
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
        $('#idespecie').modal('show')
    </script>
</body>
</html>
