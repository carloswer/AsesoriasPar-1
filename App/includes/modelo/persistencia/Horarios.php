<?php namespace Modelo\Persistencia;

    class Horarios extends Persistencia{

        public function __construct(){}


        //------------
        // HORAS / DIAS / PERIODO
        //------------

        public function getHoras(){
            $query = "SELECT PK_hora_id as 'id', hora 
                FROM hora order by PK_hora_id";
            
            //Obteniendo resultados
            return $this->getResultado($query);
        }

        public function getDias(){
            $query = "SELECT PK_dia_id as 'id', dia_nombre as 'dia' 
                FROM dia order by id";
            
            //Obteniendo resultados
            return $this->getResultado($query);
        }


        public function getCicloActual(){
            $query = "SELECT PK_ciclo_id,
                      ciclo_inicio, 
                      ciclo_fin
                        FROM  ciclo
                        WHERE DATE(NOW()) BETWEEN ciclo_inicio AND ciclo_fin";
            
            //Obteniendo resultados
            return $this->getResultado($query);
        }


        //------------
        // HORARIO DE ASESOR
        //------------


        public function getHorarioAsesor($idEstudiante, $idCiclo ){
            $query = "SELECT dh.FK_hora as 'hora', dh.FK_dia as 'dia'
                 FROM dia_hora dh
                 INNER JOIN horario h ON h.PK_horario_id = dh.FK_horario
                 WHERE h.FK_asesor = '".$idEstudiante."' AND h.FK_ciclo = '".$idCiclo."'";
            
            //Obteniendo resultados
            return $this->getResultado($query);
        }

        public function getMateriasAsesor($id){
            
            // //Obteniendo resultados
            // return $this->getResultado($query);
        }


    }
?>