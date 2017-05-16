<?php 

	require_once '../../config.php';
	require_once '../sesiones.php';

		// Asesosias sin validar y que aun no llega su fecha
	$query = "SELECT  
				a.PK_asesoria_id as 'id_asesoria',
				CONCAT(e.est_nombre,' ',e.est_apellido) as 'alumno',
				CONCAT(eh.est_nombre,' ',eh.est_apellido) as 'asesor',
				m.mat_nombre as 'materia',
				a.asesoria_desc as 'descripcion',
				d.dia_nombre as 'dia',
				ho.hora as 'hora',
				a.asesoria_fecha as 'fecha',
				a.asesoria_registro as 'registro_asesoria'
			FROM asesoria a
			--  Alumno
			INNER JOIN estudiante e ON e.PK_est_id = a.FK_alumno
			INNER JOIN materia m ON m.PK_mat_id = a.FK_materia
			-- Asesor
			INNER JOIN dia_hora dh ON dh.PK_dia_hora = a.FK_dia_hora
			INNER JOIN hora ho ON ho.PK_hora_id = dh.FK_hora
			INNER JOIN dia d ON d.PK_dia_id = dh.FK_dia
			INNER JOIN horario h ON h.PK_horario_id = dh.FK_horario
			INNER JOIN estudiante eh ON eh.PK_est_id = h.FK_asesor
			LEFT JOIN estado_asesoria ea ON ea.FK_asesoria = a.PK_asesoria_id
			WHERE (ea.FK_asesoria IS NULL) AND (e.PK_est_id = ".$_SESSION['idEstudiante']." OR eh.PK_est_id = ".$_SESSION['idEstudiante'].")";
			// Agregar ciclo

	$asesorias = $generico->getDatos($query);

	// Asesorias pendientes de validar
	// $query = "";
	// $ = $generico->getDatos($query);

	// -------Asesorias validadas
	// Canceladas
	$query = "SELECT  
				a.PK_asesoria_id as 'id_asesoria',
				CONCAT(e.est_nombre,' ',e.est_apellido) as 'alumno',
				CONCAT(eh.est_nombre,' ',eh.est_apellido) as 'asesor',
				m.mat_nombre as 'materia',
				a.asesoria_desc as 'descripcion',
				d.dia_nombre as 'dia',
				ho.hora as 'hora',
				a.asesoria_fecha as 'fecha',
				a.asesoria_registro as 'registro_asesoria',
				ea.val_comentario as 'razon'
			FROM asesoria a
			INNER JOIN estudiante e ON e.PK_est_id = a.FK_alumno
			INNER JOIN materia m ON m.PK_mat_id = a.FK_materia
			INNER JOIN dia_hora dh ON dh.PK_dia_hora = a.FK_dia_hora
			INNER JOIN hora ho ON ho.PK_hora_id = dh.FK_hora
			INNER JOIN dia d ON d.PK_dia_id = dh.FK_dia
			INNER JOIN horario h ON h.PK_horario_id = dh.FK_horario
			INNER JOIN estudiante eh ON eh.PK_est_id = h.FK_asesor
			INNER JOIN estado_asesoria ea ON ea.FK_asesoria = a.PK_asesoria_id
			WHERE ea.val_tipo = 2 AND (e.PK_est_id = ".$_SESSION['idEstudiante']." OR eh.PK_est_id = ".$_SESSION['idEstudiante'].")";
			// WHERE ea.val_tipo = 2";
	$canceladas = $generico->getDatos($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../assets/stylesheet/estilos.css">
</head>
<body>
	
	<?php $titulo = "Asesorias"; include_once EST_PATH . "/inc_menu.php"; ?>
	<a href="solicitar.php">Solicitar asesoria</a>

	<?php if( (count($asesorias) == 0) &&  (count($canceladas) == 0) ): ?>
		<h3>No cuenta con asesorias registradas</h3>
	<?php else: ?>
		<div id="asesorias">
			<h3>Asesorias en tiempo</h3>
			<?php foreach( $asesorias as $a ): ?>
				<div class="item-asesoria" style="padding: 10px; border: 1px solid black; display: inline-block; width: 500px;">
					<p class="alumno-asesoria"> Alumno: <?= $a['alumno'] ?> </p>
					<p class="materia-asesoria"> <strong>Materia:</strong>: <?= $a['materia'] ?> </p>
					<p class="asesor-asesoria"> <strong>Asesor</strong>: <?= $a['asesor'] ?> </p>
					<p class="fecha-asesoria"> <strong>Fecha</strong>: <?= $a['fecha'] ?> </p>
					<p class="dia-hora-asesoria"> <?= $a['dia'] ?> a las <?= $a['hora'] ?> </p>
					<p class="descripcion-asesoria"> <strong>Descripcion:</strong> <?= $a['descripcion'] ?> </p>
					<button class="btn-cancelar-asesoria" data-asesoria="<?= $a['id_asesoria'] ?>">Cancelar asesoria</button>
				</div>
			<?php endforeach; ?>
		</div>


		<div id="asesorias-canceladas">
			<h3 style="color: red">Asesorias canceladas</h3>
			<?php foreach( $canceladas as $c ): ?>
				<div class="item-asesoria" style="padding: 10px; border: 1px solid black; display: inline-block; width: 500px;">
					<p class="alumno-asesoria"> Alumno: <?= $c['alumno'] ?> </p>
					<p class="materia-asesoria"> <strong>Materia:</strong>: <?= $c['materia'] ?> </p>
					<p class="asesor-asesoria"> <strong>Asesor</strong>: <?= $c['asesor'] ?> </p>
					<p class="fecha-asesoria"> <strong>Fecha</strong>: <?= $c['fecha'] ?> </p>
					<p class="dia-hora-asesoria"> <?= $c['dia'] ?> a las <?= $c['hora'] ?> </p>
					<p class="descripcion-asesoria"> <strong>Descripcion:</strong> <?= $c['descripcion'] ?> 
					<p class="razon-asesoria"> <strong>Razon de cancelacion:</strong> <?= $c['razon'] ?> </p>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<!-- Scripts -->
	<script src="../../assets/js/vendor/jquery.js"></script>
	<script src="../../assets/js/custom.js"></script>
</body>
</html>




