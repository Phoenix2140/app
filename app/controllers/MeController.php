<?php 
	/**
	 * Controlador que devuelve el estado de la sesión
	 */
	Class MeController{
		private $msgController;

		public function __construct($config){
			require_once($config->get('controllersDir').'MsgController.php');
			$this->msgController = new MsgController();
		}
	}

	public function me(){
		if(isset($_SESSION["key"]) && $_SESSION["key"] != null){
			
			echo json_encode(array('response' => true, 'key' => $_SESSION["key"]));
		}else{
			$this->msgController->noSession();
		}
	}
 ?>