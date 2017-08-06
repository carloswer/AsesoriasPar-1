<?php namespace Modelo\Persistencia;
	
	use Modelo\Database\Conexion;

	abstract class Persistencia{


		/**
	     * Método que se encarga de crear un array con los resultados de la ejecución
	     * del query
	     * @param  [type] $resultado Array de la ejecución del query
	     * @return [type] array con cada elemento
	     */
	    protected function getResultado($query){
	    	$con = new Conexion();
	        $resultSet = $con->ejecutarQuery($query);
	        //Obteniendo resultados
	        $result = array();
	        while( $row = mysqli_fetch_assoc($resultSet) ){
	            $result[] = $row;
	        }
	        return $result;
	    }

        protected function insertarDatos($query){
            $con = new Conexion();
            $result = $con->ejecutarQuery($query);
            return $result;
        }

	    /**
	     * Método que sirve para encriptar un dato y regresa el valor
	     */
	    protected function cifrar($data){
	    	return md5($data);
	    }
	


	}

 ?>