<?php
    require_once "../config.php";
    $tituloPagina = "Inicio";

    //Cierra la sesion en caso de haber una
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
        <?php foreach ($listaEstudiantes as $estudiante ): ?>

            <li>
                <a href="seleccionarMateria.php?userID=<?= $estudiante->getIDestudiante(); ?> ">
                    <?= $estudiante->getIdestudiante()." - ".$estudiante->getNombre()." ".$estudiante->getApellido(); ?>
                </a>
            </li>

        <?php endforeach; ?>
    </ul>

<?php include TEMP_PATH . DS . "footer.php"; ?>