<?php 
	/**
	 * Controlador para el modelo Linea
	 */
	Class LineaController{
		private $config;
		private $lineas;
		private $authKey;

		//Constructor de la clase
		public function __construct($config){
			$this->config = $config;

			//Importamos el Modelo Linea a la variable lineas
			require_once($this->config->get('modelsDir').'Linea.php');
			$this->lineas = new Linea($config);

			//Invocamos al controlador de sesiones
			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($config);
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
					echo json_encode(array('return' => false, 'msgError' => 'Llave de acceso inválida'));
				}
			}else{
				echo json_encode(array('return' => false, 'msgError' => 'Llave de acceso nula'));
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
					echo json_encode(array('return' => false, 'msgError' => 'Llave de acceso inválida'));
				}
			}else{
				echo json_encode(array('return' => false, 'msgError' => 'La llave y/o el ID son nulos'));
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
					echo json_encode(array('return' => false, 'msgError' => 'Llave de acceso inválida'));
				}
			}else{
				echo json_encode(array('return' => false, 'msgError' => 'La llave y/o nombre son nulos'));
			}
		}

		public function actualizarLineaID($put){
			if( (isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["id"]) && $this->comprobarValor($put["id"]))
				&& (isset($put["nombre"]) && $this->comprobarValor($put["nombre"]))){

				$user = $this->authKey->comprobarAuth($put["key"]);

				if ($user['return']) {
					$this->lineas->editarLineaId( $put["id"], $put["nombre"]);

					echo json_encode(array('return' => true));
				} else {
					echo json_encode(array('return' => false, 'msgError' => 'Llave de acceso inválida'));
				}
			
			}else{
				echo json_encode(array('return' => false, 'msgError' => 'La llave y/o ID son nulos'));
			}
		}

		public function eliminarLineaID($delete){
			if( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) && (isset($delete["id"]) && $this->comprobarValor($delete["id"]))){

				$user = $this->authKey->comprobarAuth($delete["key"]);

				if ($user['return']) {
					echo json_encode(array('return' => true));
				} else {
					echo json_encode(array('return' => false, 'msgError' => 'Llave de acceso inválida'));
				}
				
			}else{
				echo json_encode(array('return' => false, 'msgError' => 'La llave y/o ID son nulos'));
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