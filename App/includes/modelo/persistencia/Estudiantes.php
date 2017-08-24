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
                        c.nombre as 'carrera_id', 
                        c.nombre as 'carrera_nombre',
                        e.FK_usuario as 'usuario_id'
                        FROM estudiante e
                        INNER JOIN carrera c ON c.PK_id = e.FK_carrera
                        WHERE e.FK_usuario =".$id;
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }





    }
?>