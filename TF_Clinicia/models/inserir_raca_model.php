<?php
    include_once "../conexao_bd.php";
    include_once "raca_model.php";
    include_once "../controllers/raca.php";

    $nome = $_POST['raca'];
    $idespecie = $_POST['especie'];

    $raca = new Raca();
    $raca_model = new Raca_model();

    $raca ->setNome($nome);

    $array =  array(
        'nome' => $raca ->getNome(),
        'idespecie' => $idespecie,

    );

    var_dump($array);


    $raca_model ->add_raca($array, $conn);
    
    header("Location: ../view/listar_raca.php");

?>