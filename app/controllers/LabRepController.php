<?php 
	/**
	 * Controlador para el modelo LabRep
	 */
	Class LabRepController{
		private $config;
		private $labrep;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			require_once($this->config->get('modelsDir').'LabRep.php');
			$this->labrep = new LabRep($this->config);

			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();
		}

		//Obtener lista de LabRep
		public function getLabRepList($key){
			if ($this->comprobarValor($key)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					$contador = 0;
					$data = array();

					foreach ($this->labrep->getLabRep() as $lab) {
						$data[$contador]["fecha_ads"] = $lab["fecha_ads"];
						$data[$contador]["rut_part"] = utf8_encode($lab["rut_part"]);
						$data[$contador]["cod_lab"] = $lab["cod_lab"];
						$data[$contador]["cod_resp"] = $lab["cod_resp"];
						$data[$contador]["fecha_ter"] = $lab["fecha_ter"];

						++$contador;
					}

					echo json_encode(array('return' => true, 'labrep' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullKey();
			}
			
		}

		//Obtener una entrada de LabRep por su ID
		public function getLabRep($key, $id){
			if ( $this->comprobarValor($key) && $this->comprobarValor($id)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$data = $this->labrep->getLabRepByDate($id);
					$data["rut_part"] = utf8_encode($data["rut_part"]);

					echo json_encode(array('return' => true, 'labrep' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoId();
			}
			
		}

		//Crear una entrada de LabRep
		public function createLabRep($post){
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"])) 
				&& (isset($post["inicio"]) && $this->comprobarValor($post["inicio"])) 
				&& (isset($post["rut"]) && $this->comprobarValor($post["rut"])) 
				&& (isset($post["laboratorio"]) && $this->comprobarValor($post["laboratorio"])) 
				&& (isset($post["resp"]) && $this->comprobarValor($post["resp"])) 
				&& (isset($post["termino"]) && $this->comprobarValor($post["termino"]))) {
				
				$user = $this->authKey->comprobarAuth($post["key"]);

				if ($user["return"]) {
					
					$lab = $this->labrep->getLabRepByDate($post["inicio"]);
					
					if (!isset($lab["fecha_ads"])) {
						$id = $this->labrep->createLabRepReturnId( $post["inicio"], $post["rut"], 
							$post["laboratorio"], $post["resp"], $post["termino"]);

						$data = $this->labrep->getLabRepByDate($post["inicio"]);
						$data["rut_part"] = utf8_encode($data["rut_part"]);

						echo json_encode(array('return' => true, 'labrep' => $data));
					} else {
						$this->msgController->dateExist();
					}
					
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Editar una entrada de LabRep por su ID
		public function updateLabRep($put){
			if ( (isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["inicio"]) && $this->comprobarValor($put["inicio"])) 
				&& (isset($put["rut"]) && $this->comprobarValor($put["rut"])) 
				&& (isset($put["laboratorio"]) && $this->comprobarValor($put["laboratorio"])) 
				&& (isset($put["resp"]) && $this->comprobarValor($put["resp"])) 
				&& (isset($put["termino"]) && $this->comprobarValor($put["termino"]))) {
				
				$user = $this->authKey->comprobarAuth($put["key"]);

				if ($user["return"]) {

					$lab = $this->labrep->getLabRepByDate($put["inicio"]);
					
					if (isset($lab["fecha_ads"])) {

						$this->labrep->editLabRepByDate( $post["inicio"], $post["rut"], 
							$post["laboratorio"], $post["resp"], $post["termino"]);

						$this->msgController->successUpdate();
					} else {
						$this->msgController->dateDoesNotExist();
					}

				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Eliminar una entrada de LabRep por su ID
		public function deleteLabRep($delete){
			if ( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) 
				&& (isset($delete["fecha"]) && $this->comprobarValor($delete["fecha"]))) {
				
				$user = $this->authKey->comprobarAuth($delete["key"]);

				if ($user["return"]) {
					
					$this->labrep->deleteLabRepByDate($delete["fecha"]);

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
			if (isset($valor) && !is_null($valor)) {
				return true;
			} else {
				return false;
			}
		}
	}
 ?>