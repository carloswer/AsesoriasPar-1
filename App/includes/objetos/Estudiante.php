<?php namespace Objetos;

    use Modelo\Persistencia\Usuarios;

    class Estudiante {

        /**
         * @var Usuario
         */
        private $user;
        /**
         * @var Carrera|int
         */
        private $career;
        private $idStudent;
        private $idItson;
        private $firstName;
        private $lastname;
        private $phone;
        private $facebook;
        private $avatar;



        public function __construct(){}

        /**
         * @return Usuario
         */
        public function getUser(): Usuario
        {
            return $this->user;
        }

        /**
         * @param Usuario $user
         */
        public function setUser(Usuario $user)
        {
            $this->user = $user;
        }

        /**
         * @return Carrera
         */
        public function getCareer(): Carrera
        {
            return $this->career;
        }

        /**
         * @param Carrera $career
         */
        public function setCareer(Carrera $career)
        {
            $this->career = $career;
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
         */
        public function setIdStudent($idStudent)
        {
            $this->idStudent = $idStudent;
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
         */
        public function setIdItson($idItson)
        {
            $this->idItson = $idItson;
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
         */
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
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
         */
        public function setLastname($lastname)
        {
            $this->lastname = $lastname;
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
         */
        public function setPhone($phone)
        {
            $this->phone = $phone;
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
         */
        public function setFacebook($facebook)
        {
            $this->facebook = $facebook;
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
         */
        public function setAvatar($avatar)
        {
            $this->avatar = $avatar;
        }




    }


?>