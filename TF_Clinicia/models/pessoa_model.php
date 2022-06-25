<?php
//SQL para tabela pessoa

    class Pessoa_model{

        private $idpessoa;

        function getIdPessoa()
        {
            return $this->idpessoa;
        }

        function add_pessoa($pessoa, $conn)
        {
            $sql = "INSERT INTO pessoa(nome, sexo, email, telefone, idendereco)"; 
            $sql .= "VALUES('{$pessoa['nome']}', '{$pessoa['sexo']}', '{$pessoa['email']}', '{$pessoa['telefone']}', {$pessoa['idendereco']} )";
            
            if($conn ->query($sql)){
                $this ->idpessoa = $conn ->insert_id; //OBTER O ÚLTIMOO ID CADASTRADO
                
                return True;
            }else{
                return False;
            }

            $conn ->close();
    
        }

        function alterar_pessoa($pessoa, $conn)
        {
            $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}', sexo = '{$pessoa['sexo']}', 
            email = '{$pessoa['email']}', telefone = '{$pessoa['telefone']}' WHERE idpessoa = '{$pessoa['idpessoa']}'";
            
            
            if ($conn ->query($sql)) {
                return True;
            }else{
                return $conn ->error;
            }
            $conn ->close();

        }

        function buscar_pessoa($idpessoa, $conn)
        {
            $sql = "SELECT * FROM pessoa WHERE idpessoa = $idpessoa";

            $resultado = $conn ->query($sql);

            return $resultado;

            $conn ->close();
        }

        function deletar_pessoa($idpessoa, $conn)
        {
            $sql = "DELETE FROM pessoa WHERE idpessoa = $idpessoa";
            
            if($conn ->query($sql)){
                return True;
            }else{
                return False;
            }

            
            $conn ->close();
        }


    }
    

?>