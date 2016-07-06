<?php 
	/**
	 * Modelo para la basede datos estudiantes
	 */
	Class Estudiantes{
		private $config;
		private $db;

		//Constructor del modelo
		public function __construct($config){
			$this->config = $config; //Asignamos el objeto de configuración a una variable local

			$this->db = new Database($this->config); //importamos el soporte para la base de datos
		}

		public function crearEstudiante(){

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
		public function getEstudianteID($rut){
			$this->db->query("SELECT * FROM estudiantes WHERE rut=:rut");

			$this->db->bind(':rut', $rut);

			return $this->db->single();
		}
	}
 ?>