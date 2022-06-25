<?php

    class Animal{

        private $codigo;
        private $nome;
        private $data_nascimento;
        private $sexo;
        private $especie;
        private $cliente; //unico

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        public function getCodigo(){
            return $this->codigo;
        }
        
        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setData_nascimento($data_nascimento)
        {
            $this->data_nascimento = $data_nascimento;
        }

        public function getData_nascimento()
        {
            return $this->data_nascimento;
        }

        public function setSexo($sexo)
        {
            $this->sexo = $sexo;
        }

        public function getSexo()
        {
            return $this->sexo;
        }

        public function setEspecie($especie)
        {
            $this->especie = $especie;
        }

        public function getEspecie()
        {
            return $this->especie;
        }

        public function setCliente($cliente)
        {
            $this->cliente = $cliente;
        }

        public function getCliente()
        {
            return $this->cliente;
        }
    }

?>