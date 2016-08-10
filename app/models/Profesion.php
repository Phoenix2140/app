<?php 
	/**
	 * Modelo tabla profesiones
	 * Estructura de la tabla:
	 * 		cod_prof		TINYINT(4)
	 * 		nom_prof		VARCHAR(25)
	 */
	Class Profesion{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Crear entrada en la tabla
		public function createProfesion($profesion){
			$this->db->query("INSERT INTO profesiones(nom_prof) VALUES (:profesion)");

			$this->db->bind(':profesion', $profesion);

			$this->db->execute();
		}

		//Crear entrada en la tabla
		public function createProfesionReturnId($profesion){
			$this->db->query("INSERT INTO profesiones(nom_prof) VALUES (:profesion)");

			$this->db->bind(':profesion', $profesion);

			$this->db->execute();

			return $this->db->lastInsertId();
		}

		//Obtener datos de la tabla
		public function getProfesion(){
			$this->db->query("SELECT * FROM profesiones");

			return $this->db->resultSet();
		}

		//Obtener dato por el ID
		public function getProfesionById($id){
			$this->db->query("SELECT * FROM profesiones WHERE cod_prof=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();
		}

		//Actualizar dato por ID
		public function updateProfesionById($id, $profesion){
			$this->db->query("UPDATE profesiones SET nom_prof=:profesion WHERE cod_prof=:id");

			$this->db->bind(':id', $id);
			$this->db->bind(':profesion', $profesion);

			$this->db->execute();
		}

		//Eliminar Dato por ID
		public function deleteProfesionById($id){
			$this->db->query("DELETE FROM profesiones WHERE cod_prof=:id");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}
	}
 ?>