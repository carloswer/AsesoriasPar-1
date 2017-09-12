<?php namespace Negocio\Objetos;

    class Horario{
        
        private $idSchedule;
        private $hoursAndDays;
        private $subjects;
        private $scheduleStatus;

        /**
         * Horario constructor.
         * @param $idSchedule
         * @param $daysAndHours
         * @param $subjects
         * @param $scheduleStatus
         * @param $requireValidate
         */
        public function __construct($idSchedule, $daysAndHours, $subjects, $scheduleStatus){
            $this->idSchedule = $idSchedule;
            $this->hoursAndDays = $daysAndHours;
            $this->subjects = $subjects;
            $this->scheduleStatus = $scheduleStatus;
        }

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
         * @return mixed
         */
        public function getHoursAndDays()
        {
            return $this->hoursAndDays;
        }

        /**
         * @param mixed $hoursAndDays
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
         * @param mixed $subjects
         */
        public function setSubjects($subjects)
        {
            $this->subjects = $subjects;
        }

        /**
         * @return mixed
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