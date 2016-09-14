<?php 
	/**
	 * Controlador para el login y gestión de usuario
	 */
	Class UsersController{
		private $config;
		private $logins;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			require_once($config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();

			require_once($config->get('modelsDir').'Logins.php');
			$this->logins = new Logins($config);
		}

		public function login($post){
			var_dump($post);
			//Comprobamos que los campos no estén vacíos
			if($this->comprobarDatos($post)){
				//Llamamos al modelo consultando por el usuario y contraseña
				$usuario = $this->logins->getUsuarioKey($post["username"], $post["password"]);

				//Si el usuario existe y devuelve una llave se le retorna al usuario,
				//sino devuelve un error
				if(isset($usuario["key"]) && !is_null($usuario["key"])){

					setcookie("sid",$usuario["id_login"]);
					setcookie("id",$usuario["id_login"]);
					setcookie("username",utf8_encode($usuario["nombre"]));
					setcookie("rol",$usuario["rol"]);
					setcookie("key",$usuario["key"]);

					$newUser["id"] = $usuario["id_login"];
					$newUser["username"] = utf8_encode($usuario["nombre"]);
					$newUser["rol"] = $usuario["rol"];
					$newUser["key"] = $usuario["key"];

					echo json_encode(array('user' => $newUser));
				}else{
					$this->msgController->invalidUserPass();				
				}
			}else{
				$this->msgController->nullVar();
			}
		}

		public function me($cookie){
			
			if(isset($cookie["sid"])){

				$usuario = $this->logins->getUsuarioById($cookie["sid"]);

				$newUser["id"] = $usuario["id_login"];
				$newUser["username"] = utf8_encode($usuario["nombre"]);
				$newUser["rol"] = $usuario["rol"];
				$newUser["key"] = $usuario["key"];

				echo json_encode(array('user' => $newUser));
			}else{
				$this->msgController->invalidUserPass();
			}
		}

		public function logout(){
			if(isset($_COOKIE["sid"])){

				setcookie("sid", null, time()-1);
				setcookie("id", null, time()-1);
				setcookie("username", null, time()-1);
				setcookie("rol",null, time()-1);
				setcookie("key", null, time()-1);

				echo json_encode(array('response' => true));
			}else{
				$this->msgController->invalidUserPass();
			}
		}

		private function comprobarDatos($post){
			if((isset($post["username"]) && !is_null($post["username"])) 
				&& (isset($post["password"]) && !is_null($post["password"]))){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>