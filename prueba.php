<?php

    $passwd = password_hash('AdminMaN2024_1', PASSWORD_DEFAULT, ["cost"=>12]);

    echo $passwd;

?>