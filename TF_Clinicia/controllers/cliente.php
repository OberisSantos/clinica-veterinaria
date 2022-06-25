<?php
    include_once "pessoa.php";

    class Cliente extends Pessoa{
        private $cpf;


        public function setCpf($cpf){
            if(strlen($cpf) >10 and strlen($cpf) < 14){
                $this->cpf = $cpf;
                return True;
            }else{
                return False;
            }
            
        }

        public function getCpf(){
            return $this->cpf;
        }

    }

?>