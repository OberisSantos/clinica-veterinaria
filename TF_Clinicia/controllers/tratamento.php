<?php
    class Tratamento{
        private $data_inicio;
        private $veterinario; #id do veterinario
        private $animal; #id animal
        private $tipo; #id tipo tratamento
        private $funcionario; #id funciorario que cadastrou

        public function setDataInicio($data_inicio)
        {#formato “aaaa-mm-dd hh:mm:ss”
          
            $this->data_inicio = $data_inicio;
        }
        
        public function getDataInicio(){
            return $this->data_inicio;
        }

        public function setTipo($tipo)
        {
           $this->tipo = $tipo;
           return True;
        }

        public function getTipo()
        {
           return $this->tipo;
        }

        public function setValor($valor)
        {
           $this->valor = $valor;
           return True;
        }

        public function getValor()
        {
           return $this->valor;;
        }
    }


?>