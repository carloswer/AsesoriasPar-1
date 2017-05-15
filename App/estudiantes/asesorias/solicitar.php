<?php

	require_once '../../config.php';
	require_once '../sesiones.php';

	$query = "SELECT m.PK_mat_id as 'materiaID', 
					mat_nombre as 'nombre'
			FROM materia m 
			INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_mat_id 
			INNER JOIN horario h ON h.PK_horario_id = hm.FK_horario 
			WHERE (h.FK_ciclo = ".$_SESSION['ciclo']['id']." AND h.FK_asesor != ".$_SESSION['idEstudiante'].") AND (m.FK_carrera = ".$_SESSION['carrera']['id'].")
			GROUP BY nombre ORDER BY materiaID";

	$materias = $generico->getDatos($query);
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
		<div id="materias">

			<?php foreach( $materias as $m ): ?>
				<a href="javascript:void(0)" class="item-materia materia-asesoria" data-materia='<?= $m['materiaID'] ?>'> <?= $m['nombre']; ?> </a>
			<?php endforeach; ?>

		</div>
		<div id="asesores"></div>
	<?php endif; ?>
	
	<!-- Scripts -->
	<script src="../../assets/js/vendor/jquery.js"></script>
	<script src="../../assets/js/custom.js"></script>
</body>
</html>
