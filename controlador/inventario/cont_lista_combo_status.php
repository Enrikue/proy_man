<?php

require '../../modelo/mod_inv.php';

$MV = new Mod_Inv();
$consulta = $MV->list_combo_status();
echo json_encode($consulta);


?>