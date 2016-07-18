<?php 
	/**
	 * Controlador para el modelo Linea
	 */
	Class LineaController{
		private $config;
		private $lineas;
		private $authKey;
		private $msgController;

		//Constructor de la clase
		public function __construct($config){
			$this->config = $config;

			//Importamos el Modelo Linea a la variable lineas
			require_once($this->config->get('modelsDir').'Linea.php');
			$this->lineas = new Linea($config);

			//Invocamos al controlador de sesiones
			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($config);

			//Invocamos al controlador de mensajes de error
			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new msgController();
		}

		/**
		 * Obtenemos la lista entera de Lineas existentes
		 */
		public function obtenerListaLinea($key){
			if($this->comprobarValor($key)){

				$user =	$this->authKey->comprobarAuth($key);

				if($user['return']){

					// echo json_encode(array('return' => true, 'lineas' => $this->lineas->getLineas()));
					// $listaLineas = $this->lineas->getLineas();

					$contador = 0;
					$listaLineas = array();

					foreach ($this->lineas->getLineas() as $linea) {
						
						$listaLineas[$contador]["cod_linea"] = $linea["cod_linea"];
						$listaLineas[$contador]["nom_linea"] = utf8_encode($linea["nom_linea"]);
						
						++$contador;
					}

					echo json_encode(array('return' => true, 'lineas' => $listaLineas));
				}else{
					//Llamamos a la función que entrega el mensaje de error falso
					$this->msgController->invalidKey();
				}
			}else{
				//Mostramos el mensaje de error de llave nula
				$this->msgController->nullKey();
			}
		}

		/**
		 * Obtenemos una sola línea
		 */
		public function obtenerLineaID($key, $id){
			if($this->comprobarValor($key) && $this->comprobarValor($id)){
				$user = $this->authKey->comprobarAuth($key);

				if($user["return"]){

					$datos = $this->lineas->getLineaId($id);
					$datos["nom_linea"] = utf8_encode($datos["nom_linea"]);

					echo json_encode(array('return' => true, 'linea' => $datos));
				}else{
					//Llamamos a la función que entrega el mensaje de error falso
					$this->msgController->invalidKey();
				}
			}else{
				$this->msgController->noKeyNoId();
			}
		}

		/**
		 * Función para crear una línea y retornarla al cliente
		 */
		public function crearLinea($post){
			if( (isset($post["key"]) && $this->comprobarValor($post["key"])) && 
				(isset($post["nombre"]) && $this->comprobarValor($post["nombre"]))){

				$user = $this->authKey->comprobarAuth($post["key"]);

				if($user["return"]){

					$id_linea = $this->lineas->crearLineaRetornarId($post["nombre"]);
					echo json_encode(array('return' => true, 
						'linea' => array('col_linea' => $id_linea, 'nom_linea' => $post["nombre"])));
				}else{
					//Llamamos a la función que entrega el mensaje de error falso
					$this->msgController->invalidKey();
				}
			}else{
				$this->msgController->noKeyNoName();
			}
		}

		/**
		 * Actualizamos el nombre de la Linea por su ID
		 */
		public function actualizarLineaID($put){
			//Se comprueba que los valores necesarios no sean nulos
			if( (isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["id"]) && $this->comprobarValor($put["id"]))
				&& (isset($put["nombre"]) && $this->comprobarValor($put["nombre"]))){

				//Comprobamos la llave de usuario
				$user = $this->authKey->comprobarAuth($put["key"]);

				//Si el acceso es satisfactorio, realiza la acción, sino termina el procedimiento
				if ($user['return']) {
					//Se llama a la función editarLineaID() del modelo Lineas.
					$this->lineas->editarLineaId( $put["id"], $put["nombre"]);

					$this->msgController->successOp();
				} else {
					//Llamamos a la función que entrega el mensaje de error falso
					$this->msgController->invalidKey();
				}
			
			}else{
				//llamamos a la función privada noKeyNoId para mostrar mensaje de error que falta llave y/o ID
				$this->msgController->noKeyNoId();
			}
		}

		/**
		 * Eliminamos una linea por su ID
		 * TODO: verificar si se eliminaran los datos anidados (relacionados)
		 * 		con la linea.
		 */
		public function eliminarLineaID($delete){
			//Comprobamos que los valores enviados sean los correctos y no sean nulos
			if( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) 
				&& (isset($delete["id"]) && $this->comprobarValor($delete["id"]))){

				//Comprobamos la llave de usuario
				$user = $this->authKey->comprobarAuth($delete["key"]);

				if ($user['return']) {
					$this->lineas->delLineaId($delete["id"]);
					$this->msgController->successOp();
				} else {
					//Llamamos a la función que entrega el mensaje de error falso
					$this->msgController->invalidKey();
				}
				
			}else{
				//llamamos a la función privada noKeyNoId para mostrar mensaje de error que falta llave y/o ID
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