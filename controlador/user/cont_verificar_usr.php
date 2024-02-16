<?php

    require '../../modelo/mod_usr.php';

    $MU = new Mod_Usr();
    $user = htmlspecialchars($_POST['usr'], ENT_QUOTES, 'UTF-8');
    $passwd = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
    $consulta = $MU -> VerificarUsr($user, $passwd);
    $data = json_encode($consulta);
    if(count($consulta)>0){
        echo $data;
    }else{
        echo 0;
    }
        
?>