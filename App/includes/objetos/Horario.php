<?php namespace Objetos;

    class Horario{
        
        private $idSchedule;
        private $hoursAndDays;
        private $subjects;
        private $scheduleStatus;

        /**
         * Horario constructor.
         */
        public function __construct(){}


        /**
         * @return mixed
         */
        public function getIdSchedule()
        {
            return $this->idSchedule;
        }

        /**
         * @param mixed $idSchedule
         */
        public function setIdSchedule($idSchedule)
        {
            $this->idSchedule = $idSchedule;
        }

        /**
         * @return array
         */
        public function getHoursAndDays()
        {
            return $this->hoursAndDays;
        }

        /**
         * @param array $hoursAndDays
         */
        public function setHoursAndDays($hoursAndDays)
        {
            $this->hoursAndDays = $hoursAndDays;
        }

        /**
         * @return mixed
         */
        public function getSubjects()
        {
            return $this->subjects;
        }

        /**
         * @param array $subjects
         */
        public function setSubjects($subjects)
        {
            $this->subjects = $subjects;
        }

        /**
         * @return array
         */
        public function getScheduleStatus()
        {
            return $this->scheduleStatus;
        }

        /**
         * @param mixed $scheduleStatus
         */
        public function setScheduleStatus($scheduleStatus)
        {
            $this->scheduleStatus = $scheduleStatus;
        }



    }