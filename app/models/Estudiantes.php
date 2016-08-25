<?php 
	/**
	 * Modelo para la basede datos estudiantes
	 * Estructura de la tabla
	 * rut 			varchar(30)
	 * nombre		varchar(45)
	 * ap_pat   	varchar(45)
	 * ap_mat 		varchar(45)
	 * fecha_nac 	date
	 * cod_prof		TINTINT
	 * domicilio 	varchar(45)
	 * telefono		varchar(45)
	 */
	Class Estudiantes{
		private $db;

		//Constructor del modelo
		public function __construct($config){
			$this->db = new Database($config); //importamos el soporte para la base de datos
		}
		public function crearEstudiante($rut,$nombres,$ap_pat,$ap_mat,$fecha_nac,$cod_prof,$domicilio,$telefono){
			$this->db->query("INSERT INTO estudiantes (rut, nombres, ap_pat, ap_mat, fecha_nac, cod_prof, domicilio, telefono) VALUES (:rut,:nombres,:ap_pat,:ap_mat,:fecha_nac,:cod_prof,:domicilio,:telefono)");

			$this->db->bind(":rut",$rut);
			$this->db->bind(":nombres",$nombres);
			$this->db->bind(":ap_pat",$ap_pat);
			$this->db->bind(":ap_mat",$ap_mat);
			$this->db->bind(":fecha_nac",$fecha_nac);
			$this->db->bind(":cod_prof",$cod_prof);
			$this->db->bind(":domicilio",$domicilio);
			$this->db->bind(":telefono",$telefono);

			$this->db->execute();

		}

		/**
		 * Función para obtener todos los estudiantes
		 */
		public function getEstudiantes(){
			$this->db->query("SELECT * FROM estudiantes");

			return $this->db->resultSet();
		}

		/**
		 * Función para obtener al estudiante por su ID
		 */
		public function getEstudianteRut($rut){
			$this->db->query("SELECT * FROM estudiantes WHERE rut=:rut");

			$this->db->bind(':rut', $rut);

			return $this->db->single();
		}
		//Función para actualizar valores en tabla estudiantes
		public function updateEstudianteByRut($rut,$nombres,$ap_pat,$ap_mat,$fecha_nac,$cod_prof,$domicilio,$telefono){
			$this->db->query("UPDATE estudiantes SET nombres=:nombres, ap_pat=:ap_pat, ap_mat=:ap_mat, fecha_nac=:fecha_nac, cod_prof=:cod_prof, domicilio=:domicilio, telefono=:telefono WHERE rut=:rut");
			$this->db->bind(":rut",$rut);
			$this->db->bind(":nombres",$nombres);
			$this->db->bind(":ap_pat",$ap_pat);
			$this->db->bind(":ap_mat",$ap_mat);
			$this->db->bind(":fecha_nac",$fecha_nac);
			$this->db->bind(":cod_prof",$cod_prof);
			$this->db->bind(":domicilio",$domicilio);
			$this->db->bind(":telefono",$telefono);

			$this->db->execute();

		}
		//Función para eliminar estudiantes
		public function deleteEstudianteByRut($rut){
			$this->db->query("DELETE FROM estudiantes WHERE rut=:rut");
			$this->db->bind(":rut", $rut);
			$this->db->execute();
		}

	}
 ?>