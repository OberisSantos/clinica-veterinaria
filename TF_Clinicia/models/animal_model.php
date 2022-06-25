<?php
    class Animal_model{
        function add_animal($animal, $conn)
        {
            $sql = "INSERT INTO animal(nome, data_nascimento, sexo, idcliente, idraca)";
            $sql.= "VALUES('{$animal['nome']}', '{$animal['data_nascimento']}', '{$animal['sexo']}', 
            '{$animal['idcliente']}', '{$animal['idraca']}')";

            
            if($conn ->query($sql)){
                return True;
            }else{
                echo $conn ->error;
            }
            $conn ->close();
        }
        
        function busca_tutor($cpf, $conn)
        {
            $sql = "SELECT a.nome, DATE_FORMAT(a.data_nascimento, '%d %b %Y') as data_nascimento, a.sexo, 
            DATE_FORMAT(a.data_cadastro, '%d %b %Y %T') AS data_cadastro, p.nome as cliente, r.nome as raca 
            FROM animal as a INNER JOIN pessoa as p INNER JOIN cliente AS c ON a.idcliente = c.idcliente 
            and c.idpessoa = p.idpessoa INNER JOIN raca AS r ON a.idraca = r.idraca 
            WHERE c.cpf = '{$cpf}'";

            $resultado = $conn ->query($sql);
            
            return $resultado;

            $conn ->close();
        }

        function listar_animal($conn)
        {
            $sql = "SELECT a.idanimal, a.nome, DATE_FORMAT(a.data_nascimento, '%d %b %Y') as data_nascimento, a.sexo, 
            DATE_FORMAT(a.data_cadastro, '%d %b %Y %T') AS data_cadastro, p.nome as cliente, r.nome as raca 
            FROM animal as a INNER JOIN pessoa as p INNER JOIN cliente AS c 
            ON a.idcliente = c.idcliente and c.idpessoa = p.idpessoa INNER JOIN raca AS r ON a.idraca = r.idraca";

            $resultado = $conn ->query($sql);
            
            return $resultado;

            $conn ->close();
        }

         
        function busca_animal_id($idanimal, $conn)
        {
            $sql = "SELECT a.idanimal, a.nome, p.nome as cliente FROM animal as a INNER JOIN pessoa as p INNER JOIN cliente AS c 
            ON a.idcliente = c.idcliente and c.idpessoa = p.idpessoa WHERE a.idanimal = $idanimal";
            
           $resultado = $conn ->query($sql);
            
            return $resultado;

            $conn ->close();
        }

        function busca_animal($nome, $conn)
        {
            $sql = "SELECT a.idanimal, a.nome, DATE_FORMAT(a.data_nascimento, '%d %b %Y') as data_nascimento, a.sexo, 
            DATE_FORMAT(a.data_cadastro, '%d %b %Y %T') AS data_cadastro, p.nome as cliente, r.nome as raca 
            FROM animal as a INNER JOIN pessoa as p INNER JOIN cliente AS c 
            ON a.idcliente = c.idcliente and c.idpessoa = p.idpessoa INNER JOIN raca AS r ON a.idraca = r.idraca 
            WHERE a.nome LIKE " .'"%'.$nome.'%"';
            
           $resultado = $conn ->query($sql);
            
            return $resultado;

            $conn ->close();
        }

    }
?>
