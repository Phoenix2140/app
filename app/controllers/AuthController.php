<?php 
	/**
	 * Controlador que se encarga de verificar la llave de acceso,
	 * comprueba si es válida para el acceso a la plataforma
	 */
	Class AuthController{
		private $config;	//variable para el objeto Config()
		private $usuarios; 	//variable para el objeto Usuarios()

		//Constructor del controlador
		public function __construct($config){
			$this->config = $config;

			require_once($this->config->get('modelsDir').'Usuarios.php');
			$this->usuarios = new Usuarios($this->config);
		}

		/**
		 * Función que comprueba si la llave es válida para el acceso
		 */
		public function comprobarAuth($key){
			/**
			 * Si la llave es nula devuelve false, si contiene datos 
			 * se realiza una acción
			 */
			if($this->comprobarKeyNula($key)){
				$user = $this->usuarios->getUsuarioKey($key);
				/**
				 * Si la llave coincide con la del usuario que retorna todo 
				 * está OK, y se devuelve un true más los datos de usuario;
				 * si no coinciden devuelve false.
				 */
				if(isset($user["key"]) && $user["key"] == $key){
					return array('return' => true, 'usuario' => $user);
				}else{
					return array('return' => false);	
				}
			}else{
				return array('return' => false);
			}
		}

		/**
		 * Comprobamos que la llave enviada no sea nula
		 */
		private function comprobarKeyNula($key){
			if(!is_null($key)){
				return true;
			}else{
				return false;
			}
		}

	}
 ?>