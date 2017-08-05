<?php namespace Datos;

    use Database\Conexion;
    use Negocio\Objetos\Estudiante;
    use Negocio\Objetos\Carrera;

    class Estudiantes
    {

        private $con;
        //private $resultados = array();

        public function __construct(){}


        public function getEstudiantes(): array{
            $query = "SELECT * FROM estudiante e
                      INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
                      INNER JOIN usuario u ON e.FK_usuario = u.PK_usu_id";
            $con = new Conexion();
            $resultSet = $con->executeQuery($query);
            $result = array();
            while( $row = mysqli_fetch_assoc($resultSet) ){
                $result[] = $row;
            }
            return $result;
        }


        public function getEstudiantePorUsuarioID(int $idUser): array{
            $query = "SELECT * FROM estudiante e
                      INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
                      INNER JOIN usuario u ON e.FK_usuario = u.PK_usu_id
                        WHERE FK_usuario = ".$idUser;
            $con = new Conexion();
            $resultSet = $con->executeQuery($query);
            $result = mysqli_fetch_assoc($resultSet);
            return $result;
        }





    }
?>