<?php namespace Modelo\Database;

    use mysqli;

    class Conexion {

        private $host  = "localhost";
        private $user  = "asesoriaspar_itson";
        private $pass  = "asesorias_pass";
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
            if( mysqli_connect_error() ) {
                trigger_error("Error al tratar de conectar con MySQL: " . mysqli_connect_error(),
                    E_USER_ERROR);
            }

            /* cambiar el conjunto de caracteres a utf8 para aceptar tildes y 'eñes' */
            if ( !$this->_connection->set_charset('utf8') ) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $this->_connection->error);
            }
        }



        public function doQuery($query){
            $result = $this->_connection->query($query);
            return $result;
        }

        public function getError(){
            return $this->_connection->error;
        }

        public function cerrarConexion(){
            $this->_connection->close();
        }

/*
        public function ejecutarTransaccion(array $queries){
            //para que el registro sea manual
            $this->_connection->autocommit( false );
            try{
                //Registros uno a uno
                foreach( $queries as $query ){
                    $this->_connection->query($query);
                }
                //Para registrar cambios
                $this->_connection->commit();
            }catch( Exception $ex ){
                $this->_connection->rollback();
                echo 'algo fallo: ',  $ex->getMessage(), "\n";
            }



//            $this->_connection->query($query);
        }

        public function ejecutarQuery(String $query){
            $result = $this->_connection->query($query);
            $this->cerrarConexion();
            return $result;
        }

        public function getError(){
            return mysqli_error( $this->_connection );
        }

        private function cerrarConexion(){
            $this->_connection->close();
        }

*/

    }

?>
