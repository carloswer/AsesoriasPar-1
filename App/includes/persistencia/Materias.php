<?php namespace Datos;

    use Database\Conexion;

    class Materias{

        public function __construct(){}


        //--------------------------------
        // MÉTODOS SELECT
        //--------------------------------
        /**
         * Metodo que regresa todas las materias registradas
         * @return array de resultados
         */
        public function getMaterias(): array{
            $query = "SELECT * FROM materia";
            $con = new Conexion();
            $resultSet = $con->executeQuery($query);
            //Obteniendo resultados
            $result = array();
            while( $row = mysqli_fetch_assoc($resultSet) ){
                $result[] = $row;
            }
            return $result;
        }


        public function getMateriasNombre( String $nombre ): array{
            $query = "SELECT * FROM materia WHERE PK_mat_id LIKE %".$nombre."%";
            $con = new Conexion();
            $resultSet = $con->executeQuery($query);
            //Obteniendo resultados
            $result = array();
            while( $row = mysqli_fetch_assoc($resultSet) ){
                $result[] = $row;
            }
            return $result;
        }


        public function getMateriaId( int $id ): array{
            $query = "SELECT * FROM materia WHERE PK_mat_id = ".$id;
            $con = new Conexion();
            $resultSet = $con->executeQuery($query);
            //Obteniendo resultados
            $result = mysqli_fetch_assoc($resultSet);
            return $result;
        }

        public function getMateriasSimilares( int $id ): array{
            $query = "";
            $con = new Conexion();
            $resultSet = $con->executeQuery($query);
            //Obteniendo resultados
            $result = array();
            while( $row = mysqli_fetch_assoc($resultSet) ){
                $result[] = $row;
            }
            return $result;
        }


        //--------------------------------
        // MÉTODOS INSERT
        //--------------------------------


    }

?>