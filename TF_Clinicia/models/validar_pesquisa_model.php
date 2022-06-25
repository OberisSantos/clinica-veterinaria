<?php

    include "../conexao_bd.php";
    
    #include_once "animal_model.php";
    include_once "animal_model.php";


    $btn_radio = $_POST['radio_pesquisa'];
    $pesquisa_dados = $_POST['input_pesquisa'];
    
    $animal_modal = new Animal_model();
    $resultado_busca = null;

    if($btn_radio == "cpf"){
       
        include_once "../controllers/cliente.php";
        $cliente = new Cliente();
        

        $cliente ->setCpf($pesquisa_dados);

        $cpf = $cliente ->getCpf();

       $resultado_busca = $animal_modal ->busca_tutor($cpf, $conn);
        

    }elseif($btn_radio == "animal"){
        include_once "../controllers/animal.php";
        $animal = new Animal();
        echo "pesquisa por animal: $pesquisa_dados";

        $animal ->setCodigo($pesquisa_dados);
        
        $nome = $animal ->getCodigo();
        
        $resultado_busca = $animal_modal ->busca_animal($nome, $conn);
        
    }
    
    if ($resultado_busca ->num_rows > 0) {
       
        #header("Location:../view/listar_animal.php?lista=1");
    }else{
        
        #header("Location:../view/listar_animal.php?lista=0");
    }

?>