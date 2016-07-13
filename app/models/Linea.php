<?php 
	/**
	 * Modelo para tabla Linea
	 * Estructura de la tabla:
	 * 		cod_linea 		MEDIUMINT(9)
	 *		nom_linea 		VARCHAR(255)
	 */
	Class Linea{
		private $db;

		//constructor
		public function __construct($config){
			$this->db = new Database($config);
		}
		
		//Crear una linea
		public function crearLinea($nombre){
			$this->db->query("INSERT INTO linea (nom_linea) VALUES (:nombre)");

			$this->db->bind(':nombre', $nombre);

			$this->db->execute();

			//TODO: consultar si desean el ID como retorno
		}

		//Crear una linea
		public function crearLineaRetornarId($nombre){
			$this->db->query("INSERT INTO linea (nom_linea) VALUES (:nombre)");

			$this->db->bind(':nombre', $nombre);

			$this->db->execute();

			return $this->db->lastInsertId();
		}

		//Obtener las lineas
		public function getLineas(){
			$this->db->query("SELECT * FROM linea");

			return $this->db->resultSet();
		}

		//Obtener una linea por su ID
		public function getLineaId($id){
			$this->db->query("SELECT * FROM linea WHERE cod_linea=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();
		}


		//Editar una línea
		public function editarLineaId($id, $nombre){
			$this->db->query("UPDATE linea SET nom_linea=:nombre WHERE cod_linea=:id");

			$this->db->bind(':id', $id);
			$this->db->bind(':nombre', $nombre);

			$this->db->execute();
		}

		//ELiminar una linea por su ID
		public function delLineaId($id){
			$this->db->query("DELETE FROM linea WHERE cod_linea=.id");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}
	}
 ?>