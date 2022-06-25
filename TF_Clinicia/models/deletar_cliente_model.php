<?php

    include_once "pessoa_model.php";
    include_once "endereco_model.php";
    include_once "cliente_model.php";
    include_once "animal_model.php";

    #Raiz
    include_once "../conexao_bd.php";

    $idcliente = $_GET['id'];

    $cliente_model = new Cliente_model();
    $pessoa_model = new Pessoa_model();
    $endereco_model = new Endereco_model();
    $animal_model = new Animal_model();


    $busca_cliente = $cliente_model ->buscar_cliente_avancado($idcliente, $conn);

    $cliente = $busca_cliente ->fetch_assoc();

    $idcliente = $cliente['idcliente'];
    $idendereco = $cliente['idendereco'];
    $idpessoa = $cliente['idpessoa'];

    if($animal_model ->busca_animal_idCliente($idcliente, $conn)){
        header("Location: index.php?index=0");
    }else{
        $cliente_model ->deletar_cliente($idcliente, $conn);
        $pessoa_model ->deletar_pessoa($idpessoa, $conn);
        $endereco_model ->deletar_endereco($idendereco, $conn);
    }
    

    

    
?>