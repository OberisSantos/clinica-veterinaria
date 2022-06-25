<?php
    include "../conexao_bd.php";
    include_once "animal_model.php";
    include_once "cliente_model.php";

    include_once "../controllers/animal.php";
    include_once "../controllers/cliente.php";

    $cpf = $_POST['cpf'];
   $nome = $_POST['nome'];
   $data_nascimento = $_POST['data_nascimento'];
   $sexo = $_POST['sexo'];   
   $idraca_input = $_POST['idraca'];
   
    $animal = new Animal();
    $animal_model = new Animal_model();
    $cliente = new Cliente();
    $cliente_model = new Cliente_model();


    $animal ->setNome($nome);
    $animal ->setData_nascimento($data_nascimento);
    $animal ->setSexo($sexo);
    $cliente ->setCpf($cpf);

    $cpf = $cliente ->getCpf();

    if($idcliente = $cliente_model ->buscar_id($cpf, $conn)){

        $linha = $idcliente ->fetch_assoc();
        $idcliente = $linha['idcliente'];

        $array_animal = array(
            'nome'              => $animal ->getNome(),
            'data_nascimento'   => $animal ->getData_nascimento(),
            'sexo'              => $animal ->getSexo(),
            'idcliente'         => $idcliente,
            'idraca'         => $idraca_input,
    
        );
        
        $animal_model ->add_animal($array_animal, $conn);

        header("Location: ../view/index.php");
    }else{
        header("Location: ../view/form_cadastro_aninal.php");
    }

    
   

?>