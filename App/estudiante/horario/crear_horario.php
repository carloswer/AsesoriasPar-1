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


    //TODO: Juntar con el metodo "obtenerHorarioId"
    $cicloActual = $conHorarios->obtenerCicloActual();
    if( $cicloActual == null )
        header("Location: index.php");

    //Si ya tiene horario
    $horario = $conHorarios->obtenerIdHorario_Estudiante_CicloActual( $_SESSION['estudiante']['id'], $cicloActual['id'] );
    if( $horario != null )
        header("Location: index.php");

    //Obtiene dias y horas
    $arrayDiasHoras = $conHorarios->obtenerDiasHoras_PorHora();
    $arrayDias = $conHorarios->separarDias( $arrayDiasHoras );

    //Obtiene materias
    $arrayMaterias = $conHorarios->obtenerMaterias_Carrera( $_SESSION['estudiante']['carrera'] );
//    var_dump( $arrayMaterias );
//    exit();
?>


    <?php include_once TEMP_PATH."/header.php"; ?>
    <div class="container">
        <?php include_once TEMP_PATH."/estudiante-menu.php"; ?>
        <h1>Crear Horario</h1>


        <?php if( $arrayMaterias == null ): ?>
            <h4>No hay materias disponibles</h4>
        <?php else: ?>

            <?php if( $arrayDiasHoras == null ): ?>
                <h4>No hay dias/horas disponibles para registro. Contacte Administrador</h4>
            <?php else: ?>

            <!-- TABLA DE HORARIO -->
                <div id="horario">
                    <table width="100%" id="tabla-horario">
                        <tr>
                            <?php foreach($arrayDias as $dia ): ?>
                                <th> <?= $dia; ?> </th>
                            <?php endforeach; ?>
                        </tr>
                        <?php
                            $cont = 0;
                            //Recorre todas las horas
                            foreach( $arrayDiasHoras as $dh ){

                                if( $cont == 0 ) {
                                    echo "<tr>\n";
                                }
                                else if( $cont == count($arrayDias) ) {
                                    echo "</tr>\n";
                                    $cont = 0;
                                }
                                //Siempre se ejecuta
                                if( $cont < count($arrayDias) ) {
                                    $cont++;
                                    echo '<td><a href="javascript:void(0)" class="item-hora hora-horario" data-id="'.$dh['id'].'" data-dia="'.$dh['dia'].'" data-hora="'.$dh['hora'].'">'.$dh['hora'];
                                    echo "</a></td>\n";
                                }
                            }
                        ?>
                    </table>
                </div>

                <!-- Seccion de materias -->
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
                            <option value="2009">2009</option>
                            <option value="2016">2016</option>
                        </select>
                    </div>


                    <?php foreach( $arrayMaterias as $mat ): ?>
                        <a href="javascript:void(0)" class="item-materia materia-horario" data-id="<?= $mat->getId(); ?>"><?php echo $mat->getNombre(); ?></a>
                    <?php endforeach; ?>
                </div>

                <br>
                <div id="opciones">
                    <button id="btn-registrar-horario" class="btn btn-success">Registrar horario</button>
                    <button id="btn-reset-horario" class="btn btn-default">Reset</button>
                    <a href="horario.php" class="btn btn-danger">Cancelar</a>

                    <span id="login-estado"></span>
                </div>

                <br><br><br>
            <?php endif; ?>
        <?php endif; ?>
    </div>

<?php include_once TEMP_PATH."/footer.php"; ?>