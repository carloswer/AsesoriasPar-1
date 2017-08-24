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
                    $arrayMaterias[] = $this->crearObjeto($mat);
                }
                return $arrayMaterias;
            }
        }

        public function obtenerMaterias_Carrera($carrera){
            $result = $this->perMaterias->getMaterias_Carrera($carrera);
            if( !is_array($result) )
                return $result;
            else{
                $arrayMaterias = array();
                foreach( $result as $mat ) {
                    //Se agrega al array
                    $arrayMaterias[] = $this->crearObjeto($mat);
                }
                return $arrayMaterias;
            }
        }


        public function obtenerMaterias_Horario( $horarioID ){
            $result = $this->perMaterias->getMaterias_Horario( $horarioID );
            if( !is_array($result) )
                return $result;
            else{
                $arrayMaterias = array();
                foreach( $result as $mat ) {
                    //Se agrega al array
                    $arrayMaterias[] = $this->crearObjeto($mat);
                }
                return $arrayMaterias;
            }
        }

        private function crearObjeto($mat){
            // Crea objeto
            $materia = new Materia();
            $materia->setId($mat['id']);
            $materia->setNombre($mat['nombre']);
            $materia->setAbreviacion($mat['abreviacion']);
            $materia->setDescripcion($mat['descripcion']);
            $materia->setPlan($mat['plan']);
            $materia->setSemestre($mat['semestre']);

            $carrera = [
                'id' => $mat['carrera_id'],
                'nombre' => $mat['carrera_nombre']
            ];
            $materia->setCarrera( $carrera );
            //Se regresa
            return $materia;
        }


    }
?>