<?php
    class Tratamento_model{

        function add_tratamento($tratamento, $conn)
        {
            $sql = "INSERT INTO tratamento(data_inicio, hora, tipo, valor, idanimal, idveterinario)
            VALUES ('{$tratamento['data_inicio']}', '{$tratamento['hora']}', '{$tratamento['tipo']}',
            '{$tratamento['valor']}', '{$tratamento['idanimal']}', '{$tratamento['idveterinario']}')";

            if($conn ->query($sql)){
                return True;
            }else{
                return $conn ->error;
            }
            $conn ->close();
        }

        function listar_tratamento($conn)
        {
            $sql   = "SELECT * FROM tratamento as t inner join animal as a on t.idanimal = a.idanimal";

            $resultado = $conn -> query($sql);


            return $resultado;

            $conn ->close();
        }
    }


?>