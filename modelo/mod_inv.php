<?php

class Mod_Inv
{
    private $conection;
    function __construct()
    {
        require_once 'mod_conexion.php';
        $this->conection = new Conection();
        $this->conection->conectar();
    }

    function list_inventario()
    {
        $sql = "call SP_LISTAR_INVENTARIO()";
        $arreglo = array();
        if ($consulta = $this->conection->conection->query($sql)) {
            while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                $arreglo["data"][] = $consulta_VU;
            }
        }
        return $arreglo;
        $this->conection->cerrar();
    }

    function list_combo_status()
    {
        $sql = "call SP_LISTAR_STATUS()";
        $arreglo = array();
        if ($consulta = $this->conection->conection->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {
                $arreglo[] = $consulta_VU;

            }
            return $arreglo;
            $this->conection->cerrar();
        }
    }
}




?>