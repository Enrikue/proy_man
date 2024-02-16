<?php

    $IDUSR = $_POST['usr_id'];
    $USR = $_POST['usr_name'];
    $ROL = $_POST['rol_id'];

    session_start();

    $_SESSION['S_IDUSR'] = $IDUSR;
    $_SESSION['S_USR'] = $USR;
    $_SESSION['S_ROL'] = $ROL;

?>