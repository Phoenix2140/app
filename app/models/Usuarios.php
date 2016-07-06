<?php 
	/**
	 * Modelo de la tabla usuario
	 *  la estructura es la siguiente:
	 *		rut 				varchar(30)
  	 *		nombre 				varchar(10)
  	 *		pass 				varchar(10)
  	 *		ap_pat 				varchar(15)
  	 *		ap_mat 				varchar(15)
  	 *		cod_prof 			tinyint(4)
  	 *		cod_mg 				tinyint(4)
  	 *		cod_doct 			tinyint(4)
  	 *		cod_postdoct 		tinyint(4)
  	 *		cod_user 			tinyint(4)
  	 *		email 				varchar(60)
  	 *		telefono 			varchar(13)
  	 *		fecha-nac  			date 
  	 *		fecha-contratacion 	date 
  	 *		key 				varchar(10)
	 */

	Class Usuarios{
		private $config;	//Objeto que contiene las configuraciones
		private $db;		//Objeto para la gestión de base de datos

		/**
		 * Constructor de la clase Modelo
		 */
		public function __construct($config){
			$this->config = $config;

			$this->db = new Database($this->config);
		}

		/**
		 * Función que ingresa un nuevo usuario a la base de datos
		 */
		public function crearUsuario( $rut, $nombre, $pass, $ap_pat, 
			$ap_mat, $cod_prof, $cod_mg, $cod_doct, $cod_postdoct, 
			$cod_user, $email, $telefono, $fecha_nac, $fecha_contratacion){

			$this->db->query("INSERT INTO usuario( rut, nombre, pass, ap_pat, 
				ap_mat, cod_prof, cod_mg, cod_doct, cod_postdoct, cod_user, 
				email, telefono, fecha-nac, fecha-contratacion, key)
			 	VALUES (:rut, :nombre, :pass, :ap_pat, :ap_mat, :cod_prof, 
			 		:cod_mg, :cod_doct, : cod_postdoct, :cod_user, :email, 
			 		:telefono, :fecha_nac, :fecha_contratacion, :key)");

			$this->db->bind(':rut', $rut);
			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':pass', $pass);
			$this->db->bind(':ap_pat', $ap_pat);
			$this->db->bind(':ap_mat', $ap_mat);
			$this->db->bind(':cod_prof', $cod_prof);
			$this->db->bind(':cod_mg', $cod_mg);
			$this->db->bind(':cod_doct', $cod_doct);
			$this->db->bind(':cod_postdoct', $cod_postdoct);
			$this->db->bind(':cod_user', $cod_user);
			$this->db->bind(':email', $email);
			$this->db->bind(':telefono', $telefono);
			$this->db->bind(':fecha_nac', $fecha_nac);
			$this->db->bind(':fecha_contratacion', $fecha_contratacion);
			$this->db->bind(':key', md5($email).md5(time()));

			$this->db->execute();

		}

		/**
		 * Función que retorna el nombre y la llave de usuario
		 * con su usuario y contraseña
		 */
		public function getLogin($rut, $pass){
			$this->db->query("SELECT nombre, key FROM usuario WHERE rut=:rut AND pass=:pass");

			$this->db->bind(':rut', $rut);
			$this->db->bind(':pass', $pass);

			return $this->db->single();
		}

		/**
		 * Función que obtiene el usuario por su llave (key)
		 */
		public function getUsuarioKey($key){
			$this->db->query("SELECT * FROM usuario WHERE key=:key");

			$this->db->bind('key', $key);

			return $this->db->single();
		}

	}
 ?>