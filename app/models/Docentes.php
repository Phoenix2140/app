<?php 
	/**
	 * Modelo para la tabla Docentes
	 * Estructura de la tabla:
	 *		rut 						VARCHAR(45)
	 *		nombre 						VARCHAR(45)
	 *		ap_pat						VARCHAR(45)
	 *		ap_mat 						VARCHAR(45)
	 *		email 						VARCHAR(45)
	 *		telefono 					VARCHAR(45)
	 *		fecha_contratacion 			VARCHAR(45)
	 *		docentecol					VARCHAR(45) ?? Verificar columna
	 *		extranjero					BOOL
	 *		estado						BOOL
	 *		cod_postdoc					TINYINT
	 *		cod_doct					TINYINT
	 *		cod_mg 						TINYINT
	 *		cod_tipo_profesor 			TINYINT
	 *		cod_jerarquia 				TINYINT
	 *		cod_prof 					TINYINT(4)
	 */
	Class Docentes{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}


		//Crear Docente
		public function createDocente($rut, $nombre, $appat, $apmat, $email, 
			$fono, $fecha, $docente, $extranjero, $estado, $postdoc, $doct, 
			$mg, $profesor, $jerarquia, $prof){
			
			$this->db->query("INSERT INTO docentes(rut, nombre, ap_pat, ap_mat, 
				email, telefono, fecha_contratacion, docentecol, extranjero, 
				estado, cod_postdoc, cod_doct, cod_mg, cod_tipo_profesor, 
				cod_jerarquia, cod_prof) VALUES (:rut, :nombre, :appat, :apmat, 
				:email, :fono, :fecha, :docente, :extranjero, :estado, :postdoc, 
				:doct, :mg, :profesor, :jerarquia, :prof)");

			$this->db->bind(":rut", $rut);
			$this->db->bind(":nombre", $nombre);
			$this->db->bind(":appat", $appat);
			$this->db->bind(":apmat", $apmat);
			$this->db->bind(":email", $email);
			$this->db->bind(":fono", $fono);
			$this->db->bind(":fecha", $fecha);
			$this->db->bind(":docente", $docente);
			$this->db->bind(":extranjero", $extranjero);
			$this->db->bind(":estado", $estado);
			$this->db->bind(":postdoc", $postdoc);
			$this->db->bind(":doct", $doct);
			$this->db->bind(":mg", $mg);
			$this->db->bind(":profesor", $profesor);
			$this->db->bind(":jerarquia", $jerarquia);
			$this->db->bind(":prof", $prof);

			$this->db->execute();
		}

		//Crear Docente y retornar ID
		public function createDocenteReturnId($rut, $nombre, $appat, $apmat, $email, 
			$fono, $fecha, $docente, $extranjero, $estado, $postdoc, $doct, 
			$mg, $profesor, $jerarquia, $prof){

			$this->createDocente($rut, $nombre, $appat, $apmat, $email, 
			$fono, $fecha, $docente, $extranjero, $estado, $postdoc, $doct, 
			$mg, $profesor, $jerarquia, $prof);

			return $this->db->lastInsertId();
		}

		//Obtener datos de docentes
		public function getDocentes(){
			$this->db->query("SELECT * FROM docentes");

			return $this->db->resultSet();
		}

		//Obtenemos los datos de un docente por su id(rut)
		public function getDocenteByRut($rut){
			$this->db->query("SELECT * FROM docentes WHERE rut=:rut");

			$this->db->bind(":rut", $rut);

			return $this->db->single();
		}

		//Actualizar los datos de un docente por su rut
		public function updateDocenteByRut($rut, $nombre, $appat, $apmat, $email, 
			$fono, $fecha, $docente, $postdoc, $doct, 
			$mg, $profesor, $jerarquia, $prof){
			$this->db->query("UPDATE docentes SET rut=:rut, nombre=:nombre, ap_pat=:appat, ap_mat=:apmat, 
				email=:email, telefono=:fono, fecha_contratacion=:fecha, docentecol=:docente,  
				cod_postdoc=:postdoc, cod_doct=:doct, cod_mg=:mg, cod_tipo_profesor=:profesor, 
				cod_jerarquia=:jerarquia, cod_prof=:prof WHERE rut=:rut");

			$this->db->bind(":rut", $rut);
			$this->db->bind(":nombre", $nombre);
			$this->db->bind(":appat", $appat);
			$this->db->bind(":apmat", $apmat);
			$this->db->bind(":email", $email);
			$this->db->bind(":fono", $fono);
			$this->db->bind(":fecha", $fecha);
			$this->db->bind(":docente", $docente);
			$this->db->bind(":extranjero", $extranjero);
			// $this->db->bind(":estado", $estado);
			$this->db->bind(":postdoc", $postdoc);
			$this->db->bind(":doct", $doct);
			$this->db->bind(":mg", $mg);
			$this->db->bind(":profesor", $profesor);
			$this->db->bind(":jerarquia", $jerarquia);
			$this->db->bind(":prof", $prof);

			$this->db->execute();
		}

		//Desactivar un docente por su Rut
		public function disableDocenteByRut($rut){
			$this->db->query("UPDATE docentes SET estado=:estado WHERE rut=:rut");

			$this->db->bind(":rut", $rut);
			$this->db->bind(":estado", false);

			$this->db->execute();
		}

		//Eliminar un docente por Rut
		public function deleteDocenteByRut($rut){
			$this->db->query("DELETE FROM docentes WHERE rut=:rut");

			$this->db->bind(":rut", $rut);

			$this->db->execute();
		}
	}
 ?>