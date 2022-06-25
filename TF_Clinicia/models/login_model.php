<?php

    function add_login($usuario, $conn){

        $sql = "INSERT INTO tblogin(idfuncionario, usuario, senha) VALUES ('{$usuario['idfuncionario']}',
        '{$usuario['usuario']}', '{$usuario['senha']}')";
    
        if($conn ->query($sql)){
            return True;
        }else{
            return False;
        }
        $conn ->close();
    }

    function verificar_usuario($usuario, $conn){
        $sql = "SELECT * FROM tblogin WHERE usuario = '{$usuario['usuario']}' and senha = '{$usuario['senha']}'";

        $resposta = $conn ->query($sql);

        return $resposta;
        $conn ->close();
    }

?>


