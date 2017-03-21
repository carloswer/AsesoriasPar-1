<?php namespace Negocio\Objetos;

    class Horario{
        public $asesor;
        public $listDias;
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
        public function __construct($asesor, Array $listDiasDisponibles, Array $listaMaterias, $aprobado, $requiereValidar)
        {
            $this->asesor = $asesor;
            $this->listDias = $listDiasDisponibles;
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
        public function getListDias()
        {
            return $this->listDias;
        }

        /**
         * @param mixed $listDias
         */
        public function setListDias($listDias)
        {
            $this->listDias = $listDias;
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
            return $this->asesor.", ".$this->listDias.", ".$this->listaMaterias.", ".$this->aprobado.", ".$this->requiereValidar;
        }

    }