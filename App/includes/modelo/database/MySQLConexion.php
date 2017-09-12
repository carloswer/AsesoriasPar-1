<?php namespace Modelo\Database;

    use Exception;
use mysqli;

    class MySQLConexion {

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


        /**
         * @param $query String a ejecutar
         * @return bool|\mysqli_result Regresa un mysqli_result en caso de ser una consulta exitosa
         * de un SELECT, TRUE cuando es diferente de un SELECT exitoso y FALSE al ocurrir un error.
         */
        public function doQuery($query){
            $result = $this->_connection->query($query);
            return $result;
        }

        public function getError(){
            return $this->_connection->error;
        }

        public function closeConnection(){
        }


        //----------TRANSACCIONES
        public function iniTransaction(){
            $this->_connection->autocommit( false );
        }

        public function doCommit(){
            try{
                $this->_connection->commit();
            }catch(Exception $ex){
                //TODO: retornar valor para control
                $this->doRollback();
                echo 'algo fallo: ',  $ex->getMessage(), "\n";
            }
        }

        public function doRollback(){
            $this->_connection->rollback();
        }


//        public function ejecutarTransaccion(array $queries){
//            //para que el registro sea manual
//            $this->_connection->autocommit( false );
//            try{
//                //Registros uno a uno
//                foreach( $queries as $query ){
//                    $this->_connection->query($query);
//                }
//                //Para registrar cambios
//                $this->_connection->commit();
//            }catch( Exception $ex ){
//                $this->_connection->rollback();
//                echo 'algo fallo: ',  $ex->getMessage(), "\n";
//            }
//           $this->_connection->query($query);
//        }




    }

?>
