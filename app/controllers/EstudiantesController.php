<?php 
	/**
	 * Controlador para las operaciones de Estudiantes
	 */
	Class EstudiantesController{
		private $config; 		//variable para el objeto de configuraciones
		private $estudiantes; 	//variable para el objeto de modelo estudiantes
		private $authKey;		//variable para el controlador de autentificación

		public function __construct($config){
			$this->config = $config;	// asignamos el objeto de configuración a la variable local

			/**
			 * Incluimos el modelo estudiantes y lo asignamos a una variable
			 */
			require_once($this->config->get('modelsDir').'Estudiantes.php');
			$this->estudiantes = new Estudiantes($this->config);

			/**
			 * Incluimos el controlador de autentificación y lo asignamos a una variable
			 */
			require_once($this->config->get('controllersDir').'AuthController.php');
			$this->authKey = new AuthController($config);
		}

		/**
		 * Función para obtener todos los alumnos de la base de datos
		 */
		public function mostrarEstudiantes($key){
			/**
			 * Comprobamos que los valores no vengan nulos
			 */
			if($this->comprobarValor($key)){
				/**
				 * Usamos la llave para obtener al usuario, si el usuario es válido
				 * se realiza una acción.
				 * Si es verdadero envía los datos de los estudiantes, si es falso
				 * devuelve error
				 */
				$user = $this->authKey->comprobarAuth($key);
				if ($user["return"]) {
					/**
					 * Se utliza la función getEstudiantes del modelo estudiantes para obtener los valores
					 */
					echo json_encode(array('return' => true, 'alumnos' => $this->estudiantes->getEstudiantes()));
				} else {
					echo json_encode(array('return' => false));
				}
				
			}else{
				echo json_encode(array('return' => false));
			}
		}

		public function mostrarEstudianteID($key, $id){
			/**
			 * Comprobamos que los valores no vengan nulos
			 */
			if($this->comprobarValor($key) && $this->comprobarValor($id)){
				
				/**
				 * Comprobamos que la llave sea de un usuario válido
				 */
				$user = $this->authKey->comprobarAuth($key);
				if ($user["return"]) {
					echo json_encode(array('return' => true, 'alumno' => $this->estudiantes->getEstudianteID($id)));
				} else {
					echo json_encode(array('return' => false));
				}
				
			}else{
				echo json_encode(array('return' => false));
			}
		}

		/**
		 * Comprobamos si los valores no son nulos
		 */
		private function comprobarValor($valor){
			if (isset($valor) && !is_null($valor)) {
				return true;
			} else {
				return false;
			}
			
		}
	}
 ?>