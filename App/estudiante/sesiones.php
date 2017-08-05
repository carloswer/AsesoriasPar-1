<?php 

	// SESIONES
	use Control\Sesiones;

	//sesion activa
	if( Sesiones::isSesionActiva() ){
		//---Rol
		//Administrador
		if( Sesiones::isAdministrador() )
			header("Location: ".ADMIN_REF);
		//Estudiante
		else{
			//Tipo de estudiante
			if( !Sesiones::isTipoSeleccionado() )
				header("Location: ".EST_REF."/acceso.php");
		}
	}
	else
		header("Location: ".ROOT_REF."/login.php");

 ?>