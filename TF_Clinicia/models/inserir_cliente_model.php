<?php
    #pasta controllers    
    include_once "../controllers/endereco.php";
    include_once "../controllers/cliente.php";
    #pasta models    
    include_once "pessoa_model.php";
    include_once "endereco_model.php";
    include_once "cliente_model.php";
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
    $cliente_model = new Cliente_model();   

    #model
    $endereco = new Endereco(); 
    $cliente =  new Cliente();

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

    $nome       =   $_POST['nome'];
    $sexo       =   $_POST['sexo'];
    $email      =   $_POST['email'];
    $telefone   =   $_POST['telefone'];
    $cpf        =   $_POST['cpf'];

    
    if($sucesso){
        if($cliente ->setNome($nome));
            if($cliente ->setSexo($sexo));
                if($cliente ->setEmail($email));
                    if($cliente ->setTelefone($telefone));
                        if($cliente ->setCPF($cpf)){
                            
                            #cadastro do endereco
                            if ($endereco_model ->add_endereco($Array_endereco, $conn)){
                                #receber o id cadastrado no último endereco
                                $idEndereco =   $endereco_model ->getIdEndereco();

                                $array_pessoa = array(
                                    'nome'          => $cliente ->getNome(),
                                    'sexo'          => $cliente ->getSexo(),
                                    'email'         => $cliente ->getEmail(),
                                    'telefone'      => $cliente ->getTelefone(),
                                    'idendereco'    => $idEndereco,
                                );
                                if($pessoa_model ->add_pessoa($array_pessoa, $conn)){
                                    #receber o id da pessoa que foi inserido.
                                    $idpessoa = $pessoa_model ->getIdPessoa();

                                    $array_cliente = array(
                                        'cpf'  => $cliente ->getCPF(),
                                        'idpessoa' => $idpessoa,
                                    );

                                    if($cliente_model ->add_cliente($array_cliente, $conn)){
                                        echo "Cliente Cadastrado com sucesso!";
                                        header("Location: ../view/tela_inicial_02.php?index=1");

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
    };
    header("Location: ../view/index.php?index=0");

    
 
?>
    
