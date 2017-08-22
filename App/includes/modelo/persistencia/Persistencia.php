<?php namespace Modelo\Persistencia;
	
	use Modelo\Database\Conexion;
	use Excepciones\PersistenciaException;

	abstract class Persistencia{


        /**
         * Referencia: http://php.net/manual/es/mysqli.query.php
         * @param $query String texto correspondiente al query de la base de datos
         * @return array|bool
         * true = Cuando se ejecuto correctamente sin resultados,
         * false = ocurrio un error,
         * Array = los resultados esperados
         */
	    protected function ejecutarQuery($query){
	        $con = new Conexion();
	        $resultado = $con->doQuery($query);

	        //Si ocurrio un error
            if( $resultado === false ){
                if( DEBUG == 1 ) {
                    //throw new PersistenciaException("Ocurrio un error en la ejecución del Query", $con->getError());
                    echo "Ocurrio un error en la base de datos: \n" . $con->getError() . "\n";
                    echo "Query usado: " . $query;
                }
                $con->cerrarConexion();
                return 'error';
            }
            //ejecucion correcta (INSERT, UPDATE o DELETE)
            else if( $resultado === true ){
                $con->cerrarConexion();
                return true;
            }
            //Para los valores diferentes a DML (distintas de INSERT, UPDATE o DELETE)
            else{
                $datos = array();
                while( $dato = mysqli_fetch_assoc( $resultado ) ){
                    $datos[] = $dato;
                }
                $con->cerrarConexion();
                if( count( $datos ) == 0 )
                    return null;
                else
                    return $datos;
            }

        }

	    /**
	     * Método que sirve para encriptar un dato y regresa el valor
	     */
	    protected function cifrar($data){
	    	return md5($data);
	    }


	}

 ?>