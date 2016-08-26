<?php 
	/**
	 * Controlador del modelo Docentes
	 */
	Class DocentesController{
		private $config;
		private $docentes;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			require_once($this->config->get('modelsDir').'Docentes.php');
			$this->docentes = new Docentes($this->config);

			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($this->config);

			require_once($this->config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();
		}

		//Obtener la lista de docentes
		public function getDocentesList($key){
			if ($this->comprobarValor($key)) {

				$user = $this->authKey->comprobarAuth($key);
				
				if ($user["return"]) {
					$contador = 0;
					$data = array();

					foreach ($this->docentes->getDocentes() as $docente) {
						$data[$contador]["rut"] = $docente["rut"];
						$data[$contador]["nombre"] = utf8_encode($docente["nombre"]);
						$data[$contador]["ap_pat"] = utf8_encode($docente["ap_pat"]);
						$data[$contador]["ap_mat"] = utf8_encode($docente["ap_mat"]);
						$data[$contador]["email"] = $docente["email"];
						$data[$contador]["telefono"] = $docente["telefono"];
						$data[$contador]["fecha_contratacion"] = $docente["fecha_contratacion"];
						$data[$contador]["docentecol"] = $docente["docentecol"];
						$data[$contador]["extranjero"] = $docente["extranjero"];
						$data[$contador]["estado"] = $docente["estado"];
						$data[$contador]["cod_postdoc"] = $docente["cod_postdoc"];
						$data[$contador]["cod_doct"] = $docente["cod_doct"];
						$data[$contador]["cod_mg"] = $docente["cod_mg"];
						$data[$contador]["cod_tipo_profesor"] = $docente["cod_tipo_profesor"];
						$data[$contador]["cod_jerarquia"] = $docente["cod_jerarquia"];
						$data[$contador]["cod_prof"] = $docente["cod_prof"];

						++$contador;
					}

					echo json_encode(array('return' => true, 'docentes' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullKey();
			}
			
		}

		//Obtener los datos de un docente por su ID
		public function getDocenteById($key, $rut){
			if ( $this->comprobarValor($key) &&  $this->comprobarValor($rut)) {
				$user = $this->authKey->comprobarAuth($key);
				
				if ($user["return"]) {

					$data = $this->docentes->getDocenteByRut($rut);

					if(isset($data["rut"]) && $data["rut"] != ""){

						$data["nombre"] = utf8_encode($data["nombre"]);
						$data["ap_pat"] = utf8_encode($data["ap_pat"]);
						$data["ap_mat"] = utf8_encode($data["ap_mat"]);

						echo json_encode(array('return' => true, 'docente' => $data));
					}else{
						$this->msgController->noData();
					}

				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->noKeyNoId();
			}
			
		}

		//Crear una entrada de Docente
		public function createDocente($post){
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"])) && 
				(isset($post["rut"]) && $this->comprobarValor($post["rut"])) && 
				(isset($post["nombre"]) && $this->comprobarValor($post["nombre"])) && 
				(isset($post["appat"]) && $this->comprobarValor($post["appat"])) && 
				(isset($post["apmat"]) && $this->comprobarValor($post["apmat"])) && 
				(isset($post["email"]) && $this->comprobarValor($post["email"])) && 
				(isset($post["fono"]) && $this->comprobarValor($post["fono"])) && 
				(isset($post["fecha"]) && $this->comprobarValor($post["fecha"])) && 
				(isset($post["postdoc"]) && $this->comprobarValor($post["postdoc"])) && 
				(isset($post["doct"]) && $this->comprobarValor($post["doct"])) && 
				(isset($post["mg"]) && $this->comprobarValor($post["mg"])) && 
				(isset($post["profesor"]) && $this->comprobarValor($post["profesor"])) && 
				(isset($post["jerarquia"]) && $this->comprobarValor($post["jerarquia"])) && 
				(isset($post["docente"]) && $this->comprobarValor($post["docente"])) && 
				(isset($post["prof"]) && $this->comprobarValor($post["prof"]))) {

				$user = $this->authKey->comprobarAuth($post["key"]);
				
				if ($user["return"]) {

					//Verificar que no exista el usuario
					$obtenerDocente = $this->docentes->getDocenteByRut($post["rut"]);
					if(!isset($obtenerDocente["rut"])){
						if (isset($post["extranjero"]) && $this->comprobarValor($post["extranjero"])) {
							$extranjero = true;
						} else {
							$extranjero = false;
						}

						$id = $this->docentes->createDocenteReturnId($post["rut"], 
							$post["nombre"], $post["appat"], $post["apmat"], $post["email"], 
							$post["fono"], $post["fecha"], $post["docente"], $extranjero, 
							true, $post["postdoc"], $post["doct"], $post["mg"], 
							$post["profesor"], $post["jerarquia"], $post["prof"]);

						$data = $this->docentes->getDocenteByRut($post["rut"]);

						$data["nombre"] = utf8_encode($data["nombre"]);
						$data["ap_pat"] = utf8_encode($data["ap_pat"]);
						$data["ap_mat"] = utf8_encode($data["ap_mat"]);

						echo json_encode(array('return' => true, 'docente' => $data));
					}else{
						$this->msgController->userExist();
					}

				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Crear una entrada de Docente
		public function updateDocentebyId($put){
			if ( (isset($put["key"]) && $this->comprobarValor($put["key"])) && 
				(isset($put["rut"]) && $this->comprobarValor($put["rut"])) && 
				(isset($put["nombre"]) && $this->comprobarValor($put["nombre"])) && 
				(isset($put["appat"]) && $this->comprobarValor($put["appat"])) && 
				(isset($put["apmat"]) && $this->comprobarValor($put["apmat"])) && 
				(isset($put["email"]) && $this->comprobarValor($put["email"])) && 
				(isset($put["fono"]) && $this->comprobarValor($put["fono"])) && 
				(isset($put["fecha"]) && $this->comprobarValor($put["fecha"])) && 
				(isset($put["postdoc"]) && $this->comprobarValor($put["postdoc"])) && 
				(isset($put["doct"]) && $this->comprobarValor($put["doct"])) && 
				(isset($put["mg"]) && $this->comprobarValor($put["mg"])) && 
				(isset($put["profesor"]) && $this->comprobarValor($put["profesor"])) && 
				(isset($put["jerarquia"]) && $this->comprobarValor($put["jerarquia"])) && 
				(isset($put["prof"]) && $this->comprobarValor($put["prof"]))) {

				$user = $this->authKey->comprobarAuth($put["key"]);
				
				if ($user["return"]) {

					$obtenerDocente = $this->docentes->getDocenteByRut($put["rut"]);

					if(isset($obtenerDocente["rut"])){
						if (isset($put["extranjero"]) && $this->comprobarValor($put["extranjero"])) {
							$extranjero = true;
						} else {
							$extranjero = false;
						}

						$this->docentes->updateDocentebyRut($put["rut"], 
							$put["nombre"], $put["appat"], $put["apmat"], $put["email"], 
							$put["fono"], $put["fecha"], $put["docente"],  
							$put["postdoc"], $put["doct"], $put["mg"], 
							$put["profesor"], $put["jerarquia"], $put["prof"]);

						$this->msgController->successUpdate();
						
					}else{
						$this->msgController->userNotExist();
					}

				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Crear una entrada de Docente
		public function disableDocenteById($post){
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"])) && 
				(isset($post["rut"]) && $this->comprobarValor($post["rut"]))) {

				$user = $this->authKey->comprobarAuth($post["key"]);
				
				if ($user["return"]) {

					$this->docentes->disableDocenteByRut($post["rut"]);

					$this->msgController->successUpdate();
					
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
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