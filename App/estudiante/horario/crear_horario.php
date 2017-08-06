<?php

    require_once '../../config.php';
    include_once '../sesiones.php';

    session_start();
    use Control\Sesiones;
    use Control\ControlHorarios;
    use Control\ControlMaterias;

    //Si se es alumno
    if( !Sesiones::isAsesor() )
        header("Location: ../index.php");

    $conHorarios = new ControlHorarios();
    $conMaterias = new ControlMaterias();
//    $conCarreras = new ControlCarreras();


    $cicloActual = $conHorarios->obtenerCicloActual();
    if( $cicloActual == null )
        header("Location: index.php");

    //Si ya tiene horario
    $horario = $conHorarios->obtenerHorarioId( $_SESSION['estudiante']['id'], $cicloActual['id'] );
    if( $horario != null )
        header("Location: index.php");

    //Obtiene horas
    $horas = $conHorarios->obtenerHoras();
    //Obtiene dias
    $dias = $conHorarios->obtenerDias();

    //Obtiene materias
    $arrayMaterias = $conMaterias->obtenerMateriasPorCarrera( $_SESSION['estudiante']['carrera'] );


?>

    <?php include_once TEMP_PATH."/header.php"; ?>
    <div class="container">
        <?php include_once TEMP_PATH."/estudiante-menu.php"; ?>
        <h1>Crear Horario</h1>


        <?php if( $arrayMaterias == null ): ?>
            <h4>No hay materias registradas, no se puede crear un horario aún.</h4>
        <?php else: ?>

        <!-- TABLA DE HORARIO -->
            <div id="horario">
                <h4>Seleccione horas</h4>
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
                                    <a href="javascript:void(0)" class="item-hora hora-horario" data-dia="<?= $dia['id']; ?>" data-hora="<?= $hora['id']; ?>">
                                        <?= $hora['hora']; ?>
                                    </a>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>

            <div id="materias">
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
                        <option value="1">2009</option>
                        <option value="2">2016</option>
                    </select>
                </div>


                <?php foreach($arrayMaterias as $mat ): ?>
                    <a href="javascript:void(0)" class="item-materia materia-horario" data-materia="<?= $mat->getId(); ?>">
                        <?php echo $mat->getNombre(); ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <br><br><br>
            <div id="opciones">
                <button id="btn-registrar-horario">Registrar horario</button>
                <button id="btn-reset-horario">Reset</button>
                <span id="login-estado"></span>
            </div>
        <?php endif; ?>
    </div>

<?php include_once TEMP_PATH."/footer.php"; ?>