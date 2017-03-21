<?php namespace Datos;

    use Datos\Estudiantes;
    use Datos\Horarios;
    use Datos\Materias;

	class Persistencia
    {

        //Instancias
        private $materias;
        private $estudiantes;
        private $Horarios;

        public function __construct(){
            $this->materias = new Materias();
            $this->estudiantes = new Estudiantes();
            $this->horarios = new Horarios();
        }

        //--------------
        // MÉTODOS DE CARRERAS
        //--------------


        //--------------
        // MÉTODOS DE MATERIAS
        //--------------

        public function obtenerMaterias(): array{
            $res = $this->materias->getMaterias();
            if( count($res) == 0 )
                return null;
            else
                return $res;
        }

        public function obtenerMateriasCarrera(Carrera $carrera): array{
            $res = $this->materias->getMateriasCarrera($carrera);
            if( count($res) == 0 )
                return null;
            else
                return $res;
        }


        //--------------
        // MÉTODOS DE ESTUDIANTES
        //--------------

        public function obtenerEstudiantes(): array{
            $res = $this->estudiantes->getEstudiantes();
            if( count($res) == 0 )
                return null;
            else
                return $res;
        }

        public function obtenerEstudiantesCarrera(Carrera $carrera): array{
            $res = $this->estudiantes->getEstudiantesCarrera($carrera);
            if( count($res) == 0 )
                return null;
            else
                return $res;
        }

    }
 ?>