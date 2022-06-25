<?php
    class Raca_model{
        function add_raca($raca, $conn)
        {
            $sql = "INSERT INTO raca(nome, idespecie) VALUES('{$raca['nome']}', '{$raca['idespecie']}')";  
             var_dump($sql);
             
            if($conn ->query($sql)){
                return True;
            }else{
                return $conn ->error;
            }
            echo $conn ->close();
        }

        function listar_raca($conn)
        {
            $sql= "SELECT r.nome as raca, e.nome as especie FROM raca as r INNER JOIN especie as e";

            if($resultado = $conn ->query($sql)){
                
                return $resultado;
            }else{
                var_dump($conn ->error);
            }
            
            
            
            $conn ->close();
        }

        function listar_IdRraca($conn)
        {
            $sql= "SELECT * FROM raca";

            if($resultado = $conn ->query($sql)){
                
                return $resultado;
            }else{
                return($conn ->error);
            }
            
            
            
            $conn ->close();
        }

        function busca_raca($nome, $conn)
        {
            $sql= "SELECT r.nome as raca, e.nome as especie FROM raca as r INNER JOIN especie as e ON r.idespecie = e.idespecie WHERE r.nome LIKE " .'"%'.$nome.'%"';
            
            $resultado = $conn ->query($sql);
            return $resultado;

            $conn ->close();
        }

        function deletar_raca($idraca, $conn)
        {
            $sql= "DELETE * FROM raca WHERE idraca = $idraca";
            if($conn ->query($sql)){
                return True;
            }else{
                return False;
            };
            
            $conn ->close();
        }

        function alterar_raca($raca, $conn)
        {
            $sql= "UPDATE FROM raca  SET nome = '{$raca['nome']}' WHERE idraca = '{$raca['idraca']}'";
            if($conn ->query($sql)){
                return True;
            }else{
                return False;
            };
            
            $conn ->close();
        }

    }
?>
