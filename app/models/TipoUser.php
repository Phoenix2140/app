<?php 
	/**
	 * Modelo para la tabla tipo_user
	 * Estructura de la tabla:
	 *		cod_user 	TINYINT(4)
	 *		desc_user	VARCHAR(20)
	 */
	Class TipoUser{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//crear entrada en tipo_user
		public function createTipoUser($descripcion){
			$this->db->query("INSERT INTO tipo_user(desc_user) VALUES (:descripcion)");

			$this->db->bind(':descripcion', $descripcion);

			$this->db->execute();
		}

		//obtener entradas de tipo_user
		public function getTipoUser(){
			$this->db->query("SELECT * FROM tipo_user");

			return $this->db->resultSet();
		}

		//obtener entrada de tipo_user por su ID
		public function getTipoUserById($id){
			$this->db->query("SELECT * FROM tipo_user WHERE cod_user=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();
		}

		//actualizar una entrada por su ID
		public function updateTipoUserById($id, $descripcion){
			$this->db->query("UPDATE tipo_user SET desc_user=:descripcion WHERE cod_user=:id");

			$this->db->bind(':id', $id);
			$this->db->bind(':descripcion', $descripcion);

			$this->db->execute();
		}

		//eliminar una entrada por su ID
		public function deleteTipoUserById($id){
			$this->db->query("DELETE FROM tipo_user WHERE cod_user=:id");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}
	}

 ?>