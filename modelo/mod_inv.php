<?php

    class Mod_Inv{
        private $conection;
        function __construct(){
            require_once 'mod_conexion.php';
            $this-> conection = new Conection();
            $this -> conection -> conectar();
        }    

        function list_inventario(){
            $sql = "call SP_LISTAR_INV()";
            $arreglo = array();
            if($consulta = $this -> conection -> conection -> query($sql)){
                while($consulta_Inv = mysqli_fetch_assoc($consulta)){
                    $arreglo["data"][] = $consulta_Inv;
                }
                return $arreglo;
                $this -> conection -> cerrar();
            }
        }

    }

?>