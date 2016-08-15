<?php
	/**
	* Modelo para la tabla Asignatura
	* Estructura de la tabla:
	* cod_asignatura 	TINYINT
	* nombre_asig 		varchar(255)
	* semestre 			TINYINT
	* anho 				year
	*/
	Class Asignatura{
		private $db;

		public function __construct($config){
			$this->db= new Database($config);
		}
		// crear asignatura
		public function createAsignatura($nombre,$anho, $semestre){
			$this->db->query("INSERT INTO asignaturas (nombre_asig, semestre, anho) VALUES(:nombre, :semestre, :anho)");
			$this->db->bind(':nombre',$nombre);
			$this->db->bind(':semestre',$semestre);
			$this->db->bind(':anho',$anho);

			$this->db->execute();

		}
		//Obtener todas las asignarutas
		public function getAsignarutas(){
			$this->db->query("SELECT * FROM asignaturas");

			return $this->db->resultSet();
		}
		//Obtener asignatura por codigo
		public function getAsignarutasByNombre($id){
				$this->db->query("SELECT * FROM asignaturas WHERE cod_asignaruta= :id");

				$this->db->bind(':id',$id);

				return $this->db->resultSet();
		}
		//editar asignatura
		public function editAsignaturaById($cod,$nombre,$semestre,$anho){
			$this->db->query("UPDATE asignaturas SET nombre_asig=:nombre, semestre=:semestre, anho=:anho WHERE cod_asignatura=:cod");


			$this->db->bind(':cod',$cod);
			$this->db->bind(':nombre',$nombre);
			$this->db->bind(':semestre',$semestre);
			$this->db->bind(':anho',$anho);

			$this->db->execute();
		}
		//Eliminar una asignatura por codigo
		public function deleteAsignaturaById($id){

			$this->db->query("DELETE FROM asignaturas WHERE cod_asignatura=:id");

			$this->db->bind(':id', $id);
			$this->db->execute();

		}
	}
?>