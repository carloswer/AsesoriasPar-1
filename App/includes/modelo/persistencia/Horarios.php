<?php namespace Modelo\Persistencia;

    class Horarios extends Persistencia{

        public function __construct(){}


        //------------
        // HORAS / DIAS / PERIODO
        //------------

        public function getDiasHoras(){
            $query = "SELECT 
                        PK_id as 'id',
                        dia as 'dia',
                        hora as 'hora'  
                      FROM dia_hora";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }

        public function getDias(){
            $query = "SELECT DISTINCT dia FROM dia_hora;";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }

        public function getHoras(){
            $query = "SELECT 
                        PK_id as 'id', 
                        hora as 'hora' 
                        FROM dia_hora";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }



        public function getCicloActual(){
            $query = "SELECT 
                        PK_id as 'id',
                        fecha_inicio as 'inicio', 
                        fecha_fin as 'fin'
                      FROM  ciclo
                      WHERE DATE(NOW()) BETWEEN fecha_inicio AND fecha_fin";
            
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }


        //------------
        // HORARIO DE ASESOR
        //------------


        public function getHorarioAsesor_horas($idEstudiante, $idCiclo ){
            $query = "SELECT dh.FK_hora as 'hora', dh.FK_dia as 'dia'
                 FROM dia_hora dh
                 INNER JOIN horario h ON h.PK_horario_id = dh.FK_horario
                 WHERE h.FK_estudiante = '".$idEstudiante."' AND h.FK_ciclo = '".$idCiclo."'";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }

        public function getHorarioId($idEstudiante, $idCiclo){
            $query = "SELECT PK_id as 'id' FROM horario h
                      WHERE h.FK_ciclo = ".$idEstudiante." AND h.FK_estudiante = ".$idCiclo;
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }


        //TODO: utilizar una transaccion
        public function insertHorario( $idEstudiante, $idCiclo ){
            $query = "INSERT INTO horario(FK_estudiante, FK_ciclo) VALUES (".$idEstudiante.", ".$idCiclo.")";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }

        //TODO: utilizar una transaccion
        public function insertHorario_DiasHoras($idHorario, $idDia, $idHora){
            $query = "INSERT INTO dia_hora(FK_horario, FK_dia, FK_hora) VALUES
                      (".$idHorario.", ".$idDia.", ".$idHora.")";
            return $this->ejecutarQuery($query);
        }

        //TODO: utilizar una transaccion
        //TODO: mover a materias
        public function insertHorario_Materias($idHorario, $idMateria){
            $query = "INSERT INTO horario_materia(FK_horario, FK_materia) VALUES
                      (".$idHorario.", ".$idMateria.");";
            return $this->ejecutarQuery($query);
        }

        //TODO: mover a materias
        public function getHorarioMaterias($id){
            $query = "SELECT m.PK_mat_id, m.mat_nombre, m.mat_semestre, m.mat_abreviacion, m.mat_abreviacion,
                        m.mat_descripcion, m.mat_plan, m.FK_carrera
                    FROM materia m
                    INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_mat_id
                    WHERE hm.FK_horario = ".$id;
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }


    }
?>