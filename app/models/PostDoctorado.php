<?php 
	/**
	 * Modelo para la tabla post_doctorado
	 * Estructura de la tabla:
	 *		cod_postdoct		TINYINT(4)
	 *		nom_postdoct		VARCHAR(40)
	 *		origen 				VARCHAR(25)
	 */
	Class PostDoctorado{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Crear entrada post_doctorado
		public function createPostDoct($nombre, $origen){
			$this->db->query("INSERT INTO post_doctorado(nom_postdoct, origen) VALUES (:nombre, :origen)");

			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':origen', $origen);

			$this->db->execute();
		}

		//Crear entrada post_doctorado y retornar su ID
		public function createPostDoctReturnId($nombre, $origen){
			$this->db->query("INSERT INTO post_doctorado(nom_postdoct, origen) VALUES (:nombre, :origen)");

			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':origen', $origen);

			$this->db->execute();

			return $this->db->lastInsertId();
		}

		//obtener entradas de post_doctorado
		public function getPostDoct(){
			$this->db->query("SELECT * FROM post_doctorado");

			return $this->db->resultSet();
		}

		//Obtener entrada por ID de post_doctorado
		public function getPostDoctById($id){
			$this->db->query("SELECT * FROM post_doctorado WHERE cod_postdoct=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();
		}

		//Actualizar entrada por su ID de post_doctorado
		public function updatePostDoctById($id, $nombre, $origen){
			$this->db->query("UPDATE post_doctorado SET nom_postdoct=:nombre, 
				origen=:origen WHERE cod_postdoct=:id");

			$this->db->bind(':id', $id);
			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':origen', $origen);

			$this->db->execute();
		}

		//Eliminar entrada por su ID
		public function deletePostDoctById($id){
			$this->db->query("DELETE FROM post_doctorado WHERE cod_postdoct=:id");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}
	}

 ?>