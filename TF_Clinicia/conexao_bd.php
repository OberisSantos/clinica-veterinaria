<?php
 $serve = "localhost";
 $user = "root";
 $pass = "";
 $dbname = "clinica_veterinaria";

 $conn = new mysqli($serve, $user, $pass, $dbname);

 if($conn->connect_error){
     echo "erro";
     die("Conexão falhou ". $conn ->connect_error);
 }else{
    return True;
    //echo "Conexão realizada com sucesso! ";
 }

?>