<?php

    class Mod_Usr{
        private $conection;
        function __construct(){
            require_once 'mod_conexion.php';
            $this-> conection = new Conection();
            $this -> conection -> conectar();
        }    

        function VerificarUsr($user, $passwd){
            $sql = "call SP_VERIFICAR_USR('$user')";
            $arreglo = array();
            if($consulta = $this -> conection -> conection -> query($sql)){
                while($consulta_VU = mysqli_fetch_array($consulta)){
                    if(password_verify($passwd, $consulta_VU["usr_passwd"])){
                        $arreglo[] = $consulta_VU;
                    }
                }
                return $arreglo;
                $this -> conection -> cerrar();
            }
        }

    }

?>