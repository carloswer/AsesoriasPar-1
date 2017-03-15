<?php namespace Negocio\Objetos;

    class Asesorias{
        public $asesoriaId;
        public $asesor;
        public $asesorado;
        public $materia;
        public $fecha;
        public $hora;
        public $descripcion;
        public $validacion;

        /**
         * Asesorias constructor.
         * @param $asesoriaId
         * @param $asesor
         * @param $asesorado
         * @param $materia
         * @param $fecha
         * @param $hora
         * @param $descripcion
         * @param $validacion
         */
        public function __construct($asesoriaId, $asesor, $asesorado, $materia, $fecha, $hora, $descripcion, $validacion)
        {
            $this->asesoriaId = $asesoriaId;
            $this->asesor = $asesor;
            $this->asesorado = $asesorado;
            $this->materia = $materia;
            $this->fecha = $fecha;
            $this->hora = $hora;
            $this->descripcion = $descripcion;
            $this->validacion = $validacion;
        }

        /**
         * @return mixed
         */
        public function getAsesoriaId()
        {
            return $this->asesoriaId;
        }

        /**
         * @param mixed $asesoriaId
         */
        public function setAsesoriaId($asesoriaId)
        {
            $this->asesoriaId = $asesoriaId;
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
        public function getAsesorado()
        {
            return $this->asesorado;
        }

        /**
         * @param mixed $asesorado
         */
        public function setAsesorado($asesorado)
        {
            $this->asesorado = $asesorado;
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
        public function getValidacion()
        {
            return $this->validacion;
        }

        /**
         * @param mixed $validacion
         */
        public function setValidacion($validacion)
        {
            $this->validacion = $validacion;
        }

        function toString(){
            return $this->asesoriaId.", ".$this->asesor.", ".$this->asesorado.", ".$this->materia.", ".$this->fecha.",
             ".$this->hora.", ".$this->descripcion.", ".$this->validacion;
        }

    }