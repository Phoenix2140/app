<?php 
	/**
	 * Modelo para la base de dato laboratorio
	 * Estructura de la tabla:
	 *		cod_lab			MEDIUMINT(9)
	 *		des_lab 		VARCHAR(60)
	 *		nom_encargado 	VARCHAR(100)
	 */
	Class Laboratorio{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Crear una laboratorio
		public function createLaboratorio($descripcion, $encargado){
			$this->db->query("INSERT INTO laboratorio (des_lab, nom_encargado) 
				VALUES (:descripcion, :encargado)");

			$this->db->bind(':descripcion', $descripcion);
			$this->db->bind(':encargado', $encargado);

			$this->db->execute();

			//TODO: consultar si desean el ID como retorno
		}

		//Crear una laboratorio y retorna su ID
		public function createLaboratorioReturnID($descripcion, $encargado){
			$this->db->query("INSERT INTO laboratorio (des_lab, nom_encargado) 
				VALUES (:descripcion, :encargado)");

			$this->db->bind(':descripcion', $descripcion);
			$this->db->bind(':encargado', $encargado);

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
		public function editLaboratorioById($id, $descripcion, $encargado){
			$this->db->query("UPDATE laboratorio SET des_lab=:descripcion, nom_encargado=:encargado 
				WHERE cod_lab=:id");

			$this->db->bind(':id', $id);
			$this->db->bind(':descripcion', $descripcion);
			$this->db->bind(':encargado', $encargado);

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