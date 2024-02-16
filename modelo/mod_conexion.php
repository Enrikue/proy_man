<?php

    class conection{
        private $server;
        private $user_bd;
        private $user_pass;
        private $bd;
        public $conect;
        
        public function __construct(){
            $this -> server = "localhost";
            $this -> user_bd = "root";
            $this -> user_pass = "";
            $this ->bd = "bd_support";
        }

        function conectar(){
            $this -> conection = new mysqli($this -> server, $this -> user_bd, $this -> user_pass, $this -> bd);
            $this -> conection -> set_charset("utf8");
        }

        function cerrar(){
            $this -> conection -> close();
        }
    }

?>