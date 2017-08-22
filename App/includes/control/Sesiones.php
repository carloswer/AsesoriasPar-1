<?php namespace Control;

	use Control\ControlEstudiantes;
    use Objetos\Usuario;
    use Objetos\Estudiante;

    class Sesiones{

		//---------------- LOGGIN

		public static function setSesionUsuario(Usuario $usuario){
			session_start();
            //Si es estudiante
            $rol = $usuario->getRol();

            //Datos del usuario
			$_SESSION['usuario']['id']       = $usuario->getId();
            $_SESSION['usuario']['username'] = $usuario->getUsername();
            $_SESSION['usuario']['rol']      = $rol;


            //----------Datos del perido actual
            // $ctrlHorario = new ControlHorarios();
            // $periodo = $ctrlHorario->obtenerPeriodoActual();
            //Si hay un periodo actual disponible
            // if( !empty( $periodo ) ){
            //     $_SESSION['periodo']['id']      = $periodo['id'];
            //     $_SESSION['periodo']['inicio']  = $periodo['inicio'];
            //     $_SESSION['periodo']['fin']     = $periodo['fin'];
            // }
		}


		public static function setSesionEstudiante( $id ){
		    session_start();

            //Obtiene datos del estudiante
            $conEst = new ControlEstudiantes();
            $estudiante = $conEst->obtenerEstudiante_UsuarioId( $id );

            if( $estudiante != null ) {
                //Datos del estudiante
                $_SESSION['estudiante']['id'] = $estudiante->getIdEstudiante();
                $_SESSION['estudiante']['nombre'] = $estudiante->getNombre() . " " . $estudiante->getApellido();
                $_SESSION['estudiante']['carrera'] = $estudiante->getCarrera();
                return true;
            }
            else{
                $respuesta = [
                    'resultado' => 'error',
                    'mensaje' => 'No existe un estudiate asociado al usuario'
                ];
                return $respuesta;
            }
        }

		public static function borrarSesion(){
			session_start();
			//Borra toda la session
    		session_destroy();
		}


		//---------------- DATOS
		public static function isSesionActiva(){
			session_start();
			if( isset( $_SESSION['usuario']['id'] ) )
				return true;
			else 
				return false;
		}

		public static function getDatosSesion(){
			// session_start();
			if( self::isSesionActiva() ){
				$user = [
					"id" 		=> $_SESSION['usuario']['id'],
					"username" 	=> $_SESSION['usuario']['username'],
					"rol" 		=> $_SESSION['usuario']['rol']
				];
				return $user;
			}
			else 
				return null;
		}

		//--------------------- ROL
		public static function isAdministrador(){
			if( self::isSesionActiva() ){
				if( $_SESSION['usuario']['rol'] == "administrador" )
					return true;
				else
					return false;
			}
			else
				return null;
		}


		public static function isEstudiante(){
			if( self::isSesionActiva() ){
				if( $_SESSION['usuario']['rol'] == "estudiante" )
					return true;
				else
					return false;
			}
			else
				return null;
		}

		public static function getRol(){
			if( self::isSesionActiva() )
				return $_SESSION['usuario']['rol'];
			else
				return null;
		}


		//--------------------- ESTUDIANTE
		public static function isTipoSeleccionado(){
			if( self::isSesionActiva() ){
				if( isset( $_SESSION['estudiante']['tipo'] ) )
					return true;
				else
					return false;
			}
			else
				return false;
		}

		public static function borrarTipo(){
			session_start();
			unset( $_SESSION['estudiante']['tipo'] );
		}


		public static function setTipo($tipo){
			session_start();
			$_SESSION['estudiante']['tipo'] = $tipo;
		}

		public static function getTipo(){
            session_start();
            return $_SESSION['estudiante']['tipo'];
		}

		public static function isAsesor(){
            return ( $_SESSION['estudiante']['tipo'] == "asesor" ) ? true : false;
		}

        public static function isAlumno(){
            return ( $_SESSION['estudiante']['tipo'] == "alumno" ) ? true : false;
		}


	}

 ?>