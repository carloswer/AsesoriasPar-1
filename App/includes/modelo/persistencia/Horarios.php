<?php namespace Modelo\Persistencia;

    class Horarios extends Persistencia{

        public function __construct(){}


        //------------
        // HORAS / DIAS / PERIODO
        //------------

        public function getDays(){
            $query = "SELECT DISTINCT dia FROM dia_hora";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }

        public function getHoursAndDays_OrderByHours(){
            $query = "SELECT 
                        PK_id as 'id',
                        dia as 'dia',
                        TIME_FORMAT(hora, '%H:%i') as 'hora' 
                        FROM dia_hora
                      ORDER BY hora, PK_id";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }


        public function getCurrentCycle(){
            $query = "SELECT 
                        PK_id as 'id',
                        fecha_inicio as 'inicio', 
                        fecha_fin as 'fin'
                      FROM  ciclo
                      WHERE DATE(NOW()) BETWEEN fecha_inicio AND fecha_fin";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }


        //------------
        // HORARIO DE ASESOR
        //------------

        public function getScheduleId_ByStudentId(int $idEstudiante, int $idCiclo){
            $query = "SELECT 
                        PK_id as 'id'
                        fecha_registro as 'fecha',
                        validado as 'validado',
                        estado as 'estado'
                      FROM horario h
                      WHERE h.FK_ciclo = ".$idCiclo." AND h.FK_estudiante = ".$idEstudiante."
                      ORDER BY PK_id DESC LIMIT 1";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }

        public function getScheduleHours_ByScheduleId(int $scheduleid ){
            $query = "SELECT 
                            dh.PK_id as 'id',
                            dh.hora as 'hora',
                            dh.dia as 'dia'
                        FROM horario_dia_hora hdh
                        INNER JOIN dia_hora dh ON dh.PK_id = hdh.FK_dia_hora
                        WHERE hdh.FK_horario = ".$scheduleid."
                        ORDER BY dh.hora, dh.PK_id";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }

        public function insertStudentSchedule($idStudent, $hours, $subjects){
            $cycleResult = $this->getCurrentCycle();
            if( is_array($cycleResult) )
                return $cycleResult;
            else{

            }
        }


//        //TODO: utilizar una transaccion
//        public function insertHorario( $idEstudiante, $idCiclo ){
//            $query = "INSERT INTO horario(FK_estudiante, FK_ciclo)
//                      VALUES (".$idEstudiante.", ".$idCiclo.")";
//            //Obteniendo resultados
//            return $this->executeQuery($query);
//        }
//
//        //TODO: utilizar una transaccion
//        public function insertHorario_DiasHoras($IdHorario, $IdHora){
//            $query = "INSERT INTO horario_dia_hora(FK_horario, FK_dia_hora) VALUES
//                      (".$IdHorario.", ".$IdHora.")";
//            return $this->executeQuery($query);
//        }
//
//        //TODO: utilizar una transaccion
//        //TODO: mover a materias
//        public function insertHorario_Materias($idHorario, $idMateria){
//            $query = "INSERT INTO horario_materia(FK_horario, FK_materia) VALUES
//                      (".$idHorario.", ".$idMateria.");";
//            return $this->executeQuery($query);
//        }




    }
?>