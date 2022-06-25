<?php

    class Veterinario_model{

        function add_veterinario($veterinario, $conn)
        {
            $sql = "INSERT INTO veterinario(registro, idpessoa) 
            VALUES('{$veterinario['registro']}', '{$veterinario['idpessoa']}')";

            if($conn ->query($sql)){
                return True;
            }else{
                echo $conn ->error;
                return False;
            }

            $conn ->close();
        }

        function listar_veterinario($conn)
        {
            $sql = "SELECT * FROM veterinario";

            $resultado = $conn ->query($sql);
            
            return $resultado;

            $conn ->close;
        }
    }
    
?>