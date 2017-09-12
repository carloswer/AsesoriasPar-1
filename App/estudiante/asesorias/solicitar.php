<?php

    require_once '../../config.php';
    include_once '../sesion.php';

    use Control\ControlAsesorias;
    use Control\ControlHorarios;
    use Control\Sesiones;

    //Redireccion cuando es asesor (no debe soliciar en modo asesor)
    if( Sesiones::isAsesor() )
        header("Location: ".EST_PATH."/asesorias");

    $conAsesorias = new ControlAsesorias();
    $conHorario = new ControlHorarios();

    //--------Obtencion de datos
    //Ciclo actual

    $arrayMaterias = null;
    $ciclo = $conHorario->getCurrentCycle();

    if( $ciclo != null ){
        //Obtine Materias
        //TODO: materias solo de la carrera
        //TODO: estudiante diferente de uno mismo
        $arrayMaterias = $conAsesorias->obtenerMateriasConAsesores_SinEstudianteX( $ciclo['id'], Sesiones::getIDEstudiante() );

        //Horario (normales)
        $arrayHoras = $conHorario->getHours_OrderByHour();
        $arrayDias = $conHorario->separeDaysOfHours( $arrayHoras );

        //Horario (de asesores)
//        $horarioAsesores = $conHorario->obtenerHorarioPorMateria(  );
    }

?>


<?php include_once TEMP_PATH."/header.php"; ?>


<div class="container">
    <?php include_once TEMP_PATH."/estudiante-menu.php"; ?>
    <h2>Solicitar asesoria</h2>

    <?php if( $ciclo == null ): ?>
        <h3>No hay ciclo actual disponible</h3>
    <?php else: ?>

        <?php if( $arrayMaterias == null ): ?>
            <h3>No hay materias con asesores disponibles</h3>

        <?php else: ?>
            <div class="asesorias solicitar">

                <div class="asesorias__encabezados">
                    <div id="encabezado__materia" class="encabezado col-xs-12 col-sm-4 active"></div>
                    <div id="encabezado__fecha" class="encabezado col-xs-12 col-sm-4"></div>
                    <div id="encabezado__asesor" class="encabezado col-xs-12 col-sm-4"></div>
                </div>

                <div class="asesorias__secciones">

                    <div class="seccion single-select seccion-active" id="seccion__materias" data-seccion="materias">
                        <h3>Seleccione materias</h3>
                        <div id="materias-contenido" class="contenido materias">
                            <?php foreach( $arrayMaterias as $materia ): ?>
                                <span class="materia-item" data-id="<?= $materia->getId(); ?>"><?= $materia->getNombre(); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    <div class="seccion seleccionar-single none" id="seccion__fechas" data-seccion="fechas">
                        <h3>Seleccione Fecha y Hora</h3>
                        <div id="fechas-contenido" class="contenido fechas">
                            <div class="loader none">
                                <i class="icon fa fa-circle-o-notch fa-3x fa-spin"></i>
                            </div>
                        </div>
                    </div>



                    <div class="seccion seleccionar-single none" id="seccion__asesores" data-seccion="asesores">
                        <h3>Seleccione Asesor</h3>
                        <div id="asesores-contenido" class="contenido asesores">
                            <div class="loader none">
                                <i class="icon fa fa-circle-o-notch fa-3x fa-spin"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="asesorias__controles">
                    <button id="btn-asesoria-anterior" class="btn btn-default" disabled><span class="fa fa-arrow-left"></span> Anterior</button>
                    <button id="btn-asesoria-siguiente" class="btn btn-primary  pull-right">Siguiente <span class="fa fa-arrow-right"></span></button>
                    <!-- Para que no colapse div con boton flotante -->
                    <div class="clearfix"></div>
                </div>

            </div>

        <?php endif; ?>

    <?php endif; ?>
</div>


<?php include_once TEMP_PATH."/footer.php"; ?>
