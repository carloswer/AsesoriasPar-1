<?php namespace Control;

    use Modelo\Persistencia\Materias;
    use Objetos\Materia;

    class ControlMaterias{
        private $perMaterias;

        public function __construct(){
            $this->perMaterias = new Materias();
        }


        public function getSubjects(){
            $result = $this->perMaterias->getSubjects();
            if( !is_array($result) )
                return $result;
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
         * @param $id
         * @return array|bool|null
         */
        public function getSubjects_ByScheduleId( $id ) {
            $result = $this->perMaterias->getSubjects_ByScheduleId( $id );
            if( !is_array($result) )
                return $result;
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
            $result = $this->perMaterias->getSubjecs_ByCareerId( $career );
            if( !is_array($result) )
                return $result;
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
            $result = $this->perMaterias->getSubjecs_ByCareerName( $career );
            if( !is_array($result) )
                return $result;
            else{
                $arrayMaterias = array();
                foreach( $result as $mat ) {
                    //Se agrega al array
                    $arrayMaterias[] = $this->makeObject_Subject($mat);
                }
                return $arrayMaterias;
            }
        }

//        public function obtenerMaterias_Carrera($carrera){
//            $result = $this->perMaterias->getMaterias_Carrera($carrera);
//            if( !is_array($result) )
//                return $result;
//            else{
//                $arrayMaterias = array();
//                foreach( $result as $mat ) {
//                    //Se agrega al array
//                    $arrayMaterias[] = $this->crearObjeto($mat);
//                }
//                return $arrayMaterias;
//            }
//        }
//
//
//        public function obtenerMaterias_Horario( $horarioID ){
//            $result = $this->perMaterias->getMaterias_Horario( $horarioID );
//            if( !is_array($result) )
//                return $result;
//            else{
//                $arrayMaterias = array();
//                foreach( $result as $mat ) {
//                    //Se agrega al array
//                    $arrayMaterias[] = $this->crearObjeto($mat);
//                }
//                return $arrayMaterias;
//            }
//        }
//
//        public function obtenerMateriasConAsesores( $ciclo ){
//            $result = $this->perMaterias->getMateriasConAsesores( $ciclo );
//            if( !is_array($result) )
//                return $result;
//            else{
//                $arrayMaterias = array();
//                foreach( $result as $mat ) {
//                    //Se agrega al array
//                    $arrayMaterias[] = $this->crearObjeto($mat);
//                }
//                return $arrayMaterias;
//            }
//        }
//
//        public function obtenerMateriasConAsesores_SinEstudianteX($idCiclo, $idEstudiante ){
//            $result = $this->perMaterias->getMateriasConAsesores_SinEstudianteX( $idCiclo, $idEstudiante );
//            if( !is_array($result) )
//                return $result;
//            else{
//                $arrayMaterias = array();
//                foreach( $result as $mat ) {
//                    //Se agrega al array
//                    $arrayMaterias[] = $this->crearObjeto($mat);
//                }
//                return $arrayMaterias;
//            }
//        }

        private function makeObject_Subject($mat){
            // Crea objeto
            $materia = new Materia();
            $materia->setId($mat['id']);
            $materia->setName($mat['nombre']);
            $materia->setShortName($mat['abreviacion']);
            $materia->setDescripcion($mat['descripcion']);
            $materia->setSchoolPlan($mat['plan']);
            $materia->setSemester($mat['semestre']);
            $carrera = [
                'id' => $mat['carrera_id'],
                'name' => $mat['carrera_nombre'],
                'short_name' => $mat['carrera_abreviacion']
            ];
            $materia->setCareer( $carrera );
            //Se regresa
            return $materia;
        }




    }
?>