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

    function Registrar_Inv($n_inv, $n_serial, $descripcion, $marca, $modelo, $observacion, $status)
    {
        $sql = "call SP_REGISTRAR_INVENTARIO('$n_inv', '$n_serial', '$descripcion', '$marca', '$modelo', '$status', '$observacion')";
        $arreglo = array();
        if ($consulta = $this->conection->conection->query($sql)) {
            if ($row = mysqli_fetch_array($consulta)) {
                return $id_r = trim($row[0]);

            }
            $this->conection->cerrar();
        }
    }
}




?>