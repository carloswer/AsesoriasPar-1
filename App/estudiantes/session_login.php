<?php 

//Comprobando session de usuario
session_start();
if( !isset( $_SESSION['usuario']['username'] ) )
    header("Location: ../index.php");

//Comprobando seleccion de tipo
//if( !isset( $_SESSION['usuario']['tipo'] ) )
//    header("Location: acceso.php");


 ?>