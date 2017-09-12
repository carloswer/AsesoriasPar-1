<?php

    require_once '../../config.php';
    include_once '../sesion.php';

    use Control\Funciones;
    use Control\Sesiones;
    use Control\ControlHorarios;
    use Control\ControlMaterias;
    use Control\ControlEstudiantes;



    //Si se es alumno
    if( !Sesiones::isAsesor() )
        header("Location: ../index.php");


    $conHorarios = new ControlHorarios();
    $conMaterias = new ControlMaterias();
    $conEstudiantes = new ControlEstudiantes();


    //Si hay un ciclo actual
    $cicloActual = $conHorarios->getCurrentCycle();
    if( $cicloActual == null )
        header("Location: index.php");


    //Si ya tiene horario
    $schedule = $conHorarios->getCurrentSchedule_ByStudentId( Sesiones::getStudentId() );
    if( is_array($schedule) )
        header("Location: index.php");

    //Obtiene dias y horas
    $hoursArray = $conHorarios->getHours_OrderByHour();
    //----Obtiene materias
    $subjectsArray = $conMaterias->getSubject_ByCarrerId( Sesiones::getStudentCarrer()['id'] );

?>


    <?php include_once TEMP_PATH."/header.php"; ?>
    <div class="container">
        <?php include_once TEMP_PATH."/estudiante-menu.php"; ?>
        <h1>Crear Horario</h1>


        <?php if( $subjectsArray == null ): ?>
            <h4>No hay materias disponibles</h4>
        <?php else: ?>

            <?php if( $hoursArray == null ): ?>
                <h4>No hay dias/horas disponibles para registro. Contacte Administrador</h4>
            <?php else: ?>

            <!-- TABLA DE HORARIO -->
                <div class="horario multi-select">

                    <div class="horas">
                        <?= Funciones::makeScheduleTable( $hoursArray, $schedule );  ?>
                    </div>

                    <!-- Seccion de materias -->
                    <div class="materias">
                        <h4>Seleccione materias</h4>
                        <div class="controles" style="margin-bottom: 20px;">
                            <label for="buscar-materia">Buscar:</label>
                            <input type="text" id="buscar-materia" class="" placeholder="buscar">

                            <label for="">Carrera:</label>
                            <select name="" id="" class="">
                                <option value="1">ISW</option>
                                <option value="2">IMT</option>
                            </select>

                            <label for="">Plan:</label>
                            <select name="" id="" class="">
                                <option value="2009">2009</option>
                                <option value="2016">2016</option>
                            </select>
                        </div>


                        <?php foreach($subjectsArray as $sub ): ?>
                            <span href="javascript:void(0)" class="materia-item" data-id="<?= $sub->getId(); ?>"><?php echo $sub->getName(); ?></span>
                        <?php endforeach; ?>
                    </div>

                    <br>
                    <div id="opciones">
                        <button id="btn-registrar-horario" class="btn btn-success">Registrar horario</button>
                        <button id="btn-reset-horario" class="btn btn-default">Reset</button>
                        <a href="horario.php" class="btn btn-danger">Cancelar</a>

                        <span id="horario__registro-status"></span>
                    </div>
                </div>


                <br><br><br>
            <?php endif; ?>
        <?php endif; ?>
    </div>

<?php include_once TEMP_PATH."/footer.php"; ?>