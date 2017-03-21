<?php
    require_once "../config.php";
    //Cierra la sesion en caso de haber una
    session_destroy();

    use Negocio\Controles\ControlEstudiantes;
    $ctrlEstudiantes = new ControlEstudiantes();
    $listaEstudiantes = $ctrlEstudiantes->obtenerEstudiante();
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seleccione usuario</title>
</head>
<body>


    <h1>Seleccione usuario para crear un horario</h1>
    <h3>Usuario registrados: <?= count($listaEstudiantes); ?> </h3>
    <ul>
        <?php foreach ($listaEstudiantes as $estudiante ): ?>

            <li>
                <a href="seleccionarMateria.php?userID=<?= $estudiante->getIDestudiante(); ?> ">
                    <?= $estudiante->getNombre()." ". $estudiante->getApellido(); ?>
                </a>
            </li>

        <?php endforeach; ?>
    </ul>




</body>
</html>


