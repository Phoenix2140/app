<?php 
	/**
	 * Modelo para la tabla linea_rep
	 * estructura de la tabla:
	 * 		fecha_adscripcion	DATE
	 *		rut	VARCHAR(30)
	 *		cod_linea			MEDIUMINT(9)
	 * 		cod_resp			TINYINT(4)
	 */
	Class LineaRep{
		private $db;

		public function __construct($config){
			$this->db = new Database($config);
		}

		//Crear LineRep
		public function createLineaRep($fecha, $rut, $linea, $resp){
			$this->db->query("INSERT INTO linea_rep (fecha_adscripcion, rut, 
				cod_linea, cod_resp) VALUES (:fecha, :rut, :linea, :resp)");

			$this->db->bind(':fecha', $fecha);
			$this->db->bind(':rut', $rut);
			$this->db->bind(':linea', $linea);
			$this->db->bind(':resp', $resp);

			$this->db->execute();
		}

		//ObtenerLineaRep
		public function getAllLineaRep(){
			$this->db->query("SELECT * FROM linea_rep");

			return $this->db->resultSet();
		}

		//ObtenerLineaRep
		public function getLineaRepByDate($fecha){
			$this->db->query("SELECT * FROM linea_rep WHERE fecha_adscripcion=:fecha");

			$this->db->bind(':fecha', $fecha);

			return $this->db->single();
		}

		//Editar LineaRep
		public function editLineaRepByDate($fecha, $rut, $linea, $resp){
			$this->db->query("UPDATE linea_rep SET rut=:rut, cod_linea=:linea, 
				cod_resp=:resp WHERE fecha_adscripcion=:fecha");

			$this->db->bind(':fecha', $fecha);
			$this->db->bind(':rut', $rut);
			$this->db->bind(':linea', $linea);
			$this->db->bind(':resp', $resp);

			$this->db->execute();
		}

		//EliminarLineaRep
		public function deleteLineaRepByDate($fecha){
			$this->db->query("DELETE FROM linea_rep WHERE fecha_adscripcion=:fecha");

			$this->db->bind(':fecha', $fecha);

			$this->db->execute();
		}
	}
 ?>