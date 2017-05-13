<?php 

	require_once '../../config.php';
	// require_once '../sesiones.php';
	require_once '../generico.php';

	if ( !isset($_POST['horario_materias']) )
		header("Location: ../");	

	
	
	//Recibe JSON
	$json = $_POST['horario_materias'];
	$datos = json_decode($json);
	//Elementos
	$estudiante = $datos->estudiante;
	$horario = $datos->horario;
	$materias = $datos->materias;



	//INSERT DE HORARIO
	$query = "INSERT INTO horario(FK_asesor, FK_ciclo) VALUES
				(".$estudiante.", 1)"; //1 del ciclo, dato de prueba
	// echo $query."<br>";
	$generico->query($query);



	//SELECT DE ULTIMO horario agregado
	$query = "SELECT MAX(PK_horario_id) FROM horario";
	// echo $query."<br>";
	// $idHorario = 1;
	$idHorario = $generico->query($query);




	//-----Registro de horas y dias
	foreach( $horario as $hm ){
		$query = "INSERT INTO dia_hora(FK_horario, FK_hora, FK_dia) VALUES
		(".$idHorario.", ".$hm->HoraID.", ".$hm->DiaID.");";
		// echo $query."<br>";
		$generico->query($query);
	}


	//-----Registro de materias
	foreach( $materias as $mat ){
		$query = "INSERT INTO horario_materia(FK_horario, FK_materia) VALUES
		(".$idHorario.", ".$mat.");";
		// echo $query."<br>";
		$generico->query($query);
	}

	//Mensaje de respuesta para el AJAX
	echo true;

 ?>