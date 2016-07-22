<?php 
	/**
	 * Controlador para el modelo PostDoctorado
	 */
	Class PostDoctoradoController{
		private $config;
		private $postdoct;
		private $authKey;
		private $msgController;

		public function __construct($config){
			$this->config = $config;

			require_once($this->config->get("modelsDir").'PostDoctorado.php');
			$this->postdoct = new PostDoctorado($this->config);

			require_once($this->config->get("controllersDir").'AuthController.php');
			$this->authKey = new AuthController($this->config);
			
			require_once($this->config->get("controllersDir").'MsgController.php');
			$this->msgController = new MsgController();
		}

		//Obtener lista PostDoctorado
		public function getPostDoctoradoList($key){
			if ($this->comprobarValor($key)) {
				
				$user = $this->authKey->comprobarAuth($key);
				
				if ($user["return"]) {
					
					$contador = 0;
					$data = array();

					foreach ($this->postdoct->getPostDoct() as $pd) {
						$data[$contador]["cod_postdoct"] = $pd["cod_postdoct"];
						$data[$contador]["nom_postdoct"] = utf8_encode($pd["nom_postdoct"]);
						$data[$contador]["origen"] = utf8_encode($pd["origen"]);

						++$contador;
					}

					echo json_encode(array('return' => true, 'postdoctorado' => $data));
				} else {
					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullKey();
			}
			
		}

		//Obtener PostDoctorado por su ID
		public function getPostDoctById($key, $id){
			if ( $this->comprobarValor($key) && $this->comprobarValor($id)) {
				
				$user = $this->authKey->comprobarAuth($key);
				if ($user["return"]) {

					$data = $this->postdoct->getPostDoctById($id);

					if (isset($data["cod_postdoct"]) && $data["cod_postdoct"] != "") {
						
						$data["nom_postdoct"] = utf8_encode($data["nom_postdoct"]);
						$data["origen"] = utf8_encode($data["origen"]);

						echo json_encode(array('return' => true, 'postdoctorado' => $data));
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

		//Crear nueva entrada de PostDoctorado
		public function createPostDoct($post){
			if ( (isset($post["key"]) && $this->comprobarValor($post["key"])) 
				&& (isset($post["nombre"]) && $this->comprobarValor($post["nombre"])) 
				&& (isset($post["origen"])) && $this->comprobarValor($post["origen"])) {
				
				$user = $this->authKey->comprobarAuth($post["key"]);
				if ($user["return"]) {
					
					$id = $this->postdoct->createPostDoctReturnId( $post["nombre"], $post["origen"]);

					$data = $this->postdoct->getPostDoctById($id);

					$data["nom_postdoct"] = utf8_encode($data["nom_postdoct"]);
					$data["origen"] = utf8_encode($data["origen"]);

					echo json_encode(array('return' => true, 'postdoctorado' => $data));
				} else {

					$this->msgController->invalidKey();
				}
				
			} else {
				$this->msgController->nullVar();
			}
			
		}

		//Editar una entrada de PostDoctorado
		public function updatePostDoct($put){
			if ( (isset($put["key"]) && $this->comprobarValor($put["key"])) 
				&& (isset($put["id"]) && $this->comprobarValor($put["id"])) 
				&& (isset($put["nombre"]) && $this->comprobarValor($put["nombre"])) 
				&& (isset($put["origen"]) && $this->comprobarValor($put["origen"]))) {
				
				$user = $this->authKey->comprobarAuth($put["key"]);
				if ($user["return"]) {

					$data = $this->postdoct->getPostDoctById($put["id"]);

					if (isset($data["cod_postdoct"]) && $data["cod_postdoct"] != "") {
						
						$this->postdoct->updatePostDoctById( $put["id"] , $put["nombre"] , $put["origen"]);

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

		//Eliminar una entrada de PostDoctorado
		public function deletePostDoct($delete){
			if ( (isset($delete["key"]) && $this->comprobarValor($delete["key"])) 
				&& (isset($delete["id"]) && $this->comprobarValor($delete["id"]))) {
				
				$user = $this->authKey->comprobarAuth($delete["key"]);
				if ($user["return"]) {
					
					$this->postdoct->deletePostDoctById( $delete["id"]);

					$this->msgController->successDelete();
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