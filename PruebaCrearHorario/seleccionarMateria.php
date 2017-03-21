<?php
    //TODO: Crear validacion de datos por GET para evitar un ID inexistente

    require_once "../config.php";

    //Verificar datos por GET, Si no hay nada, redirecciona al INDEX
    if( !isset($_GET['userID']) )
        header("Location: index.php");


    //Inicia una session
    session_start();
    $_SESSION['IDestudiante'] = $_GET['userID'];

    //Verifica si tiene un horario creado
    use Datos\Horarios;
    $horarios = new Horarios();
    $horario = $horarios->getHorarioAsesor();


    use Datos\Materias;
    $materias = new Materias();
    $listaMaterias = $materias->getMaterias();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear un horario</title>
</head>
<body>


    <ul>
        <?php foreach ( $listaMaterias as $materia ): ?>

            <li>
                <a href="javascript:void(0)">
                    <?= $materia->getNombre(); ?>
                </a>
            </li>

        <?php endforeach; ?>
    </ul>




</body>
</html>


