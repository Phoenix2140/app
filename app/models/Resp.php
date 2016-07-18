<?php 
	/**
	 * Modelo para la tabla resp
	 * estructura de la tabla:
	 *		cod_resp			TINYINT(4)
	 *		descripcion_resp	VARCHAR(255)
	 */
	Class Resp{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Crear una resp
		public function createResp($descripcion){
			$this->db->query("INSERT INTO resp (descripcion_resp) VALUES (:descripcion)");

			$this->db->bind(':descripcion', $descripcion);

			$this->db->execute();

			//TODO: consultar si desean el ID como retorno
		}

		//Crear una resp y retorna su ID
		public function createRespReturnID($descripcion){
			$this->db->query("INSERT INTO resp (descripcion_resp) VALUES (:descripcion)");

			$this->db->bind(':descripcion', $descripcion);

			$this->db->execute();

			return $this->db->lastInsertId();
		}

		//Obtener las resps
		public function getResp(){
			$this->db->query("SELECT * FROM resp");

			return $this->db->resultSet();
		}

		//Obtener una resp por su ID
		public function getRespById($id){
			$this->db->query("SELECT * FROM resp WHERE cod_resp=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();
		}


		//Editar una línea
		public function editRespById($id, $descripcion){
			$this->db->query("UPDATE resp SET descripcion_resp=:descripcion WHERE cod_resp=:id");

			$this->db->bind(':id', $id);
			$this->db->bind(':descripcion', $descripcion);

			$this->db->execute();
		}

		//ELiminar una resp por su ID
		public function deleteRespById($id){
			$this->db->query("DELETE FROM resp WHERE cod_resp=:id");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}
	}
 ?>