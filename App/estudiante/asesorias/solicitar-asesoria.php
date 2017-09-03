<?php

    require_once '../../config.php';
    include_once '../sesiones.php';

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
    $arrayAsesores = null;
    $arrayHorario = null;
    $ciclo = $conHorario->obtenerCicloActual();

    if( $ciclo != null ){
        //Obtine Materias
        //TODO: materias solo de la carrera
        $arrayMaterias = $conAsesorias->obtenerMateriasConAsesores( $ciclo );
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
            <div class="encabezado-asesoria">
                <div id="materia" class="encabezado col-xs-4 active">Materia</div>
                <div id="asesor" class="encabezado col-xs-4">Asesor</div>
                <div id="horario" class="encabezado col-xs-4">Horario</div>
            </div>
            <div class="contenedor-asesoria">
                <div class="materias-asesorias">
                    <h3>Seleccione materias</h3>
                    <div class="materias">
                        <?php foreach( $arrayMaterias as $materia ): ?>
                            <span class="item-materia" data-id="<?= $materia->getId(); ?>"><?= $materia->getNombre(); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <button id="btn-siguiente-materia" class="btn btn-primary">Siguiente</button>
                </div>

                <div class="asesores-asesorias" style="display: none">
                    <h3>Seleccione Asesor</h3>
                    <div class="asesores"></div>
                    <button id="btn-anterior-asesor" class="btn btn-default">Anterior</button>
                    <button id="btn-siguiente-asesor" class="btn btn-primary">Siguiente</button>
                </div>

                <div class="fechas-asesorias" style="display: none">
                    <h3>Seleccione Fecha y Hora</h3>
                    <div class="fechas">
                        <label for="">Fecha</label>
                        <select name="" id="">
                            <option value="" selected>....</option>
                            <option value="1">DD/MM/AAAA</option>
                            <option value="1">DD/MM/AAAA</option>
                            <option value="1">DD/MM/AAAA</option>
                            <option value="1">DD/MM/AAAA</option>
                            <option value="1">DD/MM/AAAA</option>
                            <option value="1">DD/MM/AAAA</option>
                        </select>

                        <label for="">Hora</label>
                        <select name="" id="">
                            <option value="" selected>....</option>
                            <option value="1">DD/MM/AAAA</option>
                            <option value="1">DD/MM/AAAA</option>
                            <option value="1">DD/MM/AAAA</option>
                            <option value="1">DD/MM/AAAA</option>
                            <option value="1">DD/MM/AAAA</option>
                            <option value="1">DD/MM/AAAA</option>
                        </select>
                    </div>
                    <button id="btn-anterior-fecha" class="btn btn-default">Anterior</button>
                    <button id="btn-finalizar-asesoria" class="btn btn-success">Finalizar</button>
                </div>
            </div>


        <?php endif; ?>

    <?php endif; ?>
</div>


<?php include_once TEMP_PATH."/footer.php"; ?>
