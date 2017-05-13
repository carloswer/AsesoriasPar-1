<?php

	require_once '../config.php';

	//TODO: que no pueda registrar si ya tiene uno
	if ( !isset($_POST['jsonHM']) )
		header("Location: horario.php");


	//Recibe JSON y decodifica
	$json = $_POST['jsonHM'];
	$datos = json_decode($json);
	// echo $json."<br>";
	

	//Elementos
	$ciclo 		= $datos->ciclo;
	$estudiante = $datos->estudiante;
	$horario 	= $datos->horario;
	$materias 	= $datos->materias;



	//INSERT DE HORARIO
	$query = "INSERT INTO horario(FK_asesor, FK_ciclo) VALUES
				(".$estudiante.", ".$ciclo.")"; //1 del ciclo, dato de prueba
	// echo $query."<br>";
	$generico->setDatos($query);



	$query = "SELECT PK_horario_id as id FROM horario ORDER BY PK_horario_id desc LIMIT 1";
	// echo $query."<br>";
	$idHorario = $generico->getDatos($query);




	if( count($idHorario) > 0 ){

		$id = $idHorario[0]['id'];

		//-----Registro de horas y dias
		foreach( $horario as $hm ){
			$query = "INSERT INTO dia_hora(FK_horario, FK_hora, FK_dia) VALUES
			(".$id.", ".$hm->HoraID.", ".$hm->DiaID.");";
			// echo $query."<br>";
			$generico->setDatos($query);
		}

		//-----Registro de materias
		foreach( $materias as $mat ){
			$query = "INSERT INTO horario_materia(FK_horario, FK_materia) VALUES
			(".$id.", ".$mat.");";
			// echo $query."<br>";
			$generico->setDatos($query);
		}

		//Mensaje de respuesta para el AJAX
		echo true;
	}
	else{
		//Mensaje de respuesta para el AJAX
		echo false;
	}




 ?>