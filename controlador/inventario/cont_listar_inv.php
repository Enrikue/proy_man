<?php

    require '../../modelo/mod_inv.php';

    $MV = new Mod_Inv();
    $consulta = $MV -> list_inventario();
    if($consulta){
        echo json_encode($consulta);
    } else {
        echo '{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "aaData": []
        }';
    }
        
?>