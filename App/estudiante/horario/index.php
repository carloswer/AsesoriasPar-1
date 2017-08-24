<?php

    require_once '../../config.php';
    include_once '../sesiones.php';
    use Control\Sesiones;

    //Si se es alumno
    if( !Sesiones::isAsesor() )
        header("Location: ".EST_REF);

	use Control\ControlHorarios;
    $conHorarios = new ControlHorarios();

    //Obtiene ciclo actual
    //TODO: hacer que funcion de obtener horario y demás obtengan el ciclo actual de forma automatica
    $cicloActual = $conHorarios->obtenerCicloActual();

    global $arrayHoras, $IdHorario, $arrayHorario, $arrayMaterias, $arrayDias;
    if( $cicloActual != null ){
        //Obtiene dias y horas
        $arrayHoras = $conHorarios->obtenerDiasHoras_PorHora();
        if( $arrayHoras != null )
            $arrayDias = $conHorarios->separarDias( $arrayHoras );

        //Obtener horario del estudiante
        //TODO: debe saber si el horario ya esta validado antes de mostrarlo
        $IdHorario = $conHorarios->obtenerIdHorario_Estudiante_CicloActual( $_SESSION['estudiante']['id'], $cicloActual['id'] );
        //Si hay horario, lo obtiene
        if( $IdHorario != null ){
            $arrayHorario = $conHorarios->obtenerHorario_Estudiante( $_SESSION['estudiante']['id'], $cicloActual['id'] );
            $arrayMaterias = $conHorarios->obtenerMaterias_Horario( $IdHorario );
        }
    }

//    var_dump( $arrayHorario );
//    exit();
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

        <?php if( $arrayHoras == null ): ?>
            <h4>No hay dias/horas disponibles para registro. Contacte Administrador</h4>
        <?php else: ?>
            <?php if( $IdHorario == null ): ?>
                <h4>No cuenta con un horario del ciclo actual.
                    <a href="crear_horario.php">Crear horario</a>
                </h4>
            <?php else: ?>
                <h4>Ya tiene un horario creado <a href="#">Modificar horario</a></h4>

                <h3>Días y horas</h3>
                <div id="horario">
                    <!--Tabla de horario-->
                    <table width="100%" id="tabla-horario">
                        <tr>
                            <?php foreach( $arrayDias as $dia ): ?>
                                <th> <?= $dia; ?> </th>
                            <?php endforeach; ?>
                        </tr>
                        <?php

                            $cont = 0;
                            //Recorre todas las horas
                            foreach( $arrayHoras as $dh ){

//                                echo $dh['dia']." - ".$dh['hora']."<br>\n";

                                if( $cont == 0 ) {
                                    echo "<tr>\n";
                                }
                                else if( $cont == count( $arrayDias ) ) {
                                    echo "</tr>\n";
                                    $cont = 0;
                                }
                                //Siempre se ejecuta
                                if( $cont < count( $arrayDias ) ) {
                                    $cont++;
                                    if( $conHorarios->isHoraHorario( $dh, $arrayHorario ) ){
//                                        echo "<td>HORARIO</td>";
                                        echo '<td><a href="javascript:void(0)" class="item-hora hora-selected" data-id="'.$dh['id'].'" data-dia="'.$dh['dia'].'" data-hora="'.$dh['hora'].'">'.$dh['hora'];
                                        echo "</a></td>\n";
                                    }
                                    else{
//                                        echo "<td>hora</td>";
                                        echo '<td><a href="javascript:void(0)" class="item-hora hora-horario" data-id="'.$dh['id'].'" data-dia="'.$dh['dia'].'" data-hora="'.$dh['hora'].'">'.$dh['hora'];
                                        echo "</a></td>\n";
                                    }
                                }
                            }
                        ?>
                    </table>
                </div>

                <h3>Materias: <?= count( $arrayMaterias ); ?></h3>

                <?php foreach($arrayMaterias as $mat ): ?>
                    <a href="javascript:void(0)" class="item-materia materia-horario" data-materia="<?= $mat->getId(); ?>">
                        <?php echo $mat->getNombre(); ?>
                    </a>
                <?php endforeach; ?>

            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>



</div>
<!-- <p>Ciclo: <?= $_SESSION['ciclo']['inicio']." a ".$_SESSION['ciclo']['fin'] ?></p> -->

<?php include_once TEMP_PATH."/footer.php"; ?>