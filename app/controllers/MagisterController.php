<?php 
	/**
	 * Controlador para el Modelo Magister
	 */
	Class MagisterController{
		private $config;
		private $magister;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			require_once($this->config->get('modelsDir').'Magister.php');
			$this->magister = new Magister($this->config);

			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();
		}

		//Obtener la lista de Magister
		public function getMagisterList($key){
			if ($this->comprobarValor($key)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					$contador = 0;
					$data = array();

					foreach ($this->magister->getMagister() as $mag) {
						
						$data[$contador]["cod_mg"] = $mag["cod_mg"];
						$data[$contador]["nombre_mg"] = utf8_encode($mag["nombre_mg"]);

						++$contador;
					}

					echo json_encode(array('return' => true, 'magister' => $data));

				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullKey();
			}
			

		}

		//Obtener los datos del Magister por su ID
		public function getMagisterID($key, $id){
			if ( $this->comprobarValor($key) && $this->comprobarValor($id)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$data = $this->magister->getMagisterById($id);

					if (isset($data["cod_mg"]) && $data["cod_mg"] != "") {
						
						$data["nombre_mg"] = utf8_encode($data["nombre_mg"]);

						echo json_encode(array('return' => true, 'magister' => $data));
					} else {
						
						$this->msgController->noData();
					}
					

				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoId();
			}
			

		}

		//Crear nueva entrada de Magister
		public function createMagister($post){
			
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"]))
			 && (isset($post["nombre"]) && $this->comprobarValor($post["nombre"]))) {
				
				$user = $this->authKey->comprobarAuth($post["key"]);

				if ($user["return"]) {
					
					$id = $this->magister->createMagisterReturnID($post["nombre"]);

					$data = $this->magister->getMagisterById($id);

					$data["nombre_mg"] = utf8_encode($data["nombre_mg"]);

					echo json_encode(array('return' => true, 'magister' => $data));

				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Editar una entrada de Magister por su ID
		public function updateMagister($put){
			
			if ( (isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["id"]) && $this->comprobarValor($put["id"])) 
				&& (isset($put["nombre"]) && $this->comprobarValor($put["nombre"]))) {
				
				$user = $this->authKey->comprobarAuth($put["key"]);

				if ($user["return"]) {

					$data = $this->magister->getMagisterById($put["id"]);

					if (isset($data["cod_mg"]) && $data["cod_mg"] != "") {
						
						$this->magister->editMagisterById( $put["id"], $put["nombre"]);

						$this->msgController->successUpdate();
					} else {
						
						$this->msgController->noData();
					}
					
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Eliminar una entrada de Magister por su ID
		public function deleteMagister($delete){
			if ( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) 
				&& (isset($delete["id"]) && $this->comprobarValor($delete["id"]))) {
				
				$user = $this->authKey->comprobarAuth($delete["key"]);

				if ($user["return"]) {
					
					$this->magister->deleteMagisterById($delete["id"]);

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