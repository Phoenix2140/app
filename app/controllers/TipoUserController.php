<?php 
	/**
	 * Controlador para el modelo TipoUser
	 */
	Class TipoUserController{
		private $config;
		private $tipoUser;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			//Importamos el modelo TipoUser
			require_once($this->config->get('modelsDir').'TipoUser.php');
			$this->tipoUser = new TipoUser($this->config);

			//Importamos el controlador de autenticación
			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			//Importamos el controlador de mensajes
			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController($this->config);
		}

		//Obtener la lista completa de tipos de usuario
		public function getListTipoUser($key){
			if ($this->comprobarValor($key)) {

				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$contador = 0;
					$listaTipoUser = array();

					foreach ($this->tipoUser->getTipoUser() as $tipoU) {
						$listaTipoUser[$contador]["cod_user"]	= $tipoU["cod_user"];
						$listaTipoUser[$contador]["desc_user"]	= utf8_encode($tipoU["desc_user"]);
						++$contador;
					}

					echo json_encode(array("return" => true, "tipoUser" => $listaTipoUser) );
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullKey();
			}
			
		}

		//Obtener un único tipo de usuario por su ID
		public function getTipoUserById($key, $id){
			if ($this->comprobarValor($key) && $this->comprobarValor($id)) {

				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					$datos = $this->tipoUser->getTipoUserById($id);
					$datos["desc_user"] = utf8_encode($datos["desc_user"]);

					echo json_encode(array('return' => true, 'tipoUser' => $datos));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoId();
			}
		}

		//Crear entrada de TipoUser (POST)
		public function createTipoUser($post){
			if ((isset($post["key"]) && $this->comprobarValor($post["key"])) 
				&& (isset($post["descripcion"]) && $this->comprobarValor($post["descripcion"]))) {
				
				$user = $this->authKey->comprobarAuth($post["key"]);

				if ($user["return"]) {
					
					$id = $this->tipoUser->createTipoUserReturnId($post["descripcion"]);

					$datos = $this->tipoUser->getTipoUserById($id);
					$datos["desc_user"] = utf8_encode($datos["desc_user"]);

					echo json_encode(array('return' => true, 'tipoUser' => $datos));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Actualizar Entrada de TipoUser por su ID (PUT)
		public function updateTipoUser($put){
			if ((isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["id"]) && $this->comprobarValor($put["id"])) 
				&& (isset($put["descripcion"]) && $this->comprobarValor($put["descripcion"]))) {

				$user = $this->authKey->comprobarAuth($put["key"]);

				if ($user["return"]) {
					
					$this->tipoUser->updateTipoUserById( $put["id"], $put["descripcion"]);

					$this->msgController->successUpdate(); //mensaje satisfactorio
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Eliminar Entrada de TipoUser por su ID (DELETE)
		public function deleteTipoUser($delete){
			if ( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) && 
				(isset($delete["id"]) && $this->comprobarValor($delete["id"]))) {
				
				$user = $this->authKey->comprobarAuth($delete["key"]);

			if ($user["return"]) {
				
				$this->tipoUser->deleteTipoUserById($delete["id"]);

				$this->msgController->successDelete();
			} else {
				$this->msgController->invalidKey();
			}
			
			} else {
				$this->msgController->nullVar();
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