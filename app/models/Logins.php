<?php 
	/**
	 * Modelo de usuarios para loggearse (solo para pruebas)
	 * Estructura de la tabla:
	 *		id_login 	INT
	 *		usuario 	VARCHAR(45)
	 * 		pass 		VARCHAR(60)
	 * 		nombre 		VARCHAR(120)
	 * 		rol 		VARCHAR(10)
	 *		key 		VARCHAR(120);
	 *
	 */
	Class Logins{
		private $db;
		private $config;

		//Constructor
		public function __construct($config){
			$this->config = $config;

			$this->db = new Database($this->config);
		}

		//Buscamos al usuario por su usuario y constraseña y retornamos sus datos
		public function getUsuarioKey($user, $pass){
			$this->db->query("SELECT `id_login`, `nombre`, `rol`, `key` FROM logins WHERE usuario=:user AND pass=:pass");

			$this->db->bind(':user', $user);
			$this->db->bind(':pass', $pass);

			return $this->db->single();
		}

		//obtenemos el usuario por su KEY
		public function getUsuarioByKey($llave){
			$this->db->query("SELECT * FROM `logins` WHERE `key`=:llave");

			$this->db->bind(':llave', $llave);

			return $this->db->single();	
		}

		//obtenemos el usuario por su id
		public function getUsuarioById($id){
			$this->db->query("SELECT * FROM `logins` WHERE `id_login`=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();	
		}

	}
 ?>