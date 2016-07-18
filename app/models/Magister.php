<?php 
	/**
	 * Modelo para la tabla magister
	 * Estructura de la tabla:
	 * 		cod_mg 			TINYINT(4)
	 *		nom_mg			VARCHAR(65)
	 */
	Class Magister{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Crear una entrada en la tabla
		public function createMagister($nombre){
			$this->db->query("INSERT INTO magister(nom_mg) VALUES (:nombre)");

			$this->db->bind(':nombre', $nombre);

			$this->db->execute();
		}

		//Obtener las entradas de la tabla
		public function getMagister(){
			$this->db->query("SELECT * FROM magister");

			return $this->db->resultSet();
		}

		//Obtener una entrada por su ID
		public function getMagisterById($id){
			$this->db->query("SELECT * FROM magister WHERE cod_mg=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();
		}

		//Editar una entrada por su ID
		public function editMagisterById($id, $nombre){
			$this->db->query("UPDATE magister SET nom_mg=:nombre WHERE cod_mg=:id");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}

		//Eliminar una entrada por su ID
		public function deleteMagisterById($id){
			$this->db->query("DELETE FROM magister WHERE cod_mg=:id");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}
	}
 ?>