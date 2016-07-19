<?php 
	/**
	 * Controlador para el Modelo Profesion
	 */
	Class ProfesionController{
		private $config;
		private $profesion;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			//Importamos el Modelo Profesión
			require_once($this->config->get('modelsDir').'Profesion.php');
			$this->profesion = new Profesion($this->config);

			//Importamos el Controlador de Autenticación
			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			//Importamos el controlador de mensajes
			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController($this->config);
		}

		//Obtener la lista de Profesión
		public function getProfesion($key){
			if($this->comprobarValor($key)){
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					$contador = 0;
					$data = array();
					foreach ($this->profesion->getProfesion() as $prof) {
						
						$data[$contador]["cod_prof"] = $prof["cod_prof"];
						$data[$contador]["nom_prof"] = utf8_encode($prof["nom_prof"]);

						++$contador;
					}

					echo json_encode(array('return' => true, 'profesion' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				

			}else{
				$this->msgController->noKey();
			}
		}

		//Obtener un dato por su ID
		public function getProfesionID($key, $id){
			if ( $this->comprobarValor($key) && $this->comprobarValor($id)) {
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					$data = $this->profesion->getProfesionById($id);
					$data["nom_prof"] = utf8_encode($data["nom_prof"]);

					echo json_encode(array('return' => true, 'profesion' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoId();
			}
			
		}

		//Crear nueva entrada de Profesión
		public function createProfesion($post){
			if ( ( isset($post["key"]) && $this->comprobarValor($post["key"])) 
				&& ( isset($post["profesion"]) && $this->comprobarValor($post["profesion"]))) {
				
				$user = $this->authKey->comprobarAuth($post["key"]);

				if ($user["return"]) {
					
					$id = $this->profesion->createProfesionReturnId($post["profesion"]);

					$data = $this->profesion->getProfesionById($id);
					$data["nom_prof"] = utf8_encode($data["nom_prof"]);

					echo json_encode(array('return' => true, 'profesion' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoName();
			}
			
		}

		//Editar una entrade de Profesion por su ID
		public function updateProfesion($put){
			if ( ( isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& ( isset($put["id"]) && $this->comprobarValor($put["id"])) 
				&& ( isset($put["profesion"]) && $this->comprobarValor($put["profesion"]))) {
				
				$user = $this->authKey->comprobarAuth($put["key"]);

				if ($user["return"]) {
					$this->profesion->updateProfesionById($put["id"], $put["profesion"]);

					$this->msgController->successUpdate();
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Eliminar una entrada de Profesion por su ID
		public function deleteProfesion($delete){
			if ( ( isset($delete["key"]) && $this->comprobarValor($delete["key"])) 
				&& ( isset($delete["id"]) && $this->comprobarValor($delete["id"]))) {
				
				$user = $this->authKey->comprobarAuth($delete["key"]);

				if ($user["return"]) {
					$this->profesion->deleteProfesionById($delete["id"]);

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