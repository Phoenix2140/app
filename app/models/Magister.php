<?php 
	/**
	 * Modelo para la tabla magister
	 * Estructura de la tabla:
	 * 		cod_mg 			TINYINT(4)
	 *		nombre_mg			VARCHAR(65)
	 */
	Class Magister{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Crear una entrada en la tabla
		public function createMagister($nombre){
			$this->db->query("INSERT INTO magister(nombre_mg) VALUES (:nombre)");

			$this->db->bind(':nombre', $nombre);

			$this->db->execute();
		}

		//Crear una entrada en la tabla y devolver el ID de creación
		public function createMagisterReturnID($nombre){
			$this->db->query("INSERT INTO magister(nombre_mg) VALUES (:nombre)");

			$this->db->bind(':nombre', $nombre);

			$this->db->execute();

			return $this->db->lastInsertId();
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
			$this->db->query("UPDATE magister SET nombre_mg=:nombre WHERE cod_mg=:id");

			$this->db->bind(':id', $id);
			$this->db->bind(':nombre', $nombre);


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