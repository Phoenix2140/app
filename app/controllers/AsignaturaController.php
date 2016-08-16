<?php
	Class AsignaturaController{
		private $config;
		private $asignatura;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config= $config;

			require_once($this->config->get('modelsDir').'Asignatura.php');
			$this->asignatura = new Asignatura($this->config);

			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();

		}
		//Obtener la lista de Asignaturas
		public function getAsignaturas($key){
			if ($this->comprobarValor($key)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$contador = 0;
					$data = array();

					foreach ($this->asignatura->getAsignaturas() as $asig) {
						$data[$contador]["cod_asignatura"] = $asig["cod_asignatura"];
						$data[$contador]["nombre_asig"] = utf8_encode($asig["nombre_asig"]);
						$data[$contador]["semestre"] = $asig["semestre"];
						$data[$contador]["anho"] = $asig["anho"];

						++$contador;
					}

					echo json_encode(array('return' => true, 'asignaturas' => $data));
				} else {
					
					$this->msgController->invalidKey();
				}
				
			} else {
				
				$this->msgController->nullKey();
			}
			
		}

		//obtener entrada de Asignatura por ID
		public function getAsignaturaById($key, $id){
			if ( $this->comprobarValor($key) && $this->comprobarValor($id)) {
				
				$user = $this->authKey->comprobarAuth($key);

				if ($user["return"]) {
					
					$data = $this->asignatura->getAsignaturaById($id);
					if (isset($data["cod_asignatura"]) && $data["cod_asignatura"] != "") {
						
						$data["nombre_asig"] = utf8_encode($data["nombre_asig"]);

						echo json_encode(array('return' => true, 'asignatura' => $data));
					} else {
						
						$this->msgController->dateDoesNotExist();
					}

				} else {
					
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoId();
			}
			
		}

		//Crear entrada Asignatura
		public function createAsignatura($post){
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"])) 
				&& (isset($post["id"]) && $this->comprobarValor($post["id"]))
				&& (isset($post["nombre_asig"]) && $this->comprobarValor($post["nombre_asig"])) 
				&& (isset($post["semestre"]) && $this->comprobarValor($post["semestre"])) 
				&& (isset($post["anho"]) && $this->comprobarValor($post["anho"]))) {
				
				$user = $this->authKey->comprobarAuth($post["key"]);

				//TODO: implementar comprobación de rut existente
				if ($user["return"]) {
					$data = $this->asignatura->getAsignaturaById($post["id"]);

					if(!isset($data["id"])){
						$this->asignatura->createAsignatura( $post["id"], $post["nombre_asig"], 
							$post["semestre"], $post["anho"]);

						$data = $this->asignatura->getAsignaturaById($post["id"]);
						$data["nombre_asig"] = utf8_encode($data["nombre_asig"]);

						echo json_encode(array('return' => true, 'asignatura' => $data));

					}else{
						$this->msgController->dateExist();
					}

				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}




	}
?>