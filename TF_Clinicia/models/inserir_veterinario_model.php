<?php
    #pasta controllers    
    include_once "../controllers/endereco.php";
    include_once "../controllers/veterinario.php";
    #pasta models    
    include_once "pessoa_model.php";
    include_once "endereco_model.php";
    include_once "veterinario_model.php";
    #Raiz
    include_once "../conexao_bd.php";

    #receber os dodos do formulário endereco via POST
    $rua    =   $_POST['rua'];
    $numero =   $_POST['numero'];
    $bairro =   $_POST['bairro'];
    $uf     =   $_POST['uf'];
    $cidade =   $_POST['cidade'];
    $cep    =   $_POST['cep'];

    //Criar objeto
    #controlles   
    $endereco_model = new Endereco_model();  
    $pessoa_model = new Pessoa_model();
    $veterinario_model = new Veterinario_model();   

    #model
    $endereco = new Endereco(); 
    $veterinario =  new Veterinario();

    $sucesso = True;

    if($endereco ->setRua($rua));
        if($endereco ->setNumero($numero));
            if($endereco ->setBairro($bairro));
                if($endereco ->setUf($uf));
                    if($endereco ->setCidade($cidade));
                        if($endereco ->setCep($cep)){
                             
                             $Array_endereco = array(
                                'rua' => $endereco ->getRua(),
                                'numero' => $endereco ->getNumero(),
                                'bairro' => $endereco ->getBairro(),
                                'uf' => $endereco ->getUf(),
                                'cidade' => $endereco ->getCidade(),
                                'cep' => $endereco ->getCep(),
                        
                            );

                            $sucesso = True;
                            #Armazenar o ip do endereco
                            /*if ($endereco_model ->add_endereco($Array_endereco, $conn)){
                                $sucesso = True;
                            };*/
                        };
    #dados de pessoa
    $nome       =   $_POST['nome'];
    $sexo       =   $_POST['sexo'];
    $email      =   $_POST['email'];
    $telefone   =   $_POST['telefone'];
    #dados veterinario
    $registro        =   $_POST['codigo'];

    
    if($sucesso){
        
        if($veterinario ->setNome($nome));
            if($veterinario ->setSexo($sexo));
                if($veterinario ->setEmail($email));
                    if($veterinario ->setTelefone($telefone));
                        if($veterinario ->setRegistro($registro)){
                            #cadastro do endereco
                            if ($endereco_model ->add_endereco($Array_endereco, $conn)){
                                #receber o id cadastrado no último endereco
                                $idEndereco =   $endereco_model ->getIdEndereco();

                                $array_pessoa = array(
                                    'nome'          => $veterinario ->getNome(),
                                    'sexo'          => $veterinario ->getSexo(),
                                    'email'         => $veterinario ->getEmail(),
                                    'telefone'      => $veterinario ->getTelefone(),
                                    'idendereco'    => $idEndereco,
                                );
                                if($pessoa_model ->add_pessoa($array_pessoa, $conn)){
                                    #receber o id da pessoa que foi inserido.
                                    $idpessoa = $pessoa_model ->getIdPessoa();

                                    $array_veterinario = array(
                                        'registro'  => $veterinario ->getRegistro(),
                                        'idpessoa' => $idpessoa,
                                    );

                                    if($veterinario_model ->add_veterinario($array_veterinario, $conn)){
                                        header("Location: ../view/index.php?inserir=1");

                                    }else{#apagar o endereço e pessoa que foi criado.                                        
                                        $pessoa_model ->deletar_pessoa($idpessoa, $conn);
                                        $endereco_model ->deletar_endereco($idEndereco, $conn);
                                        return False;
                                    };

                                }else{#apagar o endereço que foi criado.
                                    $endereco_model ->deletar_endereco($idEndereco, $conn);
                                    return False;
                                };
                            };

                        }
        else{
            header("Location: ../view/index.php?inserir=0");
        }
    };
 
?>
    
