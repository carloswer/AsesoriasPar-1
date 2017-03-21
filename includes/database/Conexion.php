<?php namespace Database;

    use mysqli;

    class Conexion {

        private $_connection;
        private static $instance; //The single instance

        private $host  = "localhost";
        private $user  = "root";
        private $pass  = "";
        private $db    = "asesoriaspar";

        // Constructor
        private function __construct() {

            //Datos de conexion
            $this->_connection = new mysqli(
                $this->host,
                $this->user,
                $this->pass,
                $this->db
            );

             //Manejo de error
            if(mysqli_connect_error()) {
                trigger_error("Error al tratar de conectar con MySQL: " . mysql_connect_error(),
                    E_USER_ERROR);
            }

            /* cambiar el conjunto de caracteres a utf8 */
            if ( !$this->_connection->set_charset('utf8') ) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $this->_connection->error);
//                exit();
            }
        }


        /**
         * Crea instancia de si misma y la regresa
         * @return Conexion objeto de conexion MySQli
         */
        public static function getInstance() {
            if(!self::$instance) { // If no instance then make one
                self::$instance = new self();
            }
            return self::$instance;
        }

        // Método magico vacio que previene la duplicacion de la conexion
        private function __clone() { }

        // Regresa instancia
        public function getConnection() {
            return $this->_connection;
        }
    }

?>
