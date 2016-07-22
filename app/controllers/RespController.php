<?php 
	/**
	 * Controlador para el Modelo Resp
	 */
	Class RespController{
		private $config;
		private $resp;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			require_once($this->config->get('modelsDir').'Resp.php');
			$this->resp = new Resp($this->config);

			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();
		}

		//Obtener la lista de Resp
		public function getRespList($key){
			if ($this->comprobarValor($key)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$contador = 0;
					$data = array();

					foreach ($this->resp->getResp() as $rsp) {
						$data[$contador]["cod_resp"] = $rsp["cod_resp"];
						$data[$contador]["descripcion_resp"] = utf8_encode($rsp["descripcion_resp"]);

						++$contador;
					}

					echo json_encode(array('return' => true, 'resp' => $data));
				} else {
					
					$this->msgController->invalidKey();
				}
				
			} else {
				
				$this->msgController->nullKey();
			}
			
		}

		//Obtener la entrada de Resp desde su Id
		public function getRespId($key, $id){
			if ( $this->comprobarValor($key) && $this->comprobarValor($id)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$data = $this->resp->getRespById($id);
					$data["descripcion_resp"] = utf8_encode($data["descripcion_resp"]);

					echo json_encode(array('return' => true, 'resp' => $data));
				} else {
					
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoId();
			}
			
		}

		//Crear una entrada de Resp
		public function createResp($post){
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"])) 
				&& (isset($post["descripcion"]) && $this->comprobarValor($post["descripcion"]))) {
				
				$user = $this->authKey->comprobarAuth($post["key"]);

				if ($user["return"]) {
					
					$id = $this->resp->createRespReturnID($post["descripcion"]);

					$data = $this->resp->getRespById($id);
					$data["descripcion_resp"] = utf8_encode($data["descripcion_resp"]);

					echo json_encode(array('return' => true, 'resp' => $data));

				} else {
					
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Editar una entrada de Resp por su Id
		public function editResp($put){
			if ( (isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["id"]) && $this->comprobarValor($put["id"])) 
				&& (isset($put["descripcion"]) && $this->comprobarValor($put["descripcion"]))) {
				
				$user = $this->authKey->comprobarAuth($put["key"]);

				if ($user["return"]) {
					
					$this->resp->editRespById( $put["id"], $put["descripcion"]);

					$this->msgController->successUpdate();
				} else {
					
					$this->msgController->invalidKey();
				}
				
			} else {

				$this->msgController->nullVar();
			}
			
		}

		//Eliminar una entrada de Resp por su Id
		public function deleteResp($delete){
			if ( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) 
				&& (isset($delete["id"]) && $this->comprobarValor($delete["id"]))) {
				
				$user = $this->authKey->comprobarAuth($delete["key"]);

				if ($user["return"]) {
					
					$this->resp->deleteRespById($delete["id"]);

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