<?php 
    abstract class Pessoa{
        private $nome;
        private $sexo;
        private $email;
        private $telefone;
        private $endereco;

        public function setNome($nome){
            if(!empty($nome)){
                $this ->nome = strtoupper($nome);
                return True;
            }else{
                return False;
            }
        }

        public function getNome(){
            return $this->nome;
        }

        public function setSexo($sexo){
            $this ->sexo = $sexo;
        }

        public function getSexo(){
            return $this->sexo;
        }

        public function setEmail($email){
            $this ->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setTelefone($telefone){
            $this ->telefone = $telefone;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
            
        }

        public function getEndereco(){
             return $this->endereco;
        }

        
    }

?>