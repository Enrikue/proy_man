<?php

    require '../../modelo/mod_inv.php';

    $MV = new Mod_Inv();
    $n_inv = htmlspecialchars($_POST['num_inv'], ENT_QUOTES, 'UTF-8');
    $n_serial = htmlspecialchars($_POST['num_serial'], ENT_QUOTES, 'UTF-8');
    $descripcion = htmlspecialchars($_POST['dsc'], ENT_QUOTES, 'UTF-8');
    $marca = htmlspecialchars($_POST['marca_inv'], ENT_QUOTES, 'UTF-8');
    $modelo = htmlspecialchars($_POST['mod'], ENT_QUOTES, 'UTF-8');
    $observacion = htmlspecialchars($_POST['observ'], ENT_QUOTES, 'UTF-8');
    $status = htmlspecialchars($_POST['status_inv'], ENT_QUOTES, 'UTF-8');
    $consulta = $MV -> Registrar_Inv($n_inv, $n_serial, $descripcion, $marca, $modelo, $observacion, $status);
    echo $consulta;
    $data = json_encode($consulta);
    
?>