<?php 

	//Comprobando session de usuario
	session_start();
	if( !isset( $_SESSION['username'] ) )
		header("Location: ../index.php");


	//Si existe, toma el usuario
	$username = $_SESSION['username'];
	$idUser = $_SESSION['idUser'];


	//Si no se ha obtenido ID de estudiante
    if( !isset($_SESSION['idEstudiante']) ){
	    // Obtener id de estudiante
		$query = "SELECT e.PK_est_id, c.PK_ca_id, c.ca_nombre FROM estudiante e
					INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
					WHERE e.FK_usuario = ".$idUser;
		$e = $generico->getDatos($query);

		//Estudiante
	    $_SESSION['idEstudiante'] = $e[0]['PK_est_id'];

	    //Carrera
	    $_SESSION['carrera']['id'] 		= $e[0]['PK_ca_id'];
	    $_SESSION['carrera']['nombre'] 	= $e[0]['ca_nombre'];



		// Obtener ID ciclo actual
		$query = "SELECT PK_ciclo_id as 'id', ciclo_inicio as 'inicio', ciclo_fin as 'fin'
					FROM  ciclo
					WHERE DATE(NOW()) BETWEEN ciclo_inicio AND ciclo_fin;";
		$c = $generico->getDatos($query);

		$_SESSION['ciclo']['id']	= $c[0]['id'];
		$_SESSION['ciclo']['inicio']= $c[0]['inicio'];
		$_SESSION['ciclo']['fin'] 	= $c[0]['fin'];

	}

 ?>