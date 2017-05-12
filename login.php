<?php 

	require_once "config.php";

	use Datos\Generico;
    $generico = new Generico();


    //Verifico datos
	if( !isset( $_POST['user'] ) || !isset( $_POST['pass'] ) ){
		echo "Faltan datos";
		exit();
	}
	
	//Se obtienen los datos
	$user = $_POST['user'];
	$pass = $_POST['pass'];


    $result = $generico->query("
	    	SELECT u.PK_usu_id, u.usu_username, r.PK_rol_id as rol_id, r.rol_nombre as rol FROM usuario u 
	    	INNER JOIN rol r ON r.PK_rol_id = u.FK_rol
	    	WHERE usu_username = '".$user."'
	    	AND usu_password = md5('".$pass."');
    	");


	if( count( $result ) == 1 ){
		$user = $result[0];

		$id = $user['PK_usu_id'];
		$username = $user['usu_username'];
		$rol = $user['rol_id'];

		//Inicia una nueva session
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $username;
		$_SESSION['rol'] = $rol;

		//Si es administrador
		if( $rol == 1 )
			header('Location: administrador/');
		//Si es estudiante
		else if( $rol == 2 )
			header('Location: estudiantes/');
	}
	else{
		echo "No existe usuario";
	}


	

?>