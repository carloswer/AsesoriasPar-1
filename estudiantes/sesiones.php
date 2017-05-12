<?php 

	//Comprobando session de usuario
	session_start();
	if( !isset( $_SESSION['username'] ) )
		header("Location: ../index.php");

 ?>