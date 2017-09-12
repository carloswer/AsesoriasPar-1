<?php namespace Modelo\Persistencia;

    class Estudiantes extends Persistencia{

        public function __construct(){}


        private $campos = "e.PK_id as 'id', 
                        e.id_itson as 'id_itson', 
                        e.nombre as 'nombre', 
                        e.apellido as 'apellido', 
                        e.telefono as 'telefono', 
                        e.facebook as 'facebook', 
                        e.avatar as 'avatar', 
                        e.requiere_validar as 'requiere_validar', 
                        c.PK_id as 'carrera_id', 
                        c.nombre as 'carrera_nombre',
                        e.FK_usuario as 'usuario_id'";


        public function getStudent_ById($id){
            $query = "SELECT 
                        ".$this->campos."
                        FROM estudiante e
                        INNER JOIN carrera c ON c.PK_id = e.FK_carrera
                        WHERE e.PK_id = ".$id;
            //Obteniendo resultados
            return $this->executeQuery($query);
        }

        public function getStudent_ByUserId( $id ){
            $query = "SELECT 
                        ".$this->campos."
                        FROM estudiante e
                        INNER JOIN carrera c ON c.PK_id = e.FK_carrera
                        WHERE e.FK_usuario =".$id;
            //Obteniendo resultados
            return $this->executeQuery($query);
        }




    }
?>