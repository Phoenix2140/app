<?php 
	/**
	 * Controlador para el modelo Doctorado
	 */
	Class DoctoradoController{
		private $config;
		private $doctorado;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			require_once($this->config->get('modelsDir').'Doctorado.php');
			$this->doctorado = new Doctorado($this->config);

			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();			
		}

		//Obtener la lista de Doctorado
		public function getDoctoradoList($key){
			if ($this->comprobarValor($key)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					$contador = 0;
					$data = array();

					foreach ($this->doctorado->getDoctorado() as $doct) {
						$data[$contador]["cod_doct"] = $doct["cod_doct"];
						$data[$contador]["nom_doct"] = utf8_encode($doct["nom_doct"]);

						++$contador;
					}

					echo json_encode(array('return' => true, 'doctorado' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullKey();
			}
			

		}

		//Obtener un dato de doctorado por su ID
		public function getDoctoradoId($key, $id){
			if ( $this->comprobarValor($key) && $this->comprobarValor($id)) {

				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$data = $this->doctorado->getDoctoradoById($id);
					$data["nom_doct"] = utf8_encode($data["nom_doct"]);

					echo json_encode(array('return' => true, 'doctorado' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoId();
			}
			
		}

		//Crear nueva entrada de Doctorado
		public function createDoctorado($post){
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"])) 
				&& (isset($post["nombre"]) && $this->comprobarValor($post["nombre"]))) {
				
				$user = $this->authKey->comprobarAuth($post["key"]);

				if ($user["return"]) {
					
					$id = $this->doctorado->createDoctoradoReturnId($post["nombre"]);

					$data = $this->doctorado->getDoctoradoById($id);
					$data["nom_doct"] = utf8_encode($data["nom_doct"]);

					echo json_encode(array('return' => true, 'doctorado' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			

		}

		//Editar una entrada de doctorado por su ID
		public function updateDoctorado($put){
			if ( (isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["id"]) && $this->comprobarValor($put["id"])) 
				&& (isset($put["nombre"]) && $this->comprobarValor($put["nombre"]))) {

				$user = $this->authKey->comprobarAuth($put["key"]);

				if ($user["return"]) {
					
					$this->doctorado->updateDoctoradoById( $put["id"], $put["nombre"]);

					$this->msgController->successUpdate();
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			

		}

		//Eliminar una entrada de doctorado por su ID
		public function deleteDoctorado($delete){
			if ( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) 
				&& (isset($delete["id"]) && $this->comprobarValor($delete["id"]))) {
				
				$user = $this->authKey->comprobarAuth($delete["key"]);

				if ($user["return"]) {
					$this->doctorado->deleteDoctoradoById($delete["id"]);

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