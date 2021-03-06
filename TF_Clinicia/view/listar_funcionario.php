

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Listar animal</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- jquery - link cdn -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap 3.7.min.css-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/stilos.css" rel="stylesheet">
  
    <!-- bootstrap.min.css
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  -->
  
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
                 
                    <!-- Outra maneira de enviar onclick="window.location.href='form_cadastro_aninal.php'"-->
                    <button onclick="window.location.href='form_cadastro_funcionario.php'" type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#idanimal">
                    Cadastrar Funcion??rio
                    </button>
                </div>
               
            </div><!--Fim do Lado esquerdo-->

            <!--Centro da p??gia-->    
            <div class="container col-sm-8 text-left"> 
                <?php
                    include "../conexao_bd.php";
    
                    #include_once "animal_model.php";
                    include_once "../models/funcionario_model.php";
                    $funcionario_modal = new Funcionario_model();
                    $resultado_busca = null;

                    if (isset($_POST['input_pesquisa']) AND isset( $_POST['radio_pesquisa'])){
                        $btn_radio = $_POST['radio_pesquisa'];
                        $pesquisa_dados = $_POST['input_pesquisa'];
                        /*
                        if($btn_radio == "cpf"){
                        
                            include_once "../controllers/funcionario.php";
                            $funcionario = new Funcionario();
                            
                    
                            $funcionario ->setCpf($pesquisa_dados);
                    
                            $cpf = $cliente ->getCpf();
                    
                        $resultado_busca = $animal_modal ->busca_tutor($cpf, $conn);
                            
                    
                        }elseif($btn_radio == "animal"){
                            include_once "../controllers/animal.php";
                            $animal = new Animal();
                    
                            $animal ->setCodigo($pesquisa_dados);
                            
                            $nome = $animal ->getCodigo();
                            
                            $resultado_busca = $animal_modal ->busca_animal($nome, $conn);
                            
                        }*/
                    }else{
                        $resultado_busca = $funcionario_modal ->listar_funcionario($conn);
                    }
                    


                            echo"
                                <div class='table-responsive'>
                                    <table class= 'table  table-striped table-hover '>
                                    <br>
                                        <caption>Lista de Funcionario</caption>
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
                                        if ($resultado_busca ->num_rows >0) {
                                            while($linha = $resultado_busca ->fetch_assoc()){
                                                echo"
                                                    <tr>
                                                    <td>$linha[nome]</td>
                                                    <td>$linha[codigo]</td>
                                                    <td>$linha[telefone]</td>
                                                    <td>$linha[rua]</td>
                                                    <td>$linha[cidade]</td>
                                                    <td><a type='submit' href='form_alterar_funcionario.php?id=$linha[idfuncionario]'>Editar</a></td>
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
           
            </div><!--fim Centro da p??gia-->   

            <!--Lado Direito-->
            <div class="col-sm-2 sidenav">
                <ul class="nav nav-list">
                        <li class="nav-header">Navegar</li>
                        <li class="active"><a href="index.php">Home</a></li>
                        
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
