<?php 
	
	class persistencia extends IPersistencia{



		public function obtenerMateria($Materia) {
			$con = conexionDB();

			$mat=new Materia($con);

			if(!is_null($Materia)){
				$mat=$Mat.obtenerMateria($_GET(`idMateria`));
				return $mat;
			}
		}


		public function obtenerAsesor($Usuario){
			$con=conexionDB();

			$asesor=new Usuario($con);

			if(!is_null($Usuario)){
				$asesor=$asesor.obtenerUsuario($_GET(`idUsuario`));
				return $asesor;
			}


		}

		public function obtenerAsesorado($Usuario){
			$con=conexionDB();

			$asesorado=new Usuario($con);

			if(!is_null($Usuario)){
				$asesorado=$asesorado.obtenerUsuario($_GET(`idUsuario`));
				return $asesorado;
			}

		}


		public function obtenerHorario($Horario){
			$con=conexionDB();

			$Hor=new Horario($con);

			if(!is_null($Horario)){
				$Hor=$Hor.obtenerHorario($_GET(`Horario`));
				return $Hor;
			}


		}


		public function verificarDisponibilidad(){


		}



		public function registrarHorario(){



		}


		public function registrarAsesorias($Materia,$Asesor,$Asesarado,$Horario){


		}


		public function obtenerAsesoria($Asesoria){
			$con=conexionDB();

			$ase=new Asesoria($con);

			if(!is_null($Asesoria)){
				$ase=$ase.obtenerAsesoria($_GET(`idAsesoria`));
				return $ase;
			}


		}


		public function validarHorarioCreado($Horario){


		}

	}
	

 ?>