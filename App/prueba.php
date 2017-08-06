<?php

    require "config.php";
    use Control\ControlEstudiantes;
    $conEst = new ControlEstudiantes();
    $est = $conEst->obtenerEstudiante_UsuarioId(2);
    echo $est->getCarrera();
