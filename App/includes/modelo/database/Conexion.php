<?php namespace Modelo\Database;

    use mysqli;

    class Conexion {

        private $host  = "localhost";
        private $user  = "root";
        private $pass  = "";
        private $db    = "asesoriaspar";
        private $_connection;

        /**
         * Constructor que instancia una nueva conexión a la base de persistencia
         */
        public function __construct() {

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

            /* cambiar el conjunto de caracteres a utf8 para aceptar tildes y 'eñes' */
            if ( !$this->_connection->set_charset('utf8') ) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $this->_connection->error);
            }
        }


        public function ejecutarQuery(String $query){
            $result = $this->_connection->query($query);
            $this->cerrarConexion();
            return $result;
        }

        private function cerrarConexion(){
            $this->_connection->close();
        }

    }

?>
