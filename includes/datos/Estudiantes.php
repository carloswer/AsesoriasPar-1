<?php namespace Datos;

    use Database\Conexion;
    use Negocio\Objetos\Estudiante;
    use Negocio\Objetos\Carrera;

    class Estudiantes
    {

        private $con;
        //private $resultados = array();

        public function __construct(){}


        public function getEstudiantes(): array
        {
            $this->con = Conexion::getInstance()->getConnection();

            $query = "SELECT * FROM estudiante e
                      INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
                      INNER JOIN usuario u ON e.FK_usuario = u.PK_usu_id;";
            $result = $this->con->query($query);
            $this->con->close();


            while( $row = mysqli_fetch_assoc($result) ){
                $this->resultados[] = $row;
            }

            //Creando y Agregando objetos Materia a arreglo
//            while( $row = mysqli_fetch_assoc($result) ){
//                $this->resultados[] = $this->crearObjEstudiante($row);
//            }
            return $this->resultados;
        }


        public function getEstudianteID(int $idEstudiante): array
        {
            $this->con = Conexion::getInstance()->getConnection();

            $query = "SELECT * FROM estudiante e
                        INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
                        INNER JOIN usuario u ON e.FK_usuario = u.PK_usu_id
                        WHERE e.PK_est_id = ".$idEstudiante;
            $result = $this->con->query($query);
            $this->con->close();


            while( $row = mysqli_fetch_assoc($result) ){
                $this->resultados[] = $row;
            }

            //Creando y Agregando objetos Materia a arreglo
//            while( $row = mysqli_fetch_assoc($result) ){
//                $this->resultados[] = $this->crearObjEstudiante($row);
//            }
            return $this->resultados;
        }


//        public function getEstudiantesCarrera(Carrera $carrera): Array
        public function getEstudiantesCarrera(int $idCarrera): Array
        {
            $this->con = Conexion::getInstance()->getConnection();

            $query = "SELECT * FROM estudiante e 
                      INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
                      WHERE c.PK_ca_id = ".idCarrera;
            $result = $this->con->query($query);
            $this->con->close();

            while( $row = mysqli_fetch_assoc($result) ){
                $this->resultados[] = $row;
            }

//            //Creando y Agregando objetos Materia a arreglo
//            while( $row = mysqli_fetch_assoc($result) ){
//                $this->resultados[] = $this->crearObjEstudiante($row);
//            }
//            return $this->resultados;
        }




//        private function crearObjEstudiante($item): Estudiante{
//
//            return new Estudiante($item['PK_est_id'], $item['est_idItson'], $item['est_nombre'], $item['est_apellido'],
//                    $item['usu_Correo'], $item['usu_password'], $item['Telefono'], $item['Facebook'], $item['Avatar'],
//                    $item['ReqValidar'], $item['Registro'], $item['Estado'],
//
//                    new Carrera($item['IDcarrera'], $item['Carrera_nombre'], $item['Abreviacion'])
//                );
//
//        }

    }
?>