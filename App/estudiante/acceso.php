<?php

    require_once '../config.php';
    $tituloPagina = "Inicio | Asesor";
    // SESIONES
    use Control\Sesiones;

	//---- Determinacion del tipo por GET
	if( isset( $_GET['tipo'] ) ){
		$tipo = $_GET['tipo'];
		if( $tipo == "alumno" || $tipo == "asesor" ){
			Sesiones::setTipo($tipo);
			header("Location: index.php");
		}
	}




	//sesion activa
	if( Sesiones::isSesionActiva() ){
		//---Rol
		//Administrador
		if( Sesiones::isAdministrador() )
			header("Location: ".ADMIN_REF);
		//Estudiante
//		else{
//			//Tipo de estudiante
//			if( Sesiones::isTipoSeleccionado() )
//				header("Location: ".EST_REF);
//		}
	}
	else
		header("Location: ".ROOT_REF."/login.php");




?>

<?php include_once TEMP_PATH."/header.php"; ?>

	<!--MENU-->
	<div class="container">
<!--        --><?php //include_once TEMP_PATH."/estudiante-menu.php"; ?>

		<h1>Seleccione una opción:</h1>
		<h4>Esta página se muestra ya que no ha decidido como acceder al sistema</h4>
		<a href="acceso.php?tipo=alumno" type="button" class="btn btn-primary">Alumno</a>
		<a href="acceso.php?tipo=asesor" type="button" class="btn btn-success">Asesor</a>

		<a href="<?= ROOT_REF; ?>/logout.php" type="button" class="btn btn-default">Cerrar Session</a>
	</div>

<?php include_once TEMP_PATH."/footer.php"; ?>

