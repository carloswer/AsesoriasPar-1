<?php
    require_once "../config.php";
    $tituloPagina = "Inicio";

    //Cierra la sesion en caso de haber una
    session_start();
    session_destroy();

    use Negocio\Controles\ControlEstudiantes;
    $ctrlEstudiantes = new ControlEstudiantes();
    $listaEstudiantes = $ctrlEstudiantes->obtenerEstudiante();
    $numEstudiantes = count($listaEstudiantes);
?>


<?php include TEMP_PATH . DS . "header.php"; ?>


    <h1>Seleccione usuario para crear un horario</h1>
    <h3>Usuario registrados: <?= $numEstudiantes; ?> </h3>
    <ul>
        <?php foreach ($listaEstudiantes as $e ): ?>

            <li>
                <a href="crearHorario.php?userID=<?= $e['PK_est_id']; ?> ">
                    <?= $e['PK_est_id']." - ".$e['est_nombre']." ".$e['est_apellido']; ?>
                </a>
            </li>

        <?php endforeach; ?>
    </ul>

<?php include TEMP_PATH . DS . "footer.php"; ?>