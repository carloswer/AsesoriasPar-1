<?php namespace Modelo\Persistencia;
	
    use Modelo\Database\MySQLConexion;
	use Excepciones\PersistenciaException;


    abstract class Persistencia{

        private static $TRANSACTION_NONE = 0;
        private static $TRANSACTION_INIT = 1;
        private static $TRANSACTION_PROGRESS = 2;
        private static $TRANSACTION_COMMIT = 3;
        private static $TRANSACTION_ROLLBACK = 4;


        /**
         * @var MySQLConexion variable de conexion inicialmente en null
         */
        private static $mysql = null;
        private static $transactionON = false;
        private static $connectionState = false;


        /**
         * Método que permite la ejecución de un Query de MySQL
         * @return array|bool|null
         * TRUE al realizarse una operación correcta de consultas como INSERT, UPDATE o DELETE
         * FALSE al ocurrir algun error
         * Array cuando se hace una consulta de tipo SELECT y se encuentran valores
         * NULL al no encontrarse valores en una consulta SELECT (array vacio)
         */
	    protected static function executeQuery(String $query){

	        //Si no se ha creado una conexion se crea una nueva conexion
            if( !self::isConnectionON() )
                self::newConnection();

            //Ejecución del query
            $result = self::$mysql->doQuery($query);

            // FALSE en caso de fallo,
            // TRUE en caso de exito (INSERT, UPDATE o DELETE)
            // Array en caso de resultados obtenidos (SELECT) (No FALSE ni TRUE)
            // Null en caso de no haber resultados
            if( $result != true && $result !=  true ){
                $datos = array();
                //Obtiene cada uno de los datos y los almacena en array
                while( $dato = mysqli_fetch_assoc( $result ) ){
                    $datos[] = $dato;
                }
                //Array vacio
                if( empty($datos) )
                    $result = null;
                //Si hay datos, regresa el array
                else {
                    $result = $datos;
                }
            }

            //Verifica transaccion y conexion antes de cerrar
            //Si no hay transaccion activa, se cierra conexion
            if( !self::isTransactionON() ){
                if( self::isConnectionON() )
                    self::closeConnection();
            }

            //Regresa resultado
            return $result;

        }



        //----------------
        //  CONEXION
        //----------------
        /**
         *
         */
        public static function newConnection(){
            self::$mysql = new MySQLConexion();
            self::$connectionState = true;
        }

        public static function closeConnection(){
            self::$mysql->closeConnection();
            self::$connectionState = false;
        }

        public static function isConnectionON(){
            if( self::$connectionState == true )
                return true;
            else
                return false;
        }

        //----------------
        //  TRANSACCIONES
        //----------------

        public static function initTransaction(){
            if( !self::isConnectionON() )
                self::newConnection();

            self::$transactionON = self::$TRANSACTION_INIT;
        }


        public static function commitTransaction(){

            if( self::isTransactionON() ){
                //Se realiza el commit
                self::$mysql->doCommit();
                //Se cambian los estados
                self::$transactionON = self::$TRANSACTION_NONE;
                self::closeConnection();
            }
        }

        public static function rollbackTransaction(){

            if( self::$transactionON ){
                //Se realiza el rollback
                self::$mysql->doRollback();
                //Se cambian los estados
                self::$transactionON = self::$TRANSACTION_NONE;
                self::closeConnection();
            }
        }

        public static function isTransactionON(){
            return self::$transactionON;
        }


        public static function getTransactionState(){
            return self::$transactionON;
        }





        //----------------
        //  EXTRAS
        //----------------

        /**
         * @param String $data Valor a cifrar
         * @return string Regresa un String cigrafo con md5
         */
	    public static function encrypt(String $data){
	        return md5($data);
	    }


	}

 ?>