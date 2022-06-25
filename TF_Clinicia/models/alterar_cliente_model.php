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
    $idendereco = $_POST['idendereco'];
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
                                'idendereco' => $idendereco,
                                'rua' => $endereco ->getRua(),
                                'numero' => $endereco ->getNumero(),
                                'bairro' => $endereco ->getBairro(),
                                'uf' => $endereco ->getUf(),
                                'cidade' => $endereco ->getCidade(),
                                'cep' => $endereco ->getCep(),
                        
                            );  
                            var_dump($Array_endereco);

                            $sucesso = True;
                            #Armazenar o ip do endereco
                            /*if ($endereco_model ->add_endereco($Array_endereco, $conn)){
                                $sucesso = True;
                            };*/
                        };
    #dados de pessoa
    $idpessoa = $_POST['idpessoa'];                  
    $nome       =   $_POST['nome'];
    $sexo       =   $_POST['sexo'];
    $email      =   $_POST['email'];
    $telefone   =   $_POST['telefone'];

    #dados de cliente
    $idcliente = $_POST['idcliente'];
    $cpf        =   $_POST['cpf'];

    
    if($sucesso){
        
        if($cliente ->setNome($nome));
            if($cliente ->setSexo($sexo));
                if($cliente ->setEmail($email));
                    if($cliente ->setTelefone($telefone));
                    
                        if($cliente ->setCPF($cpf)){
                            
                            #cadastro do endereco
                            if ($endereco_model ->alterar_endereco($Array_endereco, $conn)){
                               
                                $array_pessoa = array(
                                    'idpessoa' => $idpessoa,
                                    'nome'          => $cliente ->getNome(),
                                    'sexo'          => $cliente ->getSexo(),
                                    'email'         => $cliente ->getEmail(),
                                    'telefone'      => $cliente ->getTelefone(),
                                );
                                if($pessoa_model ->alterar_pessoa($array_pessoa, $conn)){
                                    #receber o id da pessoa que foi inserido.
                                   
                                    $array_cliente = array(
                                        'idcliente' => $idcliente,
                                        'cpf'  => $cliente ->getCPF(),
                                    );

                                    if($cliente_model ->alterar_cliente($array_cliente, $conn)){
                                       
                                        header("Location: ../view/index.php?inserir");

                                    };
                                };
                            };

                        }
    };
    header("Location: ../view/index.php?inserir");

    
 
?>
    
