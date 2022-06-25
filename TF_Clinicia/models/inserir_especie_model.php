<?php
    include_once "../conexao_bd.php";
    include_once "especie_model.php";
    include_once "../controllers/especie.php";

    $nome = $_POST['nome'];

    $especie = new Especie();
    $especie_model = new Especie_model();

    $especie ->setNome($nome);

    $array =  array(
        'nome' => $especie ->getNome(),

    );

    $especie_model ->add_especie($array, $conn);
    
    header("Location: ../view/listar_especie.php");

?>