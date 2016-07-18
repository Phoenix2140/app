<?php 
	/**
	 * Modelo para la tabla lab_rep
	 * Estructura de la tabla
	 * 		fecha_ads		DATE
	 *		rut_part		VARCHAR(30)
	 * 		cod_lab			MEDIUMINT(9)
	 *		cod_resp		TINYINT(4)
	 *		fecha_ter		DATE
	 */
	Class LabRep{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Ingresar nueva entrada
		public function createLabRep($fecha, $rut, $laboratorio, $resp, $termino){
			$this->db->query("INSERT INTO lab_rep( fecha_ads, rut_part, cod_lab, cod_resp, fecha_ter) 
				VALUES (:fecha, :rut, :laboratorio, :resp, :termino)");

			$this->db->bind(':fecha', $fecha);
			$this->db->bind(':rut', $rut);
			$this->db->bind(':laboratorio', $laboratorio);
			$this->db->bind(':resp', $resp);
			$this->db->bind(':termino', $termino);

			$this->db->execute();

		}

		//obtener datos de la tabla
		public function getLabRep(){
			$this->db->query("SELECT * FROM lab_rep");

			return $this->db->resultSet();
		}

		//editar datos por la fecha
		public function editLabRepByDate($fecha, $rut, $laboratorio, $resp, $termino){
			$this->db->query("UPDATE lab_rep SET rut_part=:rut, 
				cod_lab=:laboratorio, cod_resp=:resp, fecha_ter=:termino WHERE fecha_ads=:fecha");

			$this->db->bind(':fecha', $fecha);
			$this->db->bind(':rut', $rut);
			$this->db->bind(':laboratorio', $laboratorio);
			$this->db->bind(':resp', $resp);
			$this->db->bind(':termino', $termino);

			$this->db->execute();
		}

		//eliminar una entrada por su fecha
		public function deleteLabRepByDate($fecha){
			$this->db->query("DELETE FROM lab_rep WHERE fecha_ads=:fecha");

			$this->db->bind(':fecha', $fecha);

			$this->db->execute();
		}

	}
 ?>