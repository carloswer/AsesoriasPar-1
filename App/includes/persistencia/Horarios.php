<?php namespace Datos;

    use Database\Conexion;

    class Horarios
    {

        /**
         * Horarios constructor.
         */
        public function __construct(){}


        //------------
        // HORAS / DIAS / PERIODO
        //------------

        public function getHoras(){
            $query = "SELECT * FROM hora";
            $con = new Conexion();
            $resultSet = $con->executeQuery($query);
            //Obteniendo resultados
            $result = array();
            while( $row = mysqli_fetch_assoc($resultSet) ){
                $result[] = $row;
            }
            return $result;
        }

        public function getDias(){
            $query = "SELECT * FROM dia";
            $con = new Conexion();
            $resultSet = $con->executeQuery($query);
            //Obteniendo resultados
            $result = array();
            while( $row = mysqli_fetch_assoc($resultSet) ){
                $result[] = $row;
            }
            return $result;
        }


        public function getPeriodoActual(){
            $query = "SELECT PK_periodo_id as 'id_periodo', 
                      periodo_inicio as 'inicio', 
                      periodo_fin as 'fin'
                        FROM  periodo
                        WHERE DATE(NOW()) BETWEEN periodo_inicio AND periodo_fin";
            $con = new Conexion();
            $resultSet = $con->executeQuery($query);
            $result = mysqli_fetch_assoc($resultSet);
            return $result;
        }


        //------------
        // HORARIO DE ASESOR
        //------------


        public function getHorarioAsesor(int $id): array{

        }

        public function getMateriasAsesor(int $id): array{
            
        }


    }
?>