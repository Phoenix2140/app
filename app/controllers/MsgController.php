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
			$this->sendSuccessMessage("Operación realizada con éxito");
		}

		public function successUpdate(){
			$this->sendSuccessMessage("Se ha actualizado el registro satisfactoriamente");
		}

		public function successDelete(){
			$this->sendSuccessMessage("Se ha eliminado el registro satisfactoriamente");
		}

		/**
		 * Mensajes de Error
		 */
		public function noKeyNoId(){
			$this->sendErrMessage('La llave y/o ID son nulos');
		}

		public function invalidKey(){
			$this->sendErrMessage('Llave de acceso inválida');
		}

		public function noKeyNoName(){
			$this->sendErrMessage('La llave y/o nombre son nulos');
		}

		public function nullKey(){
			$this->sendErrMessage('Llave de acceso nula');
		}

		public function nullVar(){
			$this->sendErrMessage('Uno de los campos está vacío');
		}

		public function invalidUserPass(){
			$this->sendErrMessage('El usuario o contraseña son inválidos');
		}

		public function dateExist(){
			$this->sendErrMessage('La fecha que intenta ingresar ya existe');
		}

		public function userExist(){
			$this->sendErrMessage('El usuario que intenta ingresar ya existe');
		}		

		public function userNotExist(){
			$this->sendErrMessage('El usuario que intenta actualizar no existe');
		}

		public function dateDoesNotExist(){
			$this->sendErrMessage('La fecha que intenta editar no existe');
		}

		public function noData(){
			$this->sendErrMessage('No se encontró los datos que busca');
		}

		private function sendErrMessage($message){
			echo json_encode(array('return' => false, 'msgError' => $message));	
		}

		private function sendSuccessMessage($message){
			echo json_encode(array('return' => true, 'msg' => $message));
		}
	}
 ?>