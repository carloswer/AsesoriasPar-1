<?php namespace Datos;

    use Database\Conexion;

    class Materias{

        private $con;
        private $resultados = array();

        public function __construct(){}


        /**
         * Metodo que regresa todas las materias registradas
         * @return array Objetos del tipo Materia
         */
        public function getMaterias(){
            $this->con = Conexion::getInstance()->getConnection();

            $query = "SELECT * FROM materia m INNER JOIN carrera c ON m.Carrera = c.IDcarrera";
            $result = $this->con->query($query);

            //Creando y Agregando objetos Materia a arreglo
            while( $row = mysqli_fetch_assoc($result) ){
                $this->resultados[] = $this->crearObjMateria($row);
            }

            $this->con->close();
            return $this->resultados;
        }



        public function getMateriaID(int $id){
            $this->con = Conexion::getInstance()->getConnection();

            $query = "SELECT * FROM materia m INNER JOIN carrera c ON m.Carrera = c.IDcarrera 
                    WHERE m.IDmateria = ".$materia->getIdMateria();

            $result = $this->con->query($query);

            $row = mysqli_fetch_assoc($result);
            return  $this->crearObjMateria($row);

            $this->con->close();
            return $this->resultados;
        }



        /**
         * Método que regresa sólo las materias de una carrera
         * @param Carrera $carrera objeto Carrera del cual se buscara en la base de Datos
         * @return array Array de objetos Materia
         */
        public function getMateriasCarrera(Carrera $carrera){
            $this->con = Conexion::getInstance()->getConnection();

            $query = "SELECT * FROM materia m INNER JOIN carrera c ON m.Carrera = c.IDcarrera
                      WHERE c.IDcarrera =".$carrera->getIdCarrera();

            $result = $this->con->query($query);
            $this->con->close();

            //Creando y Agregando objetos Materia a arreglo
            while( $row = mysqli_fetch_assoc($result) ){
                $this->resultados[] = $this->crearObjMateria($row);
            }

            return $this->resultados;
        }


        /**
         * Método encargado de crear un Objeto del tipo Materia y regresarlo
         * @param $item Array asociativo del resultado del Query de la base de Datos
         * @return Materia Objeto Materia
         */
        private function crearObjMateria($item){
            return new Materia($item['IDmateria'], $item['Materia'], $item['Semestre'],
                new Carrera($item['IDcarrera'], $item['Carrera'], $item['Abreviacion']) );
        }



    }

?>