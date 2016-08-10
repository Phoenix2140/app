<?php 
	/**
	 * Modelo de la tabla usuario
	 *  la estructura es la siguiente:
	 *		rut 				varchar(30)
  	 *		nombre 				varchar(10)
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
		public function crearUsuario( $rut, $nombre, $ap_pat, 
			$ap_mat, $cod_prof, $cod_mg, $cod_doct, $cod_postdoct, 
			$cod_user, $email, $telefono, $fecha_nac, $fecha_contratacion){

			$this->db->query("INSERT INTO usuario( rut, nombre, ap_pat, 
				ap_mat, cod_prof, cod_mg, cod_doct, cod_postdoct, cod_user, 
				email, telefono, fecha-nac, fecha-contratacion)
			 	VALUES (:rut, :nombre, :ap_pat, :ap_mat, :cod_prof, 
			 		:cod_mg, :cod_doct, : cod_postdoct, :cod_user, :email, 
			 		:telefono, :fecha_nac, :fecha_contratacion)");

			$this->db->bind(':rut', $rut);
			$this->db->bind(':nombre', $nombre);
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

			$this->db->execute();

		}

		/**
		 * Función que ingresa un nuevo usuario a la base de datos y retorna el ID de su Creación
		 */
		public function crearUsuarioReturnId( $rut, $nombre, $ap_pat, 
			$ap_mat, $cod_prof, $cod_mg, $cod_doct, $cod_postdoct, 
			$cod_user, $email, $telefono, $fecha_nac, $fecha_contratacion){

			$this->db->query("INSERT INTO usuario( rut, nombre, ap_pat, 
				ap_mat, cod_prof, cod_mg, cod_doct, cod_postdoct, cod_user, 
				email, telefono, fecha-nac, fecha-contratacion)
			 	VALUES (:rut, :nombre, :ap_pat, :ap_mat, :cod_prof, 
			 		:cod_mg, :cod_doct, : cod_postdoct, :cod_user, :email, 
			 		:telefono, :fecha_nac, :fecha_contratacion)");

			$this->db->bind(':rut', $rut);
			$this->db->bind(':nombre', $nombre);
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

			$this->db->execute();

			return $this->db->lastInsertId();

		}

		/**
		 * Obtener todos los usuarios
		 */
		public function getUsuario(){
			$this->db->query("SELECT * FROM usuario");

			return $this->db->resultSet();
		}

		/**
		 * Obtener un usuario por su ID
		 */
		public function getUsuarioById($id){
			$this->db->query("SELECT * FROM usuario WHERE rut=:id");

			$this->db->bind(':id', $id);

			return $this->db->single();
		}

		/**
		 * Editar un usuario por su ID
		 */
		public function updateUsuarioById($rut, $nombre, $ap_pat, 
			$ap_mat, $cod_prof, $cod_mg, $cod_doct, $cod_postdoct, 
			$cod_user, $email, $telefono, $fecha_nac, $fecha_contratacion){

			$this->db->query("UPDATE usuario SET nombre=:nombre, ap_pat=:ap_pat, 
				ap_mat=:ap_mat, cod_prof=:cod_prof, cod_mg=:cod_mg, cod_doct=:cod_doct, 
				cod_postdoct=:cod_postdoct, cod_user=:cod_user, email=:email, 
				telefono=:telefono, fecha-nac=:fecha_nac, 
				fecha-contratacion=:fecha_contratacion WHERE rut=:rut");

			$this->db->bind(':rut', $rut);
			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':ap_pat', $ap_pat);
			$this->db->bind(':ap_mat', $ap_mat);
			$this->db->bind(':cod_prof', $cod_prof);
			$this->db->bind(':cod_mg', $cod_mg);
			$this->db->bind(':cod_doct', $cod_doct);
			$this->db->bind(':cod_postdoct', $cod_postdoct);
			$this->db->bind(':cod_user', $cod_user);
			$this->db->bind(':email', $email);
			$this->db->bind(':telefono', $telefono);
			$this->db->bind(':fecha_contratacion', $fecha_contratacion);
			$this->db->bind(':fecha_nac', $fecha_nac);

			$this->db->execute();
		}

		/**
		 * Eliminar un usuario por su ID
		 */
		public function deleteUsuarioById($id){
			$this->db->query("DELETE FROM usuario WHERE rut=:id ");

			$this->db->bind(':id', $id);

			$this->db->execute();
		}

	}
 ?>