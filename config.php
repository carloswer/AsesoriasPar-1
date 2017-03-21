<?php

    //Configuracion para UTF-8
    header('Content-Type: text/html; charset=UTF-8');

    //------------------
    //  DEBUG
    //  0 = Desactivar
    //  1 = Activar
    //------------------
    DEFINE("DEBUG", 0);

    if( !DEBUG )
        error_reporting(0);


    //------------------
    //  VARIABLES Y CONSTANTES
    //------------------
    $tituloPagina = "AsesoriasPar | Default";


    //----------------  Directorios
    define("DS", DIRECTORY_SEPARATOR);
    define('ROOT_PATH', __DIR__ );
    define("INC_PATH", ROOT_PATH . DS . "includes");

//    define('TEMP_PATH', ROOT_PATH . "/includes/Template");
    //Negocio
//    define('OBJ_PATH',  ROOT_PATH . "/includes/Negocio/objetos");
//    define('CTRL_PATH', ROOT_PATH . "/includes/Negocio/controles");
    //Datos
//    define('DATOS_PATH', ROOT_PATH . "/includes/Datos");


    //variable for href and src
    // DEFINE('ROOT', "");
//    DEFINE('ROOT', 			"/asesoriaspar");
//    DEFINE('IMG_PATH', 		ROOT . "/src/img");
//    DEFINE('JS_PATH', 		ROOT . "/src/js");
//    DEFINE('CSS_PATH', 		ROOT . "/src/stylesheet");


    //------------------
    //  INCLUDES Y REQUIRES
    //------------------
    include_once INC_PATH . DS . "autoload.php";


?>