<?php 

	require_once '../../config.php';
	require_once '../session_login.php';

	if( !isset($_POST['json']) ){
		return false;
		exit();
	}

	$json = $_POST['json'];
	$obj = json_decode($json);
	$materiaID = $obj->materia;
	// $asesorID = $obj->asesor;
	$alumnoID = $obj->alumno;
	$dia_horaID = $obj->dia_hora;
	// $cicloID = $obj->ciclo;
	$fecha = $obj->fecha;
	$desc = $obj->descripcion;


	$query = "INSERT INTO asesoria(asesoria_fecha, asesoria_desc, FK_alumno, FK_dia_hora, FK_materia) VALUES('".$fecha."', '".$desc."', ".$alumnoID.", ".$dia_horaID.", ".$materiaID.")";
	$generico->setDatos($query);
	echo true;



 ?>