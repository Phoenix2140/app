<?php 
	/**
	 * Controlador que muestra mensajes, de error y satisfactorios
	 */
	Class MsgController{

		//constructor vacío
		public function __construct(){}

		/**
		 * Mensajes Satisfactorios
		 */
		public function successOp(){
			echo json_encode(array('return' => true, 'msg' => "Operación realizada con éxito"));
		}

		/**
		 * Mensajes de Error
		 */
		public function noKeyNoId(){
			echo json_encode(array('return' => false, 'msgError' => 'La llave y/o ID son nulos'));
		}

		public function invalidKey(){
			echo json_encode(array('return' => false, 'msgError' => 'Llave de acceso inválida'));
		}

		public function noKeyNoName(){
			echo json_encode(array('return' => false, 'msgError' => 'La llave y/o nombre son nulos'));
		}

		public function nullKey(){
			echo json_encode(array('return' => false, 'msgError' => 'Llave de acceso nula'));
		}

		public function nullVar(){
			echo json_encode(array('return' => false, 'msgError' => 'Uno de los campos está vacío'));
		}

		public function invalidUserPass(){
			echo json_encode(array('return' => false, 'msgError' => 'El usuario o contraseña son inválidos'));
		}
	}
 ?>