<?php

    require_once '../../../config.php';

    use Control\ControlHorarios;
    use Control\Funciones;

	//TODO: que no pueda registrar si ya tiene uno
	if ( !isset($_POST['json_horario']) )
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
        return Funciones::makeJsonResponse(
            "schedule-register",
            "null",
            "Hay valores vacios",
            $json
        );
    }

	//------------------INSERT DE HORARIO
    $conHorarios = new ControlHorarios();
    $result = $conHorarios->insertStudentSchedule( $idStudent, $hours, $subjects );



    //registrando horario
//    $res = $conHorarios->registrarHorario( $idStudent, $ciclo['id'] );
//    if( $res == false ){
//        $respuesta = ['resultado' => 'false', 'mensaje' => 'no se registro horario'];
//        echo json_encode($respuesta);
//        exit();
//    }
//    //obteniendo ultimo horario registrado
//    // TODO: Verificar que no tenga ya un horario registrado
//    $horarioID = $conHorarios->getStudentSchedule_ByStudentId($idStudent, $ciclo['id']);
//    //Si no existe un horario
//    if( $horarioID == null ){
//        $respuesta = ['resultado' => 'false', 'mensaje' => 'horario null'];
//        echo json_encode($respuesta);
//        exit();
//    }
//
//
//
//    //-----Registro de horas y dias
//    //TODO: crea un array con registros y enviar todos a la vez (dias_horas)
//    foreach($hours as $dh ){
//        //la variable $dh se convirtio en objeto al decodificarse y por eso se maneja como tal
////        $res = $conHorarios->registrarHorario_DiasHoras($horario, $dh->diaID, $dh->horaID);
//        $res = $conHorarios->registrarHorario_DiasHoras($horarioID, $dh);
//        if( $res == null ){
//            $respuesta = ['resultado' => 'false', 'mensaje' => 'no se registro Dia y Hora'];
//            echo json_encode($respuesta);
//            exit();
//        }
//    }
//
//    //-----Registro de materias
////TODO: crea un array con registros y enviar todos a la vez (materias)
//    foreach($subjects as $mat ){
//        $res = $conHorarios->registrarHorario_Materias($horarioID, $mat);
//        if( $res == null ){
//            $respuesta = ['resultado' => 'false', 'mensaje' => 'no se registro materia'];
//            echo json_encode($respuesta);
//            exit();
//        }
//    }
//
//    $respuesta = ['resultado' => 'true', 'mensaje' => 'registrado con éxito'];
//    echo json_encode($respuesta);


 ?>