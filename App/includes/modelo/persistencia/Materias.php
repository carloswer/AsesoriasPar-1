<?php namespace Modelo\Persistencia;


    class Materias extends Persistencia{


        public function __construct(){}


        public function getMaterias(){
            $query = "SELECT * FROM materia";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }

        public function getMaterias_Carrera( $carrera ){
            $query = "SELECT 
                        m.PK_id as 'id',
                        m.nombre,
                        m.abreviacion,
                        m.descripcion,
                        m.semestre,
                        m.plan,
                        c.PK_id as 'carrera_id',
                        c.nombre as 'carrera_nombre'
                    FROM materia m 
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                    WHERE (c.nombre = '".$carrera."' OR c.abreviacion = '".$carrera."') 
                    ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }

        public function getMaterias_Horario( $horarioID ){
            $query = "SELECT 
                        m.PK_id as 'id',
                        m.nombre,
                        m.abreviacion,
                        m.descripcion,
                        m.semestre,
                        m.plan,
                        c.PK_id as 'carrera_id',
                        c.nombre as 'carrera_nombre'
                    FROM materia m 
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                    INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_id
                    WHERE hm.FK_horario = ".$horarioID."
                    ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }

        public function getMateriasConAsesores( $ciclo ){
            $query = "SELECT DISTINCT
                       m.PK_id as 'id',
                       m.nombre,
                       m.abreviacion,
                       m.descripcion,
                       m.semestre,
                       m.plan,
                       c.PK_id as 'carrera_id',
                       c.nombre as 'carrera_nombre',
                       c.abreviacion as 'carrera_abreviacion'
                    FROM materia m 
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                    INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_id
                    ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }

    }

?>