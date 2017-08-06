<?php namespace Modelo\Persistencia;

    class Estudiantes extends Persistencia{

        public function __construct(){}


        public function getEstudiante_UsuarioId( $id ){
            $query = "SELECT e.PK_est_id, e.est_id_itson, e.est_nombre, e.est_apellido, e.est_telefono, 
                        e.est_facebook, e.est_avatar, e.est_ReqValidar, c.ca_nombre as carrera, e.FK_usuario
                        FROM estudiante e
                        INNER JOIN carrera c ON c.PK_ca_id = e.FK_carrera
                        WHERE e.FK_usuario =".$id;
            //Obteniendo resultados
            return $this->getResultado($query);
        }

        // public function getEstudiantes(): array{
        //     $query = "SELECT * FROM estudiante e
        //               INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
        //               INNER JOIN usuario u ON e.FK_usuario = u.PK_usu_id";
        //     $con = new Conexion();
        //     $resultSet = $con->executeQuery($query);
        //     $result = array();
        //     while( $row = mysqli_fetch_assoc($resultSet) ){
        //         $result[] = $row;
        //     }
        //     return $result;
        // }


        // public function getEstudiantePorUsuarioID(int $idUser): array{
        //     $query = "SELECT * FROM estudiante e
        //               INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
        //               INNER JOIN usuario u ON e.FK_usuario = u.PK_usu_id
        //                 WHERE FK_usuario = ".$idUser;
        //     $con = new Conexion();
        //     $resultSet = $con->executeQuery($query);
        //     $result = mysqli_fetch_assoc($resultSet);
        //     return $result;
        // }





    }
?>