<?php //namespace Datos;

//    include_once "../../config.php";

    class Materias{

        private $con;

        public function __construct(){}

        /**
         * Metodo que regresa todas las materias registradas
         */
        public function getMaterias(){
            $this->con = Conexion::getInstance()->getConnection();

            $query = "SELECT * FROM materia";
            $result = $this->con->query($query);

//            while( $row = mysqli_fetch_assoc($result) ){
//            }

            $this->con->close();
            return $result;
        }

        public function addMateria(Materia $Materia){
        }


    }

?>