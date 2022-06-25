<?php
    include_once "../conexao_bd.php";
    require_once "login_model.php";

    $usuario = array(
        'usuario' => $_POST['usuario'],
        'senha' => $_POST['senha'], 

    );

    $resultado = verificar_usuario($usuario, $conn); #de login_model.php

    if($resultado){
        $linha = $resultado ->fetch_assoc();

        session_start();
        /*Colocando um valor 
        $_SESSION['usuario'] = $linha['usuario'];
        $_SESSION['senha'] = $linha['senha'];
         */

        $_SESSION['usuario'] = '1';
        $_SESSION['senha'] = '1';
        header("Location: ../view/index.php");
    }else{
        header("Location: ../view/tela_login.php");
    }
?>