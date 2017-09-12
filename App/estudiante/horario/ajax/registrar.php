<?php

    require_once '../../../config.php';

    use Control\ControlHorarios;
    use Control\Funciones;

	//TODO: que no pueda registrar si ya tiene uno
	if ( !isset($_POST['json_schedule']) )
		header("Location: ".EST_PATH."/horrario");


	//Recibe JSON y decodifica
	$json = $_POST['json_schedule'];
	$datos = json_decode($json);

	//Elementos
	$idStudent = $datos->student;
	$hours	= $datos->schedule;
	$subjects 	= $datos->subjects;


	//----Verificacion de datos
    if( empty($idStudent) || empty($hours) || empty($subjects) ) {
        echo Funciones::makeJsonResponse(
            "schedule-register",
            "null",
            "Hay valores vacios",
            $json
        );
    }

	//------------------INSERT DE HORARIO
    $conHorarios = new ControlHorarios();
    $result = $conHorarios->insertStudentSchedule( $idStudent, $hours, $subjects );

    //------------------------------Para ciclo escolar
    if( $result == 'error' ){
        echo Funciones::makeJsonResponse(
            "schedule-register",
            "error",
            "No hay un ciclo actual disponible"
        );
    }
    else if( $result == null ){
        echo Funciones::makeJsonResponse(
        "schedule-register",
        "error",
        "No se encontro ningun ciclo actual"
        );
    }
    //------------------------------Para registro de horario
    else if( $result['result'] === 'error' ){
        echo Funciones::makeJsonResponse(
            "schedule-register",
            "error",
            $result['message']
        );
    }
    else{
        echo Funciones::makeJsonResponse(
            "schedule-register",
            true,
            $result['message']
        );
    }






 ?>