<?php 

	require_once '../../config.php';
	require_once '../sesiones.php';

	if( !isset($_POST['json']) ){
		return false;
		exit();
	}

	$json = $_POST['json'];
	$obj = json_decode($json);
	$asesoriaID = $obj->asesoriaID;
	$comentario = $obj->comentario;


	$query = "INSERT INTO estado_asesoria(val_tipo, val_comentario, FK_asesoria) VALUES (2, '".$comentario."', ".$asesoriaID.");";
	$generico->setDatos($query);
	echo $query;
	// echo true;


 ?>