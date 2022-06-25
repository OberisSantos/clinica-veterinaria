

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>form cadastro de tratamento</title>

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
                <ul class="nav navbar-nav navbar-left">
                   <!-- <li><a href="#"><label class="radio-inline"><input type="radio" value = "cpf" name="radio_pesquisa" checked>CPF Cliente</label></a></li> -->
                    <!--<li><a href="#"><label class="radio-inline"><input type="radio" value = "animal" name="radio_pesquisa" checked>Nome do Animal</label></a></li>-->
                </ul>
            </div>
            <div class="input-group">
                <!--
                <input type="text" name ="input_pesquisa" class="form-control" placeholder="CPF">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>-->
                
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
                    Cadastrar Tratamento
                    </button>
                </div>
               
            </div><!--Fim do Lado esquerdo-->

            <!--Centro da págia-->    
            <div class="container col-sm-8 text-left"> 
                        
                <form  action= "../models/inserir_tratamento_model.php" method='POST'>
                    
                    <br><h4><b>Formulário de Cadastro de Tratamento</b></h4>
                    <?php
                        include "../conexao_bd.php";

                        $idanimal = $_GET['id'];

        
                        #include_once "animal_model.php";
                        include_once "../models/animal_model.php";
                        $animal_modal = new Animal_model();

                        $busca_animal = $animal_modal ->busca_animal_id($idanimal, $conn);
                        
                        $animal_busca = $busca_animal ->fetch_assoc();

                           
                            echo"
                                <div class ='form-row'><!--Inicio do row-->
                                    <div class ='form-group col-md-4'>
                                    <label class='text-muted' for='cpf'>Nome do Animal</label>
                                    <input type='text' readonly='readonly' value ='$animal_busca[nome]'  name='animal' id='animal'>
                                    <input type='hidden' value ='$animal_busca[idanimal]'  name='idanimal' id='idanimal'>
                                    
                                    </div>

                                </div><!--Inicio do form-row-->";

                    ?>   

                    

                    <div class ="row"><!--Inicio do row--> </div>

                    <div class ="form-row"><!--Inicio do row-->
                        
                        <div class ="form-group col-md-8">
                          <label class="text-muted" for="nome">Tipo de tratamento</label>
                          <input type="text" name="tipo" id="tipo" class="form-control">
                          
                        </div>


                        <div class ="form-group col-md-4">
                            <label class="text-muted" for="sel1">Registro do Veterinário</label>
                            <select class="form-control" name='idveterinario' id="exampleFormControlSelect1">
                                
                                <?php
                                     include_once "../conexao_bd.php";
                                     include_once "../models/veterinario_model.php";
         
                                     $veterinario_model = new Veterinario_model();
         
                                     $result_veterinario = $veterinario_model ->listar_veterinario($conn);
                                     
                                    
                                    if($result_veterinario ->num_rows > 0){
                                    

                                        while($linha = $result_veterinario ->fetch_assoc()){
                                            var_dump($linha);
                                            echo "<option value ='$linha[idveterinario]'>$linha[registro]</option>";     
                                        } 
                                    }                                           
                                ?>

                            </select>
                        </div>

                    </div><!--Inicio do form-row-->
                    <div class ="row"><!--Inicio do row--> </div>
                    <div class ="form-row"><!--Inicio do row-->
                        
                        <div class ="form-group col-md-4">
                          <label class="text-muted" for="data_nascimento">Data</label>
                          <input type="date" name="data" id="data" class="form-control" >
                          
                        </div>

                        <div class ="form-group col-md-4">
                          <label class="text-muted" for="data_nascimento">Hora</label>
                          <input type="time" name="hora" id="hora" class="form-control" >
                          
                        </div>

                        <div class ="form-group col-md-4">
                          <label class="text-muted" for="data_nascimento">Valor</label>
                          <input type="number" name="valor" id="valor" class="form-control" >
                          
                        </div>
                 
                        

                    </div><!--Inicio do form-row-->

                    
                    <div class ="row"></div>

                    <div class ="form-row"><!--Inicio do row-->
                        

                        <div class ="form-group text-right col-md-12">
                        <button type="submit" class="btn btn-success">
                                Cadastrar
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
                <li><a href="form_cadastro_aninal.php">Animal</a></li>
                
                </ul>
            </div><!--Fim do Lado Direito-->


        </div><!--fim do row content-->
         
        </div><!--fim do row content-->
    </div>

    <footer class="container-fluid text-center">
    <p></p>
    </footer>
    
    
    
</body>
</html>
