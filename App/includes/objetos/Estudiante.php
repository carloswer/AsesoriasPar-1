<?php namespace Objetos;

    class Estudiante {

        private $idUser;
        // ----
        private $idStudent;
        private $idItson;
        private $firstName;
        private $lastname;
        private $phone;
        private $facebook;
        private $avatar;
        private $career;


        public function __construct(){}
        
        /**
         * @return mixed
         */
        public function getIdUser()
        {
            return $this->idUser;
        }

        /**
         * @param mixed $idUser
         *
         * @return self
         */
        public function setIdUser($idUser)
        {
            $this->idUser = $idUser;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getIdStudent()
        {
            return $this->idStudent;
        }

        /**
         * @param mixed $idStudent
         *
         * @return self
         */
        public function setIdStudent($idStudent)
        {
            $this->idStudent = $idStudent;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getIdItson()
        {
            return $this->idItson;
        }

        /**
         * @param mixed $idItson
         *
         * @return self
         */
        public function setIdItson($idItson)
        {
            $this->idItson = $idItson;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * @param mixed $firstName
         *
         * @return self
         */
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getLastname()
        {
            return $this->lastname;
        }

        /**
         * @param mixed $lastname
         *
         * @return self
         */
        public function setLastname($lastname)
        {
            $this->lastname = $lastname;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getPhone()
        {
            return $this->phone;
        }

        /**
         * @param mixed $phone
         *
         * @return self
         */
        public function setPhone($phone)
        {
            $this->phone = $phone;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getFacebook()
        {
            return $this->facebook;
        }

        /**
         * @param mixed $facebook
         *
         * @return self
         */
        public function setFacebook($facebook)
        {
            $this->facebook = $facebook;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getAvatar()
        {
            return $this->avatar;
        }

        /**
         * @param mixed $avatar
         *
         * @return self
         */
        public function setAvatar($avatar)
        {
            $this->avatar = $avatar;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getCareer()
        {
            return $this->career;
        }

        /**
         * @param mixed $career
         *
         * @return self
         */
        public function setCareer($career)
        {
            $this->career = $career;

            return $this;
        }


    }


?>