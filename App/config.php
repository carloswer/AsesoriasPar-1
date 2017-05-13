<?php

    //Configuracion para UTF-8
    header('Content-Type: text/html; charset=UTF-8');

    //------------------
    //  DEBUG
    //  0 = Desactivar
    //  1 = Activar
    //------------------
    DEFINE("DEBUG", 0);

    // if( !DEBUG )
        error_reporting(1);


    //------------------
    //  VARIABLES Y CONSTANTES
    //------------------
    $tituloPagina = "Default";


    //----------------  Directorios
    define("DS", DIRECTORY_SEPARATOR);
    define('ROOT_PATH', __DIR__ );
    define("INC_PATH", ROOT_PATH . DS . "includes");
    define("TEMP_PATH", INC_PATH . DS . "template");

    
    //------------------
    //  INCLUDES Y REQUIRES
    //------------------
    include_once INC_PATH . DS . "autoload.php";
    include_once ROOT_PATH . DS . "generico.php";



    //------------variable para HREF and SRC de HTML
    // DEFINE('ROOT', "");
    DEFINE('ROOT',          "/www/asesoriaspar/App");
    DEFINE('ASSETS',          ROOT . "/assets");
    DEFINE('IMG_PATH',      ASSETS . "/img");
    DEFINE('JS_PATH',       ASSETS . "/js");
    DEFINE('CSS_PATH',      ASSETS . "/stylesheet");



?>