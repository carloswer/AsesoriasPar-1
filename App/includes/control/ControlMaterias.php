<?php namespace Control;

    use Modelo\Persistencia\Materias;
    use Objetos\Materia;

    class ControlMaterias{
        private $perMaterias;

        public function __construct(){
            $this->perMaterias = new Materias();
        }


        public function obtenerMaterias(){
            $result = $this->perMaterias->getMaterias();
            if( !is_array($result) )
                return $result;
            else{
                $arrayMaterias = array();
                foreach( $result as $mat ) {
                    //Se agrega al array
                    $arrayMaterias[] = $this->doObjeto($mat);
                }
                return $arrayMaterias;
            }
        }

        public function obtenerMateriasPorCarrera($carrera){
            $result = $this->perMaterias->getMateriasCarrera($carrera);
            if( !is_array($result) )
                return $result;
            else{
                $arrayMaterias = array();
                foreach( $result as $mat ) {
                    //Se agrega al array
                    $arrayMaterias[] = $this->doObjeto($mat);
                }
                return $arrayMaterias;
            }
        }

        private function doObjeto($mat){
            // Crea objeto
            $materia = new Materia();
            $materia->setId($mat['PK_mat_id']);
            $materia->setNombre($mat['mat_nombre']);
            $materia->setAbreviacion($mat['mat_abreviacion']);
            $materia->setDescripcion($mat['mat_descripcion']);
            $materia->setPlan($mat['mat_plan']);
            $materia->setSemestre($mat['mat_semestre']);
            //Cambiar por nombre
            $materia->setCarrera($mat['FK_carrera']);
            //Se regresa
            return $materia;
        }


    }
?>