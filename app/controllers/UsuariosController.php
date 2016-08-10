<?php 
	/**
	 * Controlador para el Modelo Usuarios
	 */
	Class UsuariosController{
		private $config;
		private $usuario;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			require_once($this->config->get('modelsDir').'Usuarios.php');
			$this->usuario = new Usuarios($this->config);

			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();

		}

		//Obtener la Lista de Usuarios
		public function getUsuarioList($key){
			if ($this->comprobarValor($key)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$contador = 0;
					$data = array();

					foreach ($this->usuario->getUsuario() as $userdata) {
						$data[$contador]["rut"] = $userdata["rut"];
						$data[$contador]["nombre"] = utf8_encode($userdata["nombre"]);
						$data[$contador]["ap_pat"] = utf8_encode($userdata["ap_pat"]);
						$data[$contador]["ap_mat"] = utf8_encode($userdata["ap_mat"]);
						$data[$contador]["cod_prof"] = $userdata["cod_prof"];
						$data[$contador]["cod_mg"] = $userdata["cod_mg"];
						$data[$contador]["cod_doct"] = $userdata["cod_doct"];
						$data[$contador]["cod_postdoc"] = $userdata["cod_postdoc"];
						$data[$contador]["cod_user"] = $userdata["cod_user"];
						$data[$contador]["email"] = utf8_encode($userdata["email"]);
						$data[$contador]["telefono"] = utf8_encode($userdata["telefono"]);
						$data[$contador]["fecha-nac"] = $userdata["fecha-nac"];
						$data[$contador]["fecha-contratacion"] = $userdata["fecha-contratacion"];

						++$contador;
					}

					echo json_encode(array('return' => true, 'usuarios' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullKey();
			}
			
		}

		//Obtener un Usuario por su RUT
		public function getUsuario($key, $id){
			if ( $this->comprobarValor($key) && $this->comprobarValor($id)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$data = $this->usuario->getUsuarioById($id);

					if (isset($data["rut"])) {
						
						$data["nombre"] = utf8_encode($userdata["nombre"]);
						$data["ap_pat"] = utf8_encode($userdata["ap_pat"]);
						$data["ap_mat"] = utf8_encode($userdata["ap_mat"]);
						$data["email"] = utf8_encode($userdata["email"]);
						$data["telefono"] = utf8_encode($userdata["telefono"]);

						echo json_encode(array('return' => true, 'usuario' => $data));
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

		//Crear un nuevo usuario
		public function createUsuario($post){
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"])) 
				&& (isset($post["rut"]) && $this->comprobarValor($post["rut"])) 
				&& (isset($post["nombre"]) && $this->comprobarValor($post["nombre"])) 
				&& (isset($post["ap_pat"]) && $this->comprobarValor($post["ap_pat"])) 
				&& (isset($post["ap_mat"]) && $this->comprobarValor($post["ap_mat"])) 
				&& (isset($post["cod_prof"]) && $this->comprobarValor($post["cod_prof"])) 
				&& (isset($post["cod_mg"]) && $this->comprobarValor($post["cod_mg"])) 
				
				&& (isset($post["cod_user"]) && $this->comprobarValor($post["cod_user"])) 
				&& (isset($post["email"]) && $this->comprobarValor($post["email"])) 
				&& (isset($post["telefono"]) && $this->comprobarValor($post["telefono"])) 
				&& (isset($post["fecha-nac"]) && $this->comprobarValor($post["fecha-nac"])) 
				&& (isset($post["fecha-contratacion"]) && $this->comprobarValor($post["fecha-contratacion"]))) {
				
				$user = $this->authKey->comprobarAuth($post["key"]);

				if ($user["return"]) {

					$userdata = $this->usuario->getUsuarioById($post["rut"]);
					
					if (!isset($userdata["rut"])) {
						$id = $this->usuario->crearUsuarioReturnId($post["rut"] , $post["nombre"], $post["ap_pat"],
											 $post["ap_mat"], $post["cod_prof"], $post["cod_mg"], $post["cod_doct"],
											 $post["cod_postdoc"], $post["cod_user"], $post["email"], $post["telefono"],
											 $post["fecha-nac"], $post["fecha-contratacion"]);

						$data = $this->usuario->getUsuarioById($id);

						$data["nombre"] = utf8_encode($userdata["nombre"]);
						$data["ap_pat"] = utf8_encode($userdata["ap_pat"]);
						$data["ap_mat"] = utf8_encode($userdata["ap_mat"]);
						$data["email"] = utf8_encode($userdata["email"]);
						$data["telefono"] = utf8_encode($userdata["telefono"]);

						echo json_encode(array('return' => true, 'usuario' => $data));
					} else {
						$this->msgController->userExist();
					}
					
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Editar un usuario
		public function updateUsuario($put){
			if ( (isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["rut"]) && $this->comprobarValor($put["rut"])) 
				&& (isset($put["nombre"]) && $this->comprobarValor($put["nombre"])) 
				&& (isset($put["ap_pat"]) && $this->comprobarValor($put["ap_pat"])) 
				&& (isset($put["ap_mat"]) && $this->comprobarValor($put["ap_mat"])) 
				&& (isset($put["cod_prof"]) && $this->comprobarValor($put["cod_prof"])) 
				&& (isset($put["cod_mg"]) && $this->comprobarValor($put["cod_mg"])) 
				&& (isset($put["cod_doct"]) && $this->comprobarValor($put["cod_doct"])) 
				&& (isset($put["cod_postdoc"]) && $this->comprobarValor($put["cod_postdoc"])) 
				&& (isset($put["cod_user"]) && $this->comprobarValor($put["cod_user"])) 
				&& (isset($put["email"]) && $this->comprobarValor($put["email"])) 
				&& (isset($put["telefono"]) && $this->comprobarValor($put["telefono"])) 
				&& (isset($put["fecha-nac"]) && $this->comprobarValor($put["fecha-nac"])) 
				&& (isset($put["fecha-contratacion"]) && $this->comprobarValor($put["fecha-contratacion"]))) {
				
				$user = $this->authKey->comprobarAuth($put["key"]);

				if ($user["return"]) {
					
					$userdata = $this->usuario->getUsuarioById($put["rut"]);
					
					if (isset($userdata["rut"])) {
						$this->usuario->updateUsuarioById($post["rut"] , $post["nombre"], $post["ap_pat"],
									 $post["ap_mat"], $post["cod_prof"], $post["cod_mg"], $post["cod_doct"],
									 $post["cod_postdoc"], $post["cod_user"], $post["email"], $post["telefono"],
									 $post["fecha-nac"], $post["fecha-contratacion"]);

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

		//Eliminar un usuario
		public function deleteUsuario($delete){
			if ( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) 
				&& (isset($delete["rut"]) && $this->comprobarValor($delete["rut"]))) {
				
				$user = $this->authKey->comprobarAuth($delete["key"]);

				if ($user["return"]) {
					
					$this->usuario->deleteUsuarioById($delete["rut"]);

					$this->msgController->sucessDelete();
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