<?php 

    require_once '../config.php';
	require_once 'sesiones.php';
	


    $query = "SELECT 
                CONCAT(e.est_nombre, ' ', e.est_apellido) as 'Nombre',
                h.PK_horario_id as 'IDHorario',
                c.ciclo_inicio as 'Inicio',
                c.ciclo_fin as 'fin',
                dh.PK_dia_hora as 'dia_hora ID',
                d.dia_nombre as 'dia',
                t.hora as 'hora'
            FROM estudiante e
            INNER JOIN horario h ON h.FK_asesor = e.PK_est_id
            INNER JOIN ciclo c ON c.PK_ciclo_id = h.FK_ciclo
            INNER JOIN dia_hora dh ON dh.FK_horario = h.PK_horario_id
            INNER JOIN hora t ON t.PK_hora_id = dh.FK_hora
            INNER JOIN dia d ON d.PK_dia_id = dh.FK_dia
            WHERE e.PK_est_id = ".$idEstudiante;

    $horario = $generico->getDatos($query);

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

    <p>Ciclo: <?= $_SESSION['ciclo']['inicio']." a ".$_SESSION['ciclo']['fin'] ?></p>

</body>
</html>