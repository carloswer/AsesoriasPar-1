<?php

    //Configuracion para UTF-8
    // header('Content-Type: text/html; charset=UTF-8');

    //------------------
    //  DEBUG
    //  0 = Desactivar
    //  1 = Warning / Errors
    //  2 = Errors / Warning / Notices
    //  3 = Errors / Warning / Notices and autoload debug
    //------------------
    DEFINE("DEBUG", 1);

    if( DEBUG == 1 )
        error_reporting(0);
    else if( DEBUG == 1 )
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
    else if( DEBUG >= 2 )
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);



    //------------------
    //  VARIABLES Y CONSTANTES
    //------------------
    $tituloPagina = "Default";


    //----------------  Directorios
    define("DS", DIRECTORY_SEPARATOR);
    define('ROOT_PATH', __DIR__ );
    define("INC_PATH",  ROOT_PATH . DS . "includes");
    define("TEMP_PATH", INC_PATH . DS . "template");
    DEFINE('EST_PATH',  ROOT_PATH . DS . "estudiantes");

    
    //------------------
    //  INCLUDES Y REQUIRES
    //------------------
    include_once INC_PATH . DS . "autoload.php";



    //------------variable para HREF and SRC de HTML
    // DEFINE('ROOT_REF', "");
    DEFINE('ROOT_REF',          "/www/asesoriaspar/app");
    // Assets
    DEFINE('ASSETS_REF',    ROOT_REF .   "/assets");
    DEFINE('MEDIA_REF',     ASSETS_REF . "/media");
    DEFINE('JS_REF',        ASSETS_REF . "/js");
    DEFINE('CSS_REF',       ASSETS_REF . "/stylesheet");
    DEFINE('LIBS_REF',      ASSETS_REF.  "/libs");
    //Directorios
    DEFINE('ADMIN_REF',    ROOT_REF.  "/administrador");
    DEFINE('EST_REF',      ROOT_REF.  "/estudiante");
    



?>