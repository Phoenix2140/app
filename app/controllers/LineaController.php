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