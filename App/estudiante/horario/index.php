<?php

    require_once '../../config.php';
    include_once '../sesion.php';
    use Control\Sesiones;
    use Control\Funciones;

    //Si se es alumno
    if( Sesiones::isAlumno() )
        header("Location: ".EST_REF);


	use Control\ControlHorarios;
    use Control\ControlUsuarios;
    $conSchedule = new ControlHorarios();
    $conStudents = new ControlUsuarios();

    //Obtiene ciclo actual
    $cycle = $conSchedule->getCurrentCycle();

    $hoursArray = null;
    $schedule = null;
    $subjects = null;



    //Si hay un ciclo disponible
    if( $cycle != null ){
        //Obtiene dias y horas
        $hoursArray = $conSchedule->getHours_OrderByHour();

        //Obtener horario del estudiante
        //TODO: debe saber si el horario ya esta validado antes de mostrarlo
        $schedule = $conSchedule->getCurrentSchedule_ByStudentId( Sesiones::getStudentId() );
        //Verifica que estudiante tenga horario{
        if( is_array($schedule) ) {
            $subjects = $conSchedule->getScheduleSubject_ByScheduleId( $schedule['id'] );
        }
    }



 ?>

<?php include_once TEMP_PATH."/header.php"; ?>
	
<!--MENU-->
<div class="container">
    <?php include_once TEMP_PATH."/estudiante-menu.php"; ?>
    <h1>Horario</h1>

    <?php if( $cycle == null ): ?>
        <h3>No hay un ciclo actual disponible</h3>
    <?php else: ?>
        <h4>Ciclo Actual: <?= "<strong>".$cycle['start']."</strong> a <strong>". $cycle['end']."</strong>"; ?></h4>


        <?php if( $schedule == null ): ?>
            <h4>
                No cuenta con un horario del ciclo actual.
                <a href="crear_horario.php">Crear horario</a>
            </h4>
        <?php else: ?>
            <h4>Ya tiene un horario creado <a href="#">Modificar horario</a></h4>
            <div class="horario multi-select">
                <div class="horas">
                    <?= Funciones::makeScheduleTable( $hoursArray, $schedule );  ?>
                </div>
            </div>


            <div class="materias">
                <h3>Materias: <?= count($subjects); ?></h3>
                <?php foreach( $subjects as $sub ): ?>
                    <span href="javascript:void(0)" class="materia-item" data-id="<?= $sub->getId(); ?>"><?php echo $sub->getName(); ?></span>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    <?php endif; ?>



</div>
<!-- <p>Ciclo: <?= $_SESSION['ciclo']['inicio']." a ".$_SESSION['ciclo']['fin'] ?></p> -->

<?php include_once TEMP_PATH."/footer.php"; ?>