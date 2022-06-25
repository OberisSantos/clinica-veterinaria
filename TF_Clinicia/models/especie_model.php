<?php
    class Especie_model{
        function add_especie($especie, $conn)
        {
            $sql = "INSERT INTO especie(nome) VALUES('{$especie['nome']}')";   
            if($conn ->query($sql)){
                return True;
            }else{
                return $conn ->error;
            }
            $conn ->close();
        }

        function listar_especie($conn)
        {
            $sql= "SELECT * FROM especie";

            $resultado = $conn ->query($sql);
            
            return $resultado;
            $conn ->close();
        }
        
        function busca_especie($nome, $conn)
        {
            $sql= "SELECT * FROM especie WHERE nome LIKE " .'"%'.$nome.'%"';
            $resultado = $conn ->query($sql);
            
            return $resultado;

            $conn ->close();
        }

        function deletar_especie($idespecie, $conn)
        {
            $sql= "DELETE * FROM especie WHERE idraca = $idespecie";
            if($conn ->query($sql)){
                return True;
            }else{
                return False;
            };
            
            $conn ->close();
        }

        function alterar_especie($especie, $conn)
        {
            $sql= "UPDATE FROM especie  SET nome = '{$especie['nome']}' WHERE idespecie = '{$especie['idespecie']}'";
            if($conn ->query($sql)){
                return True;
            }else{
                return False;
            };
            
            $conn ->close();
        }

    }
?>
