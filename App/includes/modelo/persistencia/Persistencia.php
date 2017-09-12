<?php namespace Modelo\Persistencia;
	
    use Modelo\Database\MySQLConexion;
	use Excepciones\PersistenciaException;

    /**
     * Class Persistencia
     * @package Modelo\Persistencia
     */
    abstract class Persistencia{

        public static $TRANSACTION_NONE = 0;
        /**
         * Para iniciar la transaccion
         * @var int
         */
        public static $TRANSACTION_INIT = 1;

        public static $TRANSACTION_PROGRESS = 2;
        /**
         * Para hacer un commit
         * @var int
         */
        public static $TRANSACTION_COMMIT = 3;
        public static $TRANSACTION_ROLLBACK = 4;


        public static $con = null;
        public static $transactionON = false;
        public static $connectionState = false;


        /**
         * @param String $query Query a ejecutar
         * @param int $transAction Valor número que indica el uso de transacciones, se pueden utilizar
         * valores variables estaticas de la clase como:
         * @see Persistencia::$TRANSACTION_NONE utilizado como valor por defecto para ninguna accion
         * @see Persistencia::$TRANSACTION_INIT para inicializar una transaccion, esto permitira realizar consultas
         * continuas sin cerrar la conexion, sin embargo para ello se necesitará usar el parametro Progress para que
         * las consultas posteriores se ejecuten como parte de la transaccion, si se omite se hará el commit y
         * se creará una nueva conexion. Si la transaccion ya se inicializo antes y sigue abierta, esta no hará nada.
         * @see Persistencia::$TRANSACTION_PROGRESS Una vez inicializada la transaccion este parametro
         * permite ejecutar valores dentro de la misma, si se omite este parametro, se inicará una nueva conexión
         * @see Persistencia::$TRANSACTION_COMMIT Permite que las consultas realizadas se guarden en la base de datos
         *
         * @return array|bool|null
         * TRUE al realizarse una operación correcta de consultas como INSERT, UPDATE o DELETE
         * FALSE al ocurrir algun error
         * Array cuando se hace una consulta de tipo SELECT y se encuentran valores
         * NULL al no encontrarse valores en una consulta SELECT (array vacio)
         */
	    public static function executeQuery(String $query){

	        //Si no se ha creado una conexion se crea una nueva conexion
            if( !self::isConnectionON() )
                self::newConnection();

            //Ejecución del query
            $result = self::$con->doQuery($query);
            $response = null;

            //------------------------- ERRROR
            if( $result === false )
                $response = false;
            //------------------------- TRUE
            //ejecucion correcta (INSERT, UPDATE o DELETE)
            else if( $result === true )
                $response = true;


            //------------------------- ARRAY (ResultSet = MySQL_Object)
            //Para los valores diferentes a DML (distintas de INSERT, UPDATE o DELETE)
            //Cuando es un SELECT siempre regresa un Array
            else{
                $datos = array();
                while( $dato = mysqli_fetch_assoc( $result ) ){
                    $datos[] = $dato;
                }
                //--------------- NULL (ARRAY VACIO)
                if( count($result) == 0 )
                    $response = null;
                else {
                    //Si hay datos, regresa el array
                    $response = $datos;
                }
            }

            //Si no hay transaccion activa, se cierra conexion
            if( !self::isTransactionON() ){
                if( self::isConnectionON() )
                    self::closeConnection();
            }


            //Regresa resultado
            return $response;

        }



        //----------------
        //  CONEXION
        //----------------
        protected static function newConnection(){
            self::$con = new MySQLConexion();
            self::$connectionState = true;
        }

        protected static function closeConnection(){
            self::$con->closeConnection();
            self::$connectionState = false;
        }

        protected static function isConnectionON(){
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
                self::$con->doCommit();
                //Se cambian los estados
                self::$transactionON = self::$TRANSACTION_NONE;
                self::closeConnection();
            }
        }

        public static function rollbackTransaction(){

            if( self::$transactionON ){
                //Se realiza el rollback
                self::$con->doRollback();
                //Se cambian los estados
                self::$transactionON = self::$TRANSACTION_NONE;
                self::closeConnection();
            }
        }

        protected static function isTransactionON(){
            return self::$transactionON;
        }


        protected static function getTransactionState(){
            return self::$transactionON;
        }





        //----------------
        //  EXTRAS
        //----------------

        /**
         * @param String $data Valor a cifrar
         * @return string Regresa un String cigrafo con md5
         */
	    protected static function encript(String $data){
	        return md5($data);
	    }


	}

 ?>