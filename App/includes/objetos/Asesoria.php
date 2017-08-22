<?php namespace Objetos;

    class Asesoria{

        private $id;
        private $alumno;
        private $asesor;
        private $materia;
        private $fecha;
        private $registro;
        private $hora;
        private $dia;
        private $descripcion;
        private $estado;


        public function __construct(){}

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getAlumno()
        {
            return $this->alumno;
        }

        /**
         * @param mixed $alumno
         */
        public function setAlumno($alumno)
        {
            $this->alumno = $alumno;
        }

        /**
         * @return mixed
         */
        public function getAsesor()
        {
            return $this->asesor;
        }

        /**
         * @param mixed $asesor
         */
        public function setAsesor($asesor)
        {
            $this->asesor = $asesor;
        }

        /**
         * @return mixed
         */
        public function getMateria()
        {
            return $this->materia;
        }

        /**
         * @param mixed $materia
         */
        public function setMateria($materia)
        {
            $this->materia = $materia;
        }

        /**
         * @return mixed
         */
        public function getFecha()
        {
            return $this->fecha;
        }

        /**
         * @param mixed $fecha
         */
        public function setFecha($fecha)
        {
            $this->fecha = $fecha;
        }

        /**
         * @return mixed
         */
        public function getRegistro()
        {
            return $this->registro;
        }

        /**
         * @param mixed $registro
         */
        public function setRegistro($registro)
        {
            $this->registro = $registro;
        }

        /**
         * @return mixed
         */
        public function getHora()
        {
            return $this->hora;
        }

        /**
         * @param mixed $hora
         */
        public function setHora($hora)
        {
            $this->hora = $hora;
        }

        /**
         * @return mixed
         */
        public function getDia()
        {
            return $this->dia;
        }

        /**
         * @param mixed $dia
         */
        public function setDia($dia)
        {
            $this->dia = $dia;
        }

        /**
         * @return mixed
         */
        public function getDescripcion()
        {
            return $this->descripcion;
        }

        /**
         * @param mixed $descripcion
         */
        public function setDescripcion($descripcion)
        {
            $this->descripcion = $descripcion;
        }

        /**
         * @return mixed
         */
        public function getEstado()
        {
            return $this->estado;
        }

        /**
         * @param mixed $estado
         */
        public function setEstado($estado)
        {
            $this->estado = $estado;
        }


    }