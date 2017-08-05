<?php

    require_once '../../config.php';
    use Control\ControlUsuarios;
    use Control\Sesiones;
//    use Objetos\Usuario;
//    use Objetos\Estudiante;

    if( !isset($_POST['user']) || !isset($_POST['pass']) ){
        exit();
    }

    //Se obtienen los persistencia
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$conUsuario = new ControlUsuarios();
    $usuario = $conUsuario->verificarUsuario($user, $pass);

    if( $usuario != null ){
        // Establece la session (usuario y estudiante)
        Sesiones::setSesionUsuario( $usuario );

        //Si es estudiante
        if( $usuario->getRol() == 'estudiante' ) {
            Sesiones::setSesionEstudiante( $usuario->getId() );
        }

        // Regresa el nombre del rol para redireccionamiento
        echo $usuario->getRol();
    }
    else{
        echo "false";
    }



// //si se encontro un usuario
// 	if( !empty($usuario) ){

// 		//----------Datos del usuario y rol
// 		session_start();
// 		$_SESSION['usuario']['id']      = $usuario['id'];
// 		$_SESSION['usuario']['username']= $usuario['username'];
// 		$_SESSION['usuario']['rol']     = $usuario['rol'];

//         //----------Datos del perido actual
//         $ctrlHorario = new ControlHorarios();
//         $periodo = $ctrlHorario->obtenerPeriodoActual();

//         //Si hay un periodo actual disponible
//         if( !empty( $periodo ) ){
//             $_SESSION['periodo']['id']      = $periodo['id'];
//             $_SESSION['periodo']['inicio']  = $periodo['inicio'];
//             $_SESSION['periodo']['fin']     = $periodo['fin'];
//         }


//         //----------REDIRECCION Y ROL
//         //si es administrador
// 		if( $_SESSION['usuario']['rol'] == 1 ){
//             //Redireccionando
//             header('Location: administrador/');
//             echo "ADMIN";
//         }
// 		//Si es estudiante
// 		else if( $_SESSION['usuario']['rol'] == 2 ){

// 		    $estudiante = $ctrlUsuarios->obtenerEstudianteIdUsuario( $_SESSION['usuario']['id'] );

// 		    //-------Estudiante
//             $_SESSION['estudiante']['id']       = $estudiante['id'];
//             $_SESSION['estudiante']['nombre']   = $estudiante['nombre'];
//             $_SESSION['estudiante']['carrera']  = $estudiante['carrera'];

//             //Redireccionando
//             header('Location: estudiantes/');
//         }
// 	}
// 	else{
// 		echo "No existe usuario <br>";
// 		echo "<a href='index.php'>regresar</a>";
// 	}


	

?>