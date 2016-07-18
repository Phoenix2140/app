<?php 
	/**
	 * Controlador para el login
	 */
	Class LoginController{
		private $config;
		private $logins;
		private $msgController;

		/**
		 * Constructor del controlador Login
		 */
		public function __construct($config){
			$this->config = $config; //Asignamos la configuración a una variable local

			/**
			 * Llamamos al modelo usuario para el manejo de esta base de datos
			 * y posteriormente creamos un objeto de tipo logins
			 */
			require_once($this->config->get('modelsDir').'Logins.php');
			$this->logins = new Logins($this->config);

			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();
		}

		/**
		 * Función para poder loggearse; recibe un usuario y contraseña
		 * devolviendo datos básicos y la llave de acceso al usuario.
		 */
		public function login($post){
			//Comprobamos que los campos no estén vacíos
			if($this->comprobarDatos($post)){
				//Llamamos al modelo consultando por el usuario y contraseña
				$usuario = $this->logins->getUsuarioKey($post["user"], $post["pass"]);

				//Si el usuario existe y devuelve una llave se le retorna al usuario,
				//sino devuelve un error
				if(isset($usuario["key"]) && !is_null($usuario["key"])){
					echo json_encode(array('return' => true, 'user' => $usuario));
				}else{
					$this->msgController->invalidUserPass();				
				}
			}else{
				$this->msgController->nullVar();
			}
		}

		/**
		 * Función que comprueba que los campos son enviados correctamente y no
		 * estén vacíos
		 */
		private function comprobarDatos($post){
			if((isset($post["user"]) && !is_null($post["user"])) 
				&& (isset($post["pass"]) && !is_null($post["pass"]))){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>