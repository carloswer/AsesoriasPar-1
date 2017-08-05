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
    $cicloActual = $conHorarios->obtenerCicloActual();
    global $horas;
    global $dias;
    global $horario;
    if( $cicloActual != null ){
        //Obtiene horas
        $horas = $conHorarios->obtenerHoras();
        //Obtiene dias
        $dias = $conHorarios->obtenerDias();
        //Obtener horario del estudiante
        $horario = $conHorarios->obtenerHorarioAsesor( $_SESSION['estudiante']['id'], $cicloActual );
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
            <h3>Ciclo Actual: <?= $cicloActual['inicio']." a ". $cicloActual['fin']; ?></h3>
            <?php if( COUNT($horario) == 0 ): ?>
                <h3>No cuenta con un horario del ciclo actual.
                    <a href="crear_horario.php">Crear horario</a>
                </h3>
            <?php else: ?>
                <h3>Ya tiene un horario creado</h3>
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

            <?php endif; ?>
        <?php endif; ?>


    </div>
    <!-- <p>Ciclo: <?= $_SESSION['ciclo']['inicio']." a ".$_SESSION['ciclo']['fin'] ?></p> -->

<?php include_once TEMP_PATH."/footer.php"; ?>