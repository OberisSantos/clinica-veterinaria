<?php

    class Endereco_model{
        
        private $idendereco; 

        function getIdEndereco()
        {
            return $this->idendereco;
        }
       
        function add_endereco($endereco, $conn)
        {
            $sql = "INSERT INTO endereco(rua, numero, bairro, uf, cidade, cep)";
            $sql .= "VALUES('{$endereco['rua']}', '{$endereco['numero']}', '{$endereco['bairro']}', 
                    '{$endereco['uf']}', '{$endereco['cidade']}', '{$endereco['cep']}')"; 
            
            if($conn ->query($sql)){
                $this ->idendereco = $conn ->insert_id; //OBTER O ÚLTIMO ID CADASTRADO
                return True;
            }else{
                return False;
            };
                    
            $conn ->close();
        }

        function alterar_endereco($endereco, $conn)
        {
            $sql = "UPDATE endereco SET rua = '{$endereco['rua']}', numero = '{$endereco['numero']}', 
            bairro = '{$endereco['bairro']}', uf = '{$endereco['uf']}', cidade = '{$endereco['cidade']}', 
            cep = '{$endereco['cep']}' WHERE idendereco = '{$endereco['idendereco']}'";

            var_dump($sql);
            echo "<br>";
            if ($conn ->query($sql)) {
                return True;
            }else{
                return $conn ->error;
            }

            $conn ->close();
        }

        function deletar_endereco($idendereco, $conn)
        {
            $sql = "DELETE FROM endereco WHERE idendereco = $idendereco";
            if($conn ->query($sql)){
                return True;
            }else{
                return $conn ->error;
            }

            $conn ->close();
        }

        function buscar_endereco($idendereco, $conn)
        {
            $sql = "SELECT * FROM endereco WHERE idendereco = $idendereco";

            $resultado = $conn ->query($sql);
            
            return $resultado;
            
            $conn ->close();
        }
   
    }
   
    

?>