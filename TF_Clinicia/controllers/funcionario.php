<?php
    include_once "pessoa.php";
    class Funcionario extends Pessoa{
        private $codigo; #unico
        #idpessoa;

        public function setCodigo($codigo){
            $this->codigo = $codigo;
            return True;
        }

        public function getCodigo()
        {
            return $this->codigo;
        }
    }

?>