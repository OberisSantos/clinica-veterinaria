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
                    <button disabled onclick="window.location.href='form_cadastro_aninal.php'" type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#idanimal">
                    Cadastrar Animal
                    </button>
                </div>
               
            </div><!--Fim do Lado esquerdo-->

            <!--Centro da págia-->    
            <div class="container col-sm-8 text-left"> 
                        
                <form  action= "../models/inserir_animal_model.php" method='POST'>
                    
                    <br><h4><b>Formulário de Cadastro de Animal</b></h4>
                    
                    <div class ="form-row"><!--Inicio do row-->
                        <div class ="form-group col-md-4">
                          <label class="text-muted" for="cpf">CPF do Tutor</label>
                          <input type="text" maxlength="11" name="cpf" id="cpf" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00">
                          
                        </div>

                    </div><!--Inicio do form-row-->

                    <div class ="row"><!--Inicio do row--> </div>

                    <div class ="form-row"><!--Inicio do row-->
                        
                        <div class ="form-group col-md-8">
                          <label class="text-muted" for="nome">Nome do Animal</label>
                          <input type="text" name="nome" id="nome" class="form-control">
                          
                        </div>

                        <?php
                            include_once "../conexao_bd.php";
                            include_once "../models/raca_model.php";

                            $raca_modal = new Raca_model();

                            $result_raca = $raca_modal -> listar_IdRraca($conn);
                        ?>

                        <div class ="form-group col-md-4">
                            <label class="text-muted" for="sel1">Raça do Animal</label>
                            <select class="form-control" name='idraca' id="exampleFormControlSelect1">
                                <option>Selecionar uma raça</option>
                                <?php 
                                    while($linha = $result_raca ->fetch_assoc()){
                                        echo "<option value ='$linha[idraca]'>$linha[nome]</option>";     
                                    }                                            
                                ?>

                            </select>
                        </div>

                    </div><!--Inicio do form-row-->
                    <div class ="row"><!--Inicio do row--> </div>
                    <div class ="form-row"><!--Inicio do row-->
                        
                        <div class ="form-group col-md-4">
                          <label class="text-muted" for="data_nascimento">Data de Nascimento</label>
                          <input type="date" name="data_nascimento" id="cdata_nascimentoodigo" class="form-control" placeholder="Código ou registro do animal">
                          
                        </div>

                       

                        <div class ="form-group col-md-8">
                            <label class="text-muted" for="Sexo">Sexo</label><br>
                            <label class="radio-inline"><input type="radio" value = "m" name="sexo" checked>Macho</label>
                            <label class="radio-inline"><input type="radio" value = "f" name="sexo" checked>Fêmea</label>
                        </div>
                        

                    </div><!--Inicio do form-row-->

                    
                    <div class ="row"></div>

                    <div class ="form-row"><!--Inicio do row-->
                        

                        <div class ="form-group text-right col-md-12">
                        <button type="submit" class="btn btn-success">
                                Enviar
                            </button>
                          
                        </div>

                    </div><!--Inicio do form-row-->
                   
                    
                    

                </form> <!--form-->
            </div><!--fim Centro da págia-->   

            <!--Lado Direito-->
            <div class="col-sm-2 sidenav">
                <ul class="nav nav-list">
                <li class="nav-header">Navegar</li>
                <li class="active"><a href="index.php">Home</a></li>

                <li class="nav-header">Cadastro</li>
                <li><a href="form_cadastro_reca.php">Raça</a></li>
                
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
