<?php

    require_once '../../config.php';

    use Control\ControlUsuarios;
    use Control\Sesiones;

    if( !isset($_POST['user']) || !isset($_POST['pass']) )
        exit();

    //Se obtienen los persistencia
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$conUsuario = new ControlUsuarios();
    $resultado = $conUsuario->verificarUsuario($user, $pass);

    //TODO: crear metodo para crear JSON's
    //Si se encuentra usuario
    if( $resultado == 'error' ){
        $respuesta = [
            'resultado' => 'error',
            'mensaje' => 'Ocurrio un error'
        ];
        echo json_encode( $respuesta );
    }
    if( $resultado != null ){
        // Establece la session (usuario y estudiante)
        Sesiones::setSesionUsuario( $resultado );


        //Si es estudiante
        if( $resultado->getRol() == 'estudiante' ) {
            $estRespuesta = Sesiones::setSesionEstudiante( $resultado->getId() );
            //Si ocurre un error al buscar estudiante
            if( $estRespuesta != true )
                echo json_encode( $estRespuesta );
        }


        // Regresa el nombre del rol para redireccionamiento
        $respuesta = [
            'resultado' => true,
            'mensaje' => 'Usuario encontrado',
            'rol' => $resultado->getRol()
        ];
        echo json_encode( $respuesta );
    }
    else{
        //Si no e encontro usuario
        $respuesta = [
            'resultado' => false,
            'mensaje' => 'Usuario y/o contraseña incorrectos'
        ];
        echo json_encode( $respuesta );
    }


	

?>