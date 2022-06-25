<?php
    class Endereco{
        private $idendereco;
        private $rua;
        private $numero;
        private $bairro;
        private $uf;
        private $cidade;
        private $cep;

        public function setIdEndereco($idendereco){
            $this->idendereco = $idendereco;
            return True;
        }
        public function getIdEndereco(){
            return $this->idendereco;
            
        }

        public function setRua($rua){
            $this->rua = strtoupper($rua);
            return True;
        }
        public function getRua(){
            return $this->rua;
            
        }

        public function setNumero($numero){
            $this->numero = $numero;
            return True;
        }
        public function getNumero(){
            return $this->numero;
        }

        public function setBairro($bairro){
            $this->bairro = strtoupper($bairro);
            return True;
        }
        public function getBairro(){
            return $this->bairro;
        }

        public function setUf($uf){
            $this->uf = strtoupper($uf);
            return True;
        }
        public function getUf(){
            return $this->uf;
        }

        public function setCidade($cidade){
            $this->cidade = strtoupper($cidade);
            return True;
        }

        public function getCidade(){
            return $this->cidade;
        }

        public function setCep($cep){
            $this->cep = $cep;
            return True;
        }

        public function getCep(){
            return $this->cep;
        }


    }

?>