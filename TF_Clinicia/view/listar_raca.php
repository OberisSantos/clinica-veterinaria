
<?php
    include "../conexao_bd.php";
    include_once "../models/raca_model.php";
    $raca_model = new Raca_model();

    $result_raca = null;
    if (isset($_POST['input_pesquisa'])){
        

        $pesquisa_dados = $_POST['input_pesquisa'];
        
        include_once "../controllers/raca.php";
        $raca = new Raca();

        $raca ->setNome($pesquisa_dados);
        
        $nome = $raca ->getNome();
        
        $result_raca = $raca_model ->busca_raca($nome, $conn);

    }else{
        $result_raca = $raca_model ->listar_raca($conn);
    };
        
    
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Listar raça</title>

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
            
                <input type="text" name ="input_pesquisa" class="form-control" placeholder="Nome da raça">
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
                    <button onclick="window.location.href='form_cadastro_aninal.php'" type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#idanimal">
                    Cadastrar Animal
                    </button>

                    <button onclick="window.location.href='form_cadastro_reca.php'" type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#idanimal">
                    Cadastrar Raça
                    </button>
                </div>
               
            </div><!--Fim do Lado esquerdo-->

            <!--Centro da págia-->    
            <div class="container col-sm-8 text-left"> 
                <?php
               
                    
                    if ($result_raca ->num_rows > 0) {
                        
                        echo"
                            <div class='table-responsive'>
                                <table class= 'table  table-striped table-hover '>
                                <caption><b>Lista de Raça/Especie</b></caption>
                                <br>
                                    
                                    <thead>
                                        <tr>
                                            <th>Nome da Raça</th>
                                            <th>Espécie</th>
                                            
                                        </tr>
                                    </thead>
                        
                                    <tbody>";
                                    
                                    while($linha = $result_raca ->fetch_assoc()){
                                        echo"
                                            <tr>
                                            <td>$linha[raca]</td>
                                            <td>$linha[especie]</td>
                                            
                                            </tr>
                                        ";
                                    }
                                    
                        
                        echo"
                                    </tbody>    
                                </table>
                            </div>
                        ";
                    }else{
                        echo "
                        <br>
                        <div class='alert alert-danger' role='alert'>

                            <h5><b>Raça não encontrada.</b></h5>
                        </div>
                        ";
                    }
                    
                    

        
                ?>         
           
            </div><!--fim Centro da págia-->   

            <!--Lado Direito-->
            <div class="col-sm-2 sidenav">
                <ul class="nav nav-list">
                    <li class="nav-header">Navegar</li>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="nav-header">Cadastro</li>
                    <li><a href="form_cadastro_especie.php">Especie</a></li>
                    
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
    
</body>
</html>
