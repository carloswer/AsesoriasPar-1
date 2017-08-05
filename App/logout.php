<?php 

	require_once 'config.php';
    use Control\Sesiones;

    Sesiones::borrarSesion();
    echo "Espere un momento";
	header("Location: login.php");

 ?>