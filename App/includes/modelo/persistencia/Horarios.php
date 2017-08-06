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

        public function getHorarioId($estudiante, $ciclo){
            $query = "SELECT PK_horario_id as id FROM horario
                      WHERE FK_ciclo = ".$ciclo." AND FK_asesor = ".$estudiante."
                      ORDER BY PK_horario_id desc LIMIT 1";
            //Obteniendo resultados
            return $this->getResultado($query);
        }


        public function getHorarioMaterias($id){
            $query = "SELECT * FROM horario_materia hm 
                      WHERE hm.FK_horario = ".$id;
            //Obteniendo resultados
            return $this->insertarDatos($query);
        }


        public function insertHorario( $idEstudiante, $idCiclo ){
            $query = "INSERT INTO horario(FK_asesor, FK_ciclo) VALUES (".$idEstudiante.", ".$idCiclo.")";
            //Obteniendo resultados
            return $this->insertarDatos($query);
        }

        public function insertHorario_DiasHoras($idHorario, $idDia, $idHora){
            $query = "INSERT INTO dia_hora(FK_horario, FK_dia, FK_hora) VALUES
                      (".$idHorario.", ".$idDia.", ".$idHora.")";
            return $this->insertarDatos($query);
        }

        public function insertHorario_Materias($idHorario, $idMateria){
            $query = "INSERT INTO horario_materia(FK_horario, FK_materia) VALUES
                      (".$idHorario.", ".$idMateria.");";
            return $this->insertarDatos($query);
        }


    }
?>