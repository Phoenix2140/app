<?php 
	/**
	 * Modelo para la base de dato laboratorio
	 * Estructura de la tabla:
	 *		cod_lab		MEDIUMINT(9)
	 *		des_lab 	VARCHAR(60)
	 */
	Class Laboratorio{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Crear una laboratorio
		public function createLaboratorio($descripcion){
			$this->db->query("INSERT INTO laboratorio (des_lab) VALUES (:descripcion)");

			$this->db->bind(':descripcion', $descripcion);

			$this->db->execute();

			//TODO: consultar si desean el ID como retorno
		}

		//Crear una laboratorio y retorna su ID
		public function createLaboratorioReturnID($descripcion){
			$this->db->query("INSERT INTO laboratorio (des_lab) VALUES (:descripcion)");

			$this->db->bind(':descripcion', $descripcion);

			$this->db->execute();

			return $this->db->lastInsertId();
		}

		//Obtener las laboratorios
		public function getLaboratorio(){
			$this->db->query("SELECT * FROM laboratorio");

			return $this->db->resultSet();
		}

		//Obtener una laboratorio por su ID
		public function getLaboratorioById($id){
			$this->db->query("SELECT * FROM laboratorio WHERE cod_lab=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();
		}


		//Editar una línea
		public function editLaboratorioById($id, $descripcion){
			$this->db->query("UPDATE laboratorio SET des_lab=:descripcion WHERE cod_lab=:id");

			$this->db->bind(':id', $id);
			$this->db->bind(':descripcion', $descripcion);

			$this->db->execute();
		}

		//ELiminar una laboratorio por su ID
		public function deleteLaboratorioById($id){
			$this->db->query("DELETE FROM laboratorio WHERE cod_lab=:id");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}
	}

 ?>