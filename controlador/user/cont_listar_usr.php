<?php

    require '../../modelo/mod_usr.php';

    $MU = new Mod_Usr();
    $consulta = $MU -> list_usr();
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