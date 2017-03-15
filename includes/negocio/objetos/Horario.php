<?php namespace Negocio\Objetos;

    class Horario{
        public $asesor;
        public $listDiasDisponibles;
        public $listaMaterias;
        public $aprobado;
        public $requiereValidar;

        /**
         * Horario constructor.
         * @param $asesor
         * @param $listDiasDisponibles
         * @param $listaMaterias
         * @param $aprobado
         * @param $requiereValidar
         */
        public function __construct($asesor, $listDiasDisponibles, $listaMaterias, $aprobado, $requiereValidar)
        {
            $this->asesor = $asesor;
            $this->listDiasDisponibles = $listDiasDisponibles;
            $this->listaMaterias = $listaMaterias;
            $this->aprobado = $aprobado;
            $this->requiereValidar = $requiereValidar;
        }

        /**
         * @return mixed
         */
        public function getAsesor()
        {
            return $this->asesor;
        }

        /**
         * @param mixed $usuario
         */
        public function setUsuario($asesor)
        {
            $this->asesor = $asesor;
        }

        /**
         * @return mixed
         */
        public function getListDiasDisponibles()
        {
            return $this->listDiasDisponibles;
        }

        /**
         * @param mixed $listDiasDisponibles
         */
        public function setListDiasDisponibles($listDiasDisponibles)
        {
            $this->listDiasDisponibles = $listDiasDisponibles;
        }

        /**
         * @return mixed
         */
        public function getListaMaterias()
        {
            return $this->listaMaterias;
        }

        /**
         * @param mixed $listaMaterias
         */
        public function setListaMaterias($listaMaterias)
        {
            $this->listaMaterias = $listaMaterias;
        }

        /**
         * @return mixed
         */
        public function getAprobado()
        {
            return $this->aprobado;
        }

        /**
         * @param mixed $aprobado
         */
        public function setAprobado($aprobado)
        {
            $this->aprobado = $aprobado;
        }

        /**
         * @return mixed
         */
        public function getRequiereValidar()
        {
            return $this->requiereValidar;
        }

        /**
         * @param mixed $requiereValidar
         */
        public function setRequiereValidar($requiereValidar)
        {
            $this->requiereValidar = $requiereValidar;
        }

        function toString(){
            return $this->asesor.", ".$this->listDiasDisponibles.", ".$this->listaMaterias.", ".$this->aprobado.", ".$this->requiereValidar;
        }

    }