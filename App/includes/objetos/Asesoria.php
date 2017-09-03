<?php namespace Objetos;

    class Asesoria{

        private $id;
        private $alumno;
        private $asesor;
        private $materia;
        private $fecha_asesoria;
        private $fecha_solicitud;
        private $hora;
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
        public function getFechaAsesoria()
        {
            return $this->fecha_asesoria;
        }

        /**
         * @param mixed $fecha_asesoria
         */
        public function setFechaAsesoria($fecha_asesoria)
        {
            $this->fecha_asesoria = $fecha_asesoria;
        }

        /**
         * @return mixed
         */
        public function getFechaSolicitud()
        {
            return $this->fecha_solicitud;
        }

        /**
         * @param mixed $fecha_solicitud
         */
        public function setFechaSolicitud($fecha_solicitud)
        {
            $this->fecha_solicitud = $fecha_solicitud;
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