<?php

	require_once '../../config.php';
	require_once '../session_login.php';
	include_once '../funciones.class.php';

	// Materias solo de la carrera del estudiante
	// $query = "SELECT m.PK_mat_id as 'materiaID', 
	// 				mat_nombre as 'nombre'
	// 		FROM materia m 
	// 		INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_mat_id 
	// 		INNER JOIN horario h ON h.PK_horario_id = hm.FK_horario 
	// 		WHERE (h.FK_ciclo = ".$_SESSION['ciclo']['id']." AND h.FK_asesor != ".$_SESSION['idEstudiante'].") AND (m.FK_carrera = ".$_SESSION['carrera']['id'].")
	// 		GROUP BY nombre ORDER BY materiaID";

	// Materias de todas las carreras
	$query = "SELECT m.PK_mat_id as 'materiaID', 
					mat_nombre as 'nombre'
			FROM materia m 
			INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_mat_id 
			INNER JOIN horario h ON h.PK_horario_id = hm.FK_horario 
			WHERE (h.FK_ciclo = ".$_SESSION['ciclo']['id']." AND h.FK_asesor != ".$_SESSION['idEstudiante'].")	GROUP BY nombre ORDER BY materiaID";

	$materias = $generico->getDatos($query);


	$funciones = new Funciones();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../assets/stylesheet/estilos.css">
</head>
<body>

	<?php $titulo = "Solicitar asesorias"; include_once EST_PATH . "/inc_menu.php"; ?>

	<?php if( count($materias) == 0 ): ?>
		<p>No hay materias con asesores disponibles</p>
	<?php else: ?>
		<h2>Materias (con asesores)</h2>
		<!-- Materias disponibles -->
		<div id="materias">

			<?php foreach( $materias as $m ): ?>
				<a href="javascript:void(0)" class="item-materia materia-asesoria" data-materia='<?= $m['materiaID'] ?>'> <?= $m['nombre']; ?> </a>
			<?php endforeach; ?>

		</div>

		<!-- Asesores de materia seleccionada-->
		<div id="asesores"></div>

		<!-- Tabla de horario del asesor seleccionado-->
		<div id="horario"></div>

		<!-- Espacio para descripcion de asesoria -->
		<div id="descripcion">
			<h3>Descripcion de la asesoria (de que necesita asesoria)</h3>
			<textarea name="" id="comentario" cols="80" rows="10"></textarea>
		</div>

		<!-- Opciones para enviar form -->
		<div class="opciones">
			<button id="btn-registrar-asesoria">Registrar asesoria</button>
		</div>

	<?php endif; ?>
	
	<!-- Scripts -->
	<script src="../../assets/js/vendor/jquery.js"></script>
	<script src="../../assets/js/custom.js"></script>
</body>
</html>
