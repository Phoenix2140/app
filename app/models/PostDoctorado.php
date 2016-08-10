<?php 
	/**
	 * Modelo para la tabla post_doctorados
	 * Estructura de la tabla:
	 *		cod_postdoc			TINYINT(4)
	 *		nombre_postdoc		VARCHAR(40)
	 *		origen 				VARCHAR(25)
	 */
	Class PostDoctorado{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Crear entrada post_doctorados
		public function createPostDoct($nombre, $origen){
			$this->db->query("INSERT INTO post_doctorados(nombre_postdoc, origen) VALUES (:nombre, :origen)");

			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':origen', $origen);

			$this->db->execute();
		}

		//Crear entrada post_doctorados y retornar su ID
		public function createPostDoctReturnId($nombre, $origen){
			$this->db->query("INSERT INTO post_doctorados(nombre_postdoc, origen) VALUES (:nombre, :origen)");

			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':origen', $origen);

			$this->db->execute();

			return $this->db->lastInsertId();
		}

		//obtener entradas de post_doctorados
		public function getPostDoct(){
			$this->db->query("SELECT * FROM post_doctorados");

			return $this->db->resultSet();
		}

		//Obtener entrada por ID de post_doctorados
		public function getPostDoctById($id){
			$this->db->query("SELECT * FROM post_doctorados WHERE cod_postdoc=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();
		}

		//Actualizar entrada por su ID de post_doctorados
		public function updatePostDoctById($id, $nombre, $origen){
			$this->db->query("UPDATE post_doctorados SET nombre_postdoc=:nombre, 
				origen=:origen WHERE cod_postdoc=:id");

			$this->db->bind(':id', $id);
			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':origen', $origen);

			$this->db->execute();
		}

		//Eliminar entrada por su ID
		public function deletePostDoctById($id){
			$this->db->query("DELETE FROM post_doctorados WHERE cod_postdoc=:id");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}
	}

 ?>