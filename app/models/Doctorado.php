<?php 
	/**
	 * Modelo para la tabla doctorados
	 * Estructura de la tabla
	 * 		cod_doct 	TINYINT(4)
	 * 		nombre_doct	VARCHAR(90)
	 */
	Class Doctorado{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Crear entrada en la tabla
		public function createDoctorado($nombre){
			$this->db->query("INSERT INTO doctorados(nombre_doct) VALUES (:nombre)");

			$this->db->bind(':nombre', $nombre);

			$this->db->execute();
		}

		//Crear entrada en la tabla
		public function createDoctoradoReturnId($nombre){
			$this->db->query("INSERT INTO doctorados(nombre_doct) VALUES (:nombre)");

			$this->db->bind(':nombre', $nombre);

			$this->db->execute();

			return $this->db->lastInsertId();
		}

		//Obtener los datos del doctorado
		public function getDoctorado(){
			$this->db->query("SELECT * FROM doctorados");

			return $this->db->resultSet();
		}

		//Obtener datos del doctorado por su ID
		public function getDoctoradoById($id){
			$this->db->query("SELECT * FROM doctorados WHERE cod_doct=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();
		}

		//Actualizar los datos por su ID
		public function updateDoctoradoById($id, $nombre){
			$this->db->query("UPDATE doctorados SET nombre_doct=:nombre WHERE cod_doct=:id");

			$this->db->bind(':id', $id);
			$this->db->bind(':nombre', $nombre);

			$this->db->execute();
		}

		//Eliminar entrada por su ID
		public function deleteDoctoradoById($id){
			$this->db->query("DELETE FROM doctorados WHERE cod_doct=:id");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}
	}

 ?>