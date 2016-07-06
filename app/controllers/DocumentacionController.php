<?php 
	/**
	 * Controlador que muestra la página de documentación para la api
	 */
	Class DocumentacionController{
		private $config; //Crea una copia del objeto de configuraciones
		private $view; //Objeto que guardará y mostrará la vista renderizada

		/**
		 * Constructor de la clase
		 */
		public function __construct($config){
			$this->config = $config; // asignamos la configuración a la variable de configuración local de la clase

			/**
			 * Importamos la librería base Template y creamos un nuevo objeto de tipo Template
			 * para generar las vistas
			 */
			require_once($this->config->get('baseDir').'Template.php');
			$this->view = new Template();
		}

		public function indexAction(){
			$this->view->baseUrl = $this->config->get('baseUrl'); //obtenemos la URL base del proyecto para pasarla a la vista

			echo $this->view->render($this->config->get('viewsDir').'documentacion.php');
		}
	}
 ?>