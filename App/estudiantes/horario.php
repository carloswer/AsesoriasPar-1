<?php 

    require_once '../config.php';
    require_once 'generico.php';
	require_once 'sesiones.php';
	

    //Se obtiene horario del estudiante (asesor)
    // $query = "SELECT e.PK_est_id as 'ID Estudiante',
    //             CONCAT( e.est_nombre, ' ', e.est_apellido ) as Nombre,
    //             c.ciclo_inicio as 'Ciclo Inicio',
    //             c.ciclo_fin as 'Ciclo Fin',
    //             d.dia_nombre as 'Dia',
    //             hora.hora as 'Hora'
    //             FROM horario h
    //             INNER JOIN estudiante e ON e.PK_est_id = h.FK_asesor
    //             INNER JOIN dia_hora dh ON dh.FK_horario = h.PK_horario_id
    //             INNER JOIN dia d ON d.PK_dia_id = dh.FK_dia
    //             INNER JOIN hora ON hora.PK_hora_id = dh.PK_dia_hora
    //             INNER JOIN ciclo c ON c.PK_ciclo_id = h.FK_ciclo
    //             WHERE e.PK_est_id = ".$id;

    $query = "SELECT * FROM horario h
                INNER JOIN estudiante e ON e.PK_est_id = h.FK_asesor
                INNER JOIN dia_hora dh ON dh.FK_horario = h.PK_horario_id
                INNER JOIN dia d ON d.PK_dia_id = dh.FK_dia
                INNER JOIN hora ON hora.PK_hora_id = dh.PK_dia_hora
                INNER JOIN ciclo c ON c.PK_ciclo_id = h.FK_ciclo
                WHERE (DATE(NOW()) BETWEEN c.ciclo_inicio AND c.ciclo_fin) 
                AND e.PK_est_id = ".$idEstudiante;

    $horario = $generico->query($query);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Horario</title>
</head>
<body>
	
	<h1>Horario << <?= $username; ?> >></h1>
	<?php include_once "inc_menu.php"; ?>

    <?php if( COUNT($horario) == 0 ): ?>

        <h3>No cuenta con un horario del ciclo actual. 
            <a href="crear_horario.php">Crear horario</a>
        </h3>

    <?php else: ?>

        <h3>Ya tiene un horario creado</h3>
        <a href="#">Modificar horario</a>

    <?php endif; ?>

</body>
</html>