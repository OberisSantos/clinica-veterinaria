<?php
    include_once "pessoa.php";

    class Veterinario extends Pessoa{
        private $registro;
        #idpessoa;


        public function setRegistro($registro){
            $this->registro = $registro;
            return True;
        }

        public function getRegistro(){
            return $this->registro;
        }

    }

?>