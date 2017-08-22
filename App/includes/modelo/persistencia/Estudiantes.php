<?php namespace Modelo\Persistencia;

    class Estudiantes extends Persistencia{

        public function __construct(){}


        public function getEstudiante_UsuarioId( $id ){
            $query = "SELECT 
                        e.PK_id as 'id', 
                        e.id_itson as 'id_itson', 
                        e.nombre as 'nombre', 
                        e.apellido as 'apellido', 
                        e.telefono as 'telefono', 
                        e.facebook as 'facebook', 
                        e.avatar as 'avatar', 
                        e.requiere_validar as 'requiere_validar', 
                        c.nombre as 'carrera', 
                        e.FK_usuario as 'usuario_id'
                        FROM estudiante e
                        INNER JOIN carrera c ON c.PK_id = e.FK_carrera
                        WHERE e.FK_usuario =".$id;
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
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