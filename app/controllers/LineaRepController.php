<?php 
	/**
	 * Controlador para el Modelo LineaRep
	 */
	Class LineaRepController{
		//TODO: Revisar bien la tabla de este controlador, para verificar su ID
		private $config;
		private $linearep;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			require_once($this->config->get('modelsDir').'LineaRep.php');
			$this->linearep = new LineaRep($this->config);

			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();

		}

		//Obtener la lista de LienaRep
		public function getLineRepList($key){
			if ($this->comprobarValor($key)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$contador = 0;
					$data = array();

					foreach ($this->linearep->getAllLineaRep() as $lrep) {
						$data[$contador]["fecha_adscripcion"] = $lrep["fecha_adscripcion"];
						$data[$contador]["rut_participante"] = utf8_encode($lrep["rut_participante"]);
						$data[$contador]["cod_linea"] = $lrep["cod_linea"];
						$data[$contador]["cod_resp"] = $lrep["cod_resp"];
						$data[$contador]["fecha_ter"] = $lrep["fecha_ter"];

						++$contador;
					}

					echo json_encode(array('return' => true, 'linearep' => $data));
				} else {
					
					$this->msgController->invalidKey();
				}
				
			} else {
				
				$this->msgController->nullKey();
			}
			
		}

		//obtener entrada de LineaRep por su Fecha
		public function getLineaRepId($key, $fecha){
			if ( $this->comprobarValor($key) && $this->comprobarValor($fecha)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$data = $this->linearep->getLineaRepByDate($fecha);

					$data["rut_participante"] = utf8_encode($data["rut_participante"]);

					echo json_encode(array('return' => true, 'linearep' => $data));
				} else {
					
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoId();
			}
			
		}

		//Crear entrada LineaRep
		public function createLineaRep($post){
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"])) 
				&& (isset($post["inicio"]) && $this->comprobarValor($post["inicio"])) 
				&& (isset($post["rut"]) && $this->comprobarValor($post["rut"])) 
				&& (isset($post["linea"]) && $this->comprobarValor($post["linea"])) 
				&& (isset($post["resp"]) && $this->comprobarValor($post["resp"])) 
				&& (isset($post["termino"]) && $this->comprobarValor($post["termino"]))) {
				
				$user = $this->authKey->comprobarAuth($post["key"]);

				if ($user["return"]) {
					$data = $this->linearep->getLineaRepByDate($post["inicio"]);

					if(!isset($data["fecha_adscripcion"])){
						$this->linearep->createLineaRep( $post["inicio"], $post["rut"], 
							$post["linea"], $post["resp"], $post["termino"]);

						$data = $this->linearep->getLineaRepByDate($post["inicio"]);
						$data["rut_participante"] = utf8_encode($data["rut_participante"]);

						echo json_encode(array('return' => true, 'linearep' => $data));

					}else{
						$this->msgController->dateExist();
					}

				} else {
					
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Editar LienaRep por su Id
		public function updateLineaRep($put){
			if ( (isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["inicio"]) && $this->comprobarValor($put["inicio"])) 
				&& (isset($put["rut"]) && $this->comprobarValor($put["rut"])) 
				&& (isset($put["linea"]) && $this->comprobarValor($put["linea"])) 
				&& (isset($put["resp"]) && $this->comprobarValor($put["resp"])) 
				&& (isset($put["termino"]) && $this->comprobarValor($put["termino"]))) {
				
				$user = $this->authKey->comprobarAuth($put["key"]);

				if ($user["return"]) {

					$data = $this->linearep->getLineaRepByDate($put["inicio"]);

					if(isset($data["fecha_adscripcion"]) && $data["fecha_adscripcion"] == $put["inicio"]){
						
						$this->linearep->editLineaRepByDate( $put["inicio"], $put["rut"], 
							$put["linea"], $put["resp"], $put["termino"]);

						$this->msgController->successUpdate();

					}else{
						$this->msgController->dateDoesNotExist();
					}
				} else {

					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Eliminar LineaRep por su ID
		public function deleteLineaRep($delete){
			if ( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) 
				&& (isset($delete["fecha"]) && $this->comprobarValor($delete["fecha"]))) {
				
				$user = $this->authKey->comprobarAuth($delete["key"]);

				if ($user["return"]) {
					
					$this->linearep->deleteLineaRepByDate($delete["fecha"]);

					$this->msgController->successDelete();
				} else {

					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoId();
			}
			
		}

		//Función para comprobar que la variable de llegada no esté vacía
		private function comprobarValor($valor){
			if (isset($valor) && !is_null($valor) && $valor != "") {
				return true;
			} else {
				return false;
			}
		}
	}
 ?>