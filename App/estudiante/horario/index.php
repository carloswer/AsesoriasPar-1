<?php

    require_once '../../config.php';
    include_once '../sesiones.php';

    use Control\Sesiones;
    //Si se es alumno
    if( !Sesiones::isAsesor() )
        header("Location: ../index.php");

	use Control\ControlHorarios;
    $conHorarios = new ControlHorarios();

    //Obtiene ciclo actual
    //TODO: hacer que funcion de obtener horario y demás obtengan el ciclo actual de forma automatica
    $cicloActual = $conHorarios->obtenerCicloActual();

    global $horas, $dias, $horarioId, $horario, $materias;
    if( $cicloActual != null ){
        //Obtiene horas
        $horas = $conHorarios->obtenerHoras();
        //Obtiene dias
        $dias = $conHorarios->obtenerDias();
        //Obtener horario del estudiante
        $horarioId = $conHorarios->obtenerHorarioId($_SESSION['estudiante']['id'], $cicloActual['id']);
        $horario = $conHorarios->obtenerHorarioAsesor( $_SESSION['estudiante']['id'], $cicloActual['id'] );
        $materias = $conHorarios->obtenerHorario_materias( $horarioId );
    }


 ?>

<?php include_once TEMP_PATH."/header.php"; ?>
	
<!--MENU-->
<div class="container">
    <?php include_once TEMP_PATH."/estudiante-menu.php"; ?>
    <h1>Horario</h1>

    <?php if( $cicloActual == null ): ?>
        <h3>No hay un ciclo actual disponible</h3>
    <?php else: ?>
        <h4>Ciclo Actual: <?= "<strong>".$cicloActual['inicio']."</strong> a <strong>". $cicloActual['fin']."</strong>"; ?></h4>
        <?php if( $horarioId == null ): ?>
            <h4>No cuenta con un horario del ciclo actual.
                <a href="crear_horario.php">Crear horario</a>
            </h4>
        <?php else: ?>
            <h4>Ya tiene un horario creado</h4>
            <a href="#">Modificar horario</a>

            <!-- Horario -->
            <div id="horario">
                <table width="100%">
                    <tr>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                    </tr>
                    <?php foreach( $horas as $hora ): ?>
                        <tr>
                            <?php foreach( $dias as $dia ): ?>
                                <td>

                                    <?php if( $conHorarios->isHorario($horario, $dia, $hora ) ): ?>
                                        <a class="item-hora hora-selected" data-dia="<?= $dia['id']; ?>" data-hora="<?= $hora['id']; ?>"><?= $hora['hora']; ?></a>

                                    <?php else: ?>

                                        <a class="item-hora" data-dia="<?= $dia['id']; ?>" data-hora="<?= $hora['id']; ?>"><?= $hora['hora']; ?></a>

                                    <?php endif; ?>

                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <?php foreach($materias as $mat ): ?>
                <a href="javascript:void(0)" class="item-materia materia-horario" data-materia="<?= $mat->getId(); ?>">
                    <?php echo $mat->getNombre(); ?>
                </a>
            <?php endforeach; ?>

        <?php endif; ?>
    <?php endif; ?>



</div>
<!-- <p>Ciclo: <?= $_SESSION['ciclo']['inicio']." a ".$_SESSION['ciclo']['fin'] ?></p> -->

<?php include_once TEMP_PATH."/footer.php"; ?>