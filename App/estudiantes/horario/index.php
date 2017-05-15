<?php 

    require_once '../../config.php';
	require_once '../sesiones.php';
    include_once '../funciones.class.php';
	

    //Obtiene dias
    $query = "SELECT PK_dia_id as 'id', dia_nombre as 'dia' 
                FROM dia order by id";
    $dias = $generico->getDatos($query);

    //Obtiene horas
    $query = "SELECT PK_hora_id as 'id', hora 
                FROM hora order by PK_hora_id";
    $horas = $generico->getDatos($query);


    //Obtener horario del estudiante
    $query = " SELECT dh.FK_hora as 'hora', dh.FK_dia as 'dia'
                 FROM dia_hora dh
                 INNER JOIN horario h ON h.PK_horario_id = dh.FK_horario
                 WHERE h.FK_asesor = ".$_SESSION['idEstudiante']." AND h.FK_ciclo = ".$_SESSION['ciclo']['id'];
    $horario = $generico->getDatos($query);

    $funciones = new Funciones();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Horario</title>
    <link rel="stylesheet" href="../../assets/stylesheet/estilos.css">
</head>
<body>
	
	<?php $titulo = "Horario"; include_once EST_PATH . "/inc_menu.php"; ?>

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

                        <?php if( $funciones->isHorario($horario, $dia, $hora ) ): ?>
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

    <p>Ciclo: <?= $_SESSION['ciclo']['inicio']." a ".$_SESSION['ciclo']['fin'] ?></p>
    <!-- Scripts -->
    <script src="../../assets/js/vendor/jquery.js"></script>
    <script src="../../assets/js/custom.js"></script>
</body>
</html>