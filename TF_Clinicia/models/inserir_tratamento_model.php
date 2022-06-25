<?php
    include_once "../conexao_bd.php";
    include_once "tratamento_model.php";
    include_once "../controllers/tratamento.php";

    $idanimal = $_POST['idanimal'];
    $tipo = $_POST['tipo'];
    $idveterinario = $_POST['idveterinario'];
    $data_inicio = $_POST['data'];
    $hora = $_POST['hora'];
    $valor = $_POST['valor'];

    $tratamento = new Tratamento();
    $tratamento_model = new Tratamento_model();

    $tratamento ->setDataInicio($data_inicio);
    $tratamento ->setTipo($tipo);
    $tratamento ->setValor($valor);

    $data_inicio = $tratamento ->getDataInicio();
    $tipo = $tratamento ->getTipo();
    $valor = $tratamento ->getValor();

    $array_tratamento = array(
        'data_inicio' =>  $data_inicio,
         'hora' => $hora,
          'tipo' => $tipo,
           'valor' => $valor,
           'idanimal' => $idanimal, 
           'idveterinario' => $idveterinario,
    );
    
   
    if($tratamento_model ->add_tratamento($array_tratamento, $conn)){
        header("Location: ../view/index.php?index=1");
    }else{
        header("Location: ../view/index.php?index=0");
    }


?>