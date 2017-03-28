<?php namespace Datos;

    use Database\Conexion;
    use Negocio\Objetos\Estudiante;
    use Negocio\Objetos\Carrera;

    class Estudiantes
    {

        private $con;
        private $resultados = array();

        public function __construct(){}


        public function getEstudiantes(): array{
            $this->con = Conexion::getInstance()->getConnection();

            $query = "SELECT * FROM estudiante e
                      INNER JOIN carrera c ON e.Carrera = c.IDcarrera
                      INNER JOIN usuario u ON e.IDestudiante = u.IDusuario;";
            $result = $this->con->query($query);
            $this->con->close();

            //Creando y Agregando objetos Materia a arreglo
            while( $row = mysqli_fetch_assoc($result) ){
                $this->resultados[] = $this->crearObjEstudiante($row);
            }
            return $this->resultados;
        }


        public function getEstudiantesCarrera(Carrera $carrera)
        {
            $this->con = Conexion::getInstance()->getConnection();

            $query = "SELECT * FROM estudiante e INNER JOIN carrera c ON e.Carrera = c.IDcarrera
                      WHERE c.Carrera = '".$carrera->getNombre()."'";
            $result = $this->con->query($query);
            $this->con->close();

            //Creando y Agregando objetos Materia a arreglo
            while( $row = mysqli_fetch_assoc($result) ){
                $this->resultados[] = $this->crearObjEstudiante($row);
            }
            return $this->resultados;
        }


        public function getEstudianteId(Estudiante $estudiante): Estudiante{
//            $this->con = Conexion::getInstance()->getConnection();
//
//            $query = "SELECT * FROM estudiante WHERE IDestudiante =".$estudiante->getIdEstudiante();
//
//            $result = $this->con->query($query);
//            $this->con->close();
        }


        private function crearObjEstudiante($item): Estudiante{

            return new Estudiante($item['IDestudiante'], $item['itsonID'], $item['Nombre'], $item['Apellido'],
                $item['Correo'], $item['Password'], $item['Telefono'], $item['Facebook'], $item['Avatar'],
                $item['ReqValidar'], $item['Registro'], $item['Estado'],
                new Carrera($item['IDcarrera'], $item['Carrera_nombre'], $item['Abreviacion']));

        }

    }
?>