<?php namespace Datos;

	use Database\Conexion;

	class Generico{

		public function __construct(){}

		public function query(String $query): array{
			$resultados = array();
			//Obtiene conexion
			$con = Conexion::getInstance()->getConnection();
			//Se ejecuta querie
			$result = $con->query($query);
			//$con->close(); Esta dando problemas, hay que crear conexiones nuevas

			//Recorre lista y agrega resultados
			while( $row = mysqli_fetch_assoc($result) ){
				$resultados[] = $row;
			}

			return $resultados;
	
		}

	}
	
 ?>