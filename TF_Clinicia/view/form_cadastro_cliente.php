
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

    <div class="container">

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
                                                    <td><a type='submit' href='pagina_inicial03.php?valor=1'>Detalhe</a></td>
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
                
        <div class="jumbotron ">

            <h3>Cadastro de Cliente</h3>

            <form action= "../models/inserir_cliente_model.php" method='POST'>

                <div class="form-row"> <!--Primeira linha com 2 colunas-->
                    <div class="form-group col-sm-6">
                        <label>Nome</label>
                        <input type="text" class="form-control" name ="nome" id="exampleFormControlInput1" placeholder="Nome completo ">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name ="email" id="exampleFormControlInput1" placeholder="Ex.: teste@teste.com.br">
                    </div>
                    
                </div>

                <div class="form-row">
                    <div class="form-group col-md">
                        <label>CPF</label>
                        <input type="text" class="form-control" name ="cpf" id="exampleFormControlInput1" placeholder="Somente Números">
                    </div>
                    <div class="form-group col-md-1">
                        <label>Sexo</label>
                        <select class="form-control" name='sexo' id="exampleFormControlSelect1">
                        <option>M</option>
                        <option>F</option>

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name ="telefone" id="exampleFormControlInput1" placeholder="Ex.: (xx)xxxxx-xxxx">

                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="form-group col-md-4">
                        <label>Rua</label>
                        <input type="text" class="form-control" name ="rua" id="exampleFormControlInput1" placeholder="Ex.: Rua X">
                    </div>
                    <div class="form-group col-md-1">
                        <label>Número</label>
                        <input type="text" class="form-control" name ="numero" id="exampleFormControlInput1" placeholder="Ex.: 00">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Bairro</label>
                        <input type="text" class="form-control" name ="bairro" id="exampleFormControlInput1" placeholder="Ex.: Centro">
                    </div>
                    <div class="form-group col-md-1">
                        <label>UF</label>
                        <input type="text" class="form-control" name ="uf" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Cidade</label>
                        <input type="text" class="form-control" name ="cidade" id="exampleFormControlInput1" >
                    </div>
                    <div class="form-group col-md-2">
                        <label>CEP</label>
                        <input type="text" class="form-control" name ="cep" id="exampleFormControlInput1" >
                    </div>

                </div>

                <button type="submit" class="btn btn-secondary">Cadastrar</button>
                
            </form> <!--form-->
        </div>    <!--jumbotron-->
    </div><!--FIM DA CONTAINER-->
    
    <!-- JavaScript -->
    <!-- jQuery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>