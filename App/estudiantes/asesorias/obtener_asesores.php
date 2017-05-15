<?php 

	require_once '../../config.php';
	require_once '../sesiones.php';

	if( !isset($_POST['json']) ){
		return false;
		exit();
	}

	$json = $_POST['json'];
	$obj = json_decode($json);
	$cicloID = $obj->ciclo;
	$estudianteID = $obj->estudiante;
	$materiaID = $obj->materia;

	$query = "SELECT e.PK_est_id as 'id_estudiante',
				CONCAT(e.est_nombre, ' ', e.est_apellido) as 'nombre_asesor'
			FROM estudiante e
			INNER JOIN horario h ON h.FK_asesor = e.PK_est_id
			INNER JOIN ciclo c ON c.PK_ciclo_id = h.FK_ciclo
			INNER JOIN horario_materia hm ON hm.FK_horario = h.PK_horario_id
			INNER JOIN materia m ON m.PK_mat_id = hm.FK_materia
			WHERE (h.FK_ciclo = ".$cicloID." AND e.PK_est_id <> ".$estudianteID.")
			AND ( m.PK_mat_id = ".$materiaID." )
			GROUP BY nombre_asesor
			ORDER BY nombre_asesor";

	$asesores = $generico->getDatos($query);

	$resultado = '';
	foreach($asesores as $a){
		$resultado .= '<a href="javascript:void(0)" class="item-asesor" data-asesor="'.$a['id_estudiante'].'">'.$a['nombre_asesor'].'</a>';
	}

	echo $resultado;
	

?>	

