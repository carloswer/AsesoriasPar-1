<?php

    require_once '../../config.php';
    include_once '../sesiones.php';
    use Control\Sesiones;

    global $asesorias_proximas, $asesorias_pendientes, $asesorias_canceladas;
    if( Sesiones::isAlumno() ){
        // obtiene asesorias como asesor

    }
    else{
        // obtiene asesorias como alumno
    }



?>

<?php include_once TEMP_PATH."/header.php"; ?>

<!--MENU-->
<div class="container">
    <?php include_once TEMP_PATH."/estudiante-menu.php"; ?>
    <h2>Asesorias</h2>

    <h3>Proximas</h3>
    <h3>Pendientes de validar</h3>
    <h3>Canceladas</h3>


<!--    --><?php //if( (count($asesorias) == 0) &&  (count($canceladas) == 0) ): ?>
<!--        <h3>No cuenta con asesorias registradas</h3>-->
<!--    --><?php //else: ?>
<!--        <div id="asesorias">-->
<!--            <h3>Asesorias en tiempo</h3>-->
<!--            --><?php //foreach( $asesorias as $a ): ?>
<!--                <div class="item-asesoria" style="padding: 10px; border: 1px solid black; display: inline-block; width: 500px;">-->
<!--                    <p class="alumno-asesoria"> Alumno: --><?//= $a['alumno'] ?><!-- </p>-->
<!--                    <p class="materia-asesoria"> <strong>Materia:</strong>: --><?//= $a['materia'] ?><!-- </p>-->
<!--                    <p class="asesor-asesoria"> <strong>Asesor</strong>: --><?//= $a['asesor'] ?><!-- </p>-->
<!--                    <p class="fecha-asesoria"> <strong>Fecha</strong>: --><?//= $a['fecha'] ?><!-- </p>-->
<!--                    <p class="dia-hora-asesoria"> --><?//= $a['dia'] ?><!-- a las --><?//= $a['hora'] ?><!-- </p>-->
<!--                    <p class="descripcion-asesoria"> <strong>Descripcion:</strong> --><?//= $a['descripcion'] ?><!-- </p>-->
<!--                    <button class="btn-cancelar-asesoria" data-asesoria="--><?//= $a['id_asesoria'] ?><!--">Cancelar asesoria</button>-->
<!--                </div>-->
<!--            --><?php //endforeach; ?>
<!--        </div>-->
<!---->
<!---->
<!--        <div id="asesorias-canceladas">-->
<!--            <h3 style="color: red">Asesorias canceladas</h3>-->
<!--            --><?php //foreach( $canceladas as $c ): ?>
<!--                <div class="item-asesoria" style="padding: 10px; border: 1px solid black; display: inline-block; width: 500px;">-->
<!--                    <p class="alumno-asesoria"> Alumno: --><?//= $c['alumno'] ?><!-- </p>-->
<!--                    <p class="materia-asesoria"> <strong>Materia:</strong>: --><?//= $c['materia'] ?><!-- </p>-->
<!--                    <p class="asesor-asesoria"> <strong>Asesor</strong>: --><?//= $c['asesor'] ?><!-- </p>-->
<!--                    <p class="fecha-asesoria"> <strong>Fecha</strong>: --><?//= $c['fecha'] ?><!-- </p>-->
<!--                    <p class="dia-hora-asesoria"> --><?//= $c['dia'] ?><!-- a las --><?//= $c['hora'] ?><!-- </p>-->
<!--                    <p class="descripcion-asesoria"> <strong>Descripcion:</strong> --><?//= $c['descripcion'] ?>
<!--                    <p class="razon-asesoria"> <strong>Razon de cancelacion:</strong> --><?//= $c['razon'] ?><!-- </p>-->
<!--                </div>-->
<!--            --><?php //endforeach; ?>
<!--        </div>-->
<!--    --><?php //endif; ?>
</div>

<?php include_once TEMP_PATH."/footer.php"; ?>


