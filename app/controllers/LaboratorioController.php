<?php 
	/**
	 * Controlador para el modelo Laboratorio
	 */
	Class LaboratorioController{
		private $config;
		private $laboratorio;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			require_once($this->config->get('modelsDir').'Laboratorio.php');
			$this->laboratorio = new Laboratorio($this->config);

			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController($this->config);

		}

		//Obtener la lista de Laboratorio
		public function getLaboratorioList($key){
			if ($this->comprobarValor($key)) {
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					$contador = 0;
					$data = array();

					foreach ($this->laboratorio->getLaboratorio() as $lab) {
						$data[$contador]["cod_lab"] = $lab["cod_lab"];
						$data[$contador]["des_lab"] = utf8_encode($lab["des_lab"]);
						$data[$contador]["nom_encargado"] = utf8_encode($lab["nom_encargado"]);
						++$contador;
					}

					echo json_encode(array('return' => true, 'laboratorio' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullKey();
			}
			
		}

		//Obtener una entrada de Laboratorio por su ID
		public function getLaboratorioId($key, $id){
			if ( $this->comprobarValor($key) && $this->comprobarValor($id)) {
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$data = $this->laboratorio->getLaboratorioById($id);
					
					if (isset($data["cod_lab"]) && $data["cod_lab"] != "") {
						$data["des_lab"] = utf8_encode($data["des_lab"]);
						$data["nom_encargado"] = utf8_encode($data["nom_encargado"]);

						echo json_encode(array('return' => true, 'laboratorio' => $data));
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

		//Crear una entrada de Laboratorio
		public function createLaboratorio($post){
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"])) 
				&& (isset($post["descripcion"]) && $this->comprobarValor($post["descripcion"]))
				&& (isset($post["encargado"]) && $this->comprobarValor($post["encargado"]))) {
				$user = $this->authKey->comprobarAuth($post["key"]);

				if ($user["return"]) {
					$id = $this->laboratorio->createLaboratorioReturnID($post["descripcion"], $post["encargado"]);
					
					$data = $this->laboratorio->getLaboratorioById($id);
					$data["des_lab"] = utf8_encode($data["des_lab"]);

					echo json_encode(array('return' => true, 'laboratorio' => $data));
				} else {

					$this->msgController->invalidKey();
				}
				
			} else {

				$this->msgController->nullVar();
			}
			
		}

		//Editar una entrada de Laboratorio por su ID
		public function updateLaboratorio($put){
			if ( (isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["id"]) && $this->comprobarValor($put["id"])) 
				&& (isset($put["descripcion"]) && $this->comprobarValor($put["descripcion"]))
				&& (isset($put["encargado"]) && $this->comprobarValor($put["encargado"]))) {

				$user = $this->authKey->comprobarAuth($put["key"]);

				if ($user["return"]) {
					
					$data = $this->laboratorio->getLaboratorioById($put["id"]);
					
					if (isset($data["cod_lab"]) && $data["cod_lab"] != "") {
						
						$this->laboratorio->editLaboratorioById( $put["id"], $put["descripcion"], $put["encargado"]);

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

		//Eliminar una entrada de laboratorio por su ID
		public function deleteLaboratorio($delete){
			if ( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) 
				&& (isset($delete["id"]) && $this->comprobarValor($delete["id"]))) {
				$user = $this->authKey->comprobarAuth($delete["key"]);

				if ($user["return"]) {
					
					$this->laboratorio->deleteLaboratorioById($delete["id"]);

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