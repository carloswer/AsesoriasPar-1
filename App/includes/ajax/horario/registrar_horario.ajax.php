<?php

    require_once '../../../config.php';
    use Control\ControlHorarios;

	//TODO: que no pueda registrar si ya tiene uno
	if ( !isset($_POST['json_horario']) )
		header("Location: horario.php");


	//Recibe JSON y decodifica
	$json = $_POST['json_horario'];
	$datos = json_decode($json);

	//Elementos
	$estudiante = $datos->estudiante;
	$dias_horas	= $datos->horario;
	$materias 	= $datos->materias;


	//------------------INSERT DE HORARIO
    $conHorarios = new ControlHorarios();
    //obteniendo ciclo actual
    $ciclo = $conHorarios->obtenerCicloActual();
    //Si no hay un ciclo actual
    if( $ciclo == null ) {
        $respuesta = ['resultado' => 'false', 'mensaje' => 'no hay ciclo actual'];
        echo json_encode($respuesta);
        exit();
    }

    // TODO: Hacer con un SP para evitar concurrencia y tomar el ID de otro registro diferente
    //registrando horario
    $res = $conHorarios->registrarHorario( $estudiante, $ciclo['id'] );
    if( $res == false ){
        $respuesta = ['resultado' => 'false', 'mensaje' => 'no se registro horario'];
        echo json_encode($respuesta);
        exit();
    }
    //obteniendo ultimo horario registrado
    // TODO: Verificar que no tenga ya un horario registrado
    $horario = $conHorarios->obtenerHorarioId($estudiante, $ciclo['id']);
    //Si no existe un horario
    if( $horario == null ){
        $respuesta = ['resultado' => 'false', 'mensaje' => 'horario null'];
        echo json_encode($respuesta);
        exit();
    }



    //-----Registro de horas y dias
    foreach($dias_horas as $dh ){
        //la variable $dh se convirtio en objeto al decodificarse y por eso se maneja como tal
        $res = $conHorarios->registrarHorario_DiasHoras($horario, $dh->diaID, $dh->horaID);
        if( $res == null ){
            $respuesta = ['resultado' => 'false', 'mensaje' => 'no se registro Dia y Hora'];
            echo json_encode($respuesta);
            exit();
        }
    }

    //-----Registro de materias
    foreach( $materias as $mat ){
        $res = $conHorarios->registrarHorario_Materias($horario, $mat);
        if( $res == null ){
            $respuesta = ['resultado' => 'false', 'mensaje' => 'no se registro materia'];
            echo json_encode($respuesta);
            exit();
        }
    }

    $respuesta = ['resultado' => 'true', 'mensaje' => 'registrado con éxito'];
    echo json_encode($respuesta);


 ?>