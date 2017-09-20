<?php namespace Control;

    use Modelo\Persistencia\Materias;
    use Objetos\Materia;

    class ControlMaterias{

        private $perSubjects;

        public function __construct(){
            $this->perSubjects = new Materias();
        }

        private function makeObject_Subject($mat){
            // Crea objeto
            $materia = new Materia();
            $materia->setId($mat['id']);
            $materia->setName($mat['name']);
            $materia->setShortName($mat['short_name']);
            $materia->setDescripcion($mat['description']);
            $materia->setSchoolPlan($mat['plan']);
            $materia->setSemester($mat['semester']);

            $conCareers = new ControlCarreras();
            $career = $conCareers->getCareer_ById( $mat['career_id'] );
            $materia->setCareer( $career );
            //Se regresa
            return $materia;
        }


        public function getSubjects(){
            $result = $this->perSubjects->getSubjects();
            if( $result === false )
                return 'error';
            else if( $result === null )
                return null;
            else{
                $arrayMaterias = array();
                foreach( $result as $mat ) {
                    //Se agrega al array
                    $arrayMaterias[] = $this->makeObject_Subject($mat);
                }
                return $arrayMaterias;
            }
        }


        /**
         * @param $subject_id
         */
        public function getSubject_ById( $subject_id ){
            $result = $this->perSubjects->getSubjects_ById( $subject_id );
            if( $result === false )
                return 'error';
            else if( $result === null )
                return null;
            else
                return $arrayMaterias[] = $this->makeObject_Subject($result[0]);
        }

        /**
         * @param $id
         * @return array|bool|null
         */
        public function getScheduleSubjects_ByScheduleId($id ) {
            $result = $this->perSubjects->getSubjects_ByScheduleId( $id );
            if( $result === false )
                return 'error';
            else if( $result === null )
                return null;
            else{
                $arrayMaterias = array();
                foreach( $result as $mat ) {
                    //Se agrega al array
                    $arrayMaterias[] = $this->makeObject_Subject($mat);
                }
                return $arrayMaterias;
            }
        }

        /**
         * @param $career
         * @return array|bool|null
         */
        public function getSubject_ByCarrerId( $career ){
            $result = $this->perSubjects->getSubjecs_ByCareerId( $career );
            if( $result === false )
                return 'error';
            else if( $result === null )
                return null;
            else{
                $arrayMaterias = array();
                foreach( $result as $mat ) {
                    //Se agrega al array
                    $arrayMaterias[] = $this->makeObject_Subject($mat);
                }
                return $arrayMaterias;
            }
        }

        /**
         * @param $career
         * @return array|bool|null
         */
        public function getSubject_ByCarrerName( $career ){
            $result = $this->perSubjects->getSubjecs_ByCareerName( $career );
            if( $result === false )
                return 'error';
            else if( $result === null )
                return null;
            else{
                $arrayMaterias = array();
                foreach( $result as $mat ) {
                    //Se agrega al array
                    $arrayMaterias[] = $this->makeObject_Subject($mat);
                }
                return $arrayMaterias;
            }
        }


        //-----------------
        // ASESORIAS
        //-----------------

        /**
         * @param $idStudent
         */
        public function getCurrAvailScheduleSubs_SkipSutdent( $idStudent ){
            $conSchedule = new ControlHorarios();
            $cycle = $conSchedule->getCurrentCycle();
            if( !is_array($cycle) )
                return $cycle;
            else{
                $result = $this->perSubjects->getAvailScheduleSubs_SkipSutdent( $idStudent, $cycle['id'] );
                if( $result === false )
                    return 'error';
                else if( $result === null )
                    return null;
                else{
                    $arrayMaterias = array();
                    foreach( $result as $mat ) {
                        //Se agrega al array
                        $arrayMaterias[] = $this->makeObject_Subject($mat);
                    }
                    return $arrayMaterias;
                }
            }


        }




    }
?>