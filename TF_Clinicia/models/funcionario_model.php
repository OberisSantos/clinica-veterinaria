<?php

    class Funcionario_model{

        public function add_funcionario($funcionario, $conn)
        {
            $sql = "INSERT INTO funcionario(codigo, idpessoa) VALUES('{$funcionario['codigo']}', 
            '{$funcionario['idpessoa']}')";
           
            if ($conn ->query($sql)) {
                return True;
            }else{
                echo $conn ->error;
            }
        }

        function buscar_nome($idfuncionario, $conn)
        {
            $sql = "SELECT p.nome FROM funcionario as f INNER JOIN pessoa as p ON f.idfuncionario = p.idfuncionario 
            WHERE f.idfuncionario = $idfuncionario";

            $resultado = $conn ->query($sql);
            return $resultado;

            $conn ->close();
        }

        function listar_funcionario($conn)
        {
            $sql = "SELECT * FROM funcionario as f INNER JOIN pessoa as p on f.idpessoa = p.idpessoa
           INNER JOIN endereco as e on p.idendereco = e.idendereco";

            $resultado = $conn ->query($sql);
            return $resultado;
            

            $conn ->close();
        }
    }
?>