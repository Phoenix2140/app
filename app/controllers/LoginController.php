<?php 
	/**
	 * Controlador para el login
	 */
	Class LoginController{
		private $config;
		private $usuarios;

		/**
		 * Constructor del controlador Login
		 */
		public function __construct($config){
			$this->config = $config; //Asignamos la configuración a una variable local

			/**
			 * Llamamos al modelo usuario para el manejo de esta base de datos
			 * y posteriormente creamos un objeto de tipo usuarios
			 */
			require_once($this->config->get('modelsDir').'Usuarios.php');
			$this->usuarios = new Usuarios($this->config);
		}

		public function login($post){
			if($this->comprobarDatos($post)){
				$usuario = $this->usuarios->getLogin($post["user"], $post["pass"]);

				if(isset($usuario["key"]) && !is_null($usuario["key"])){
					echo json_encode(array('return' => true, 'user' => $usuario));
				}else{
					echo json_encode(array('return' => false, ));				
				}
			}else{
				echo json_encode(array('return' => false));
			}
		}

		private function comprobarDatos($post){
			if((isset($post["user"]) && !is_null($post["user"])) 
				&& (isset($post["pass"]) && !is_null($post["oass"]))){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>