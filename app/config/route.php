<?php 
	/**
	 * Se llama a la clase Router para tratar las rutas
	 * y el tipo de Método que utiliza (POST, GET u otro)
	 */
	require_once($config->get('baseDir').'Router.php');
	$ruta = new Router();

	//Incluimos los controladores necesarios
	require_once($config->get('controllersDir').'DocumentacionController.php');
	require_once($config->get('controllersDir').'LoginController.php');
	require_once($config->get('controllersDir').'EstudiantesController.php');
	require_once($config->get('controllersDir').'LineaController.php');
	require_once($config->get('controllersDir').'TipoUserController.php');
	require_once($config->get('controllersDir').'ProfesionController.php');

	//Asignamos los controladores a las variables objeto
	$login = new LoginController($config);
	$documetacion = new DocumentacionController($config);
	$ctrlEstudiante = new EstudiantesController($config);
	$ctrlLinea = new LineaController($config);
	$ctrlTipoUser = new TipoUserController($config);
	$ctrlProfesion = new ProfesionController($config);

	$seccion = $config->get('deep'); //Asignamos la variable de profundidad a la sección, para dividir la profundidad de la ruta

	/**
	 * Se separan las rutas por los métodos GET y POST
	 * que son los métodos más utilizados, se pueden 
	 * incorporar otros según se requiera.
	 */
	if($ruta->get() == 'GET'){

		/**
		 * Se obtiene el enlace de la dirección web y se divide
		 * para poder tratarlas con un switch.
		 *
		 */
		$enlace = $ruta->enlace();

		/**
		 * El Switch utiliza una accion dependiendo de la ruta.
		 */
		switch ($enlace[$seccion]){
			case 'doc': $documetacion->indexAction();
				break;
			case 'estudiantes':
				/**
				 * Si existe la llave realiza la función, sino devuelve un false
				 */
				if(isset($enlace[$seccion+1])){
					/**
					 * Si existe el ID de estudiante se realiza la opción única para obtener
					 * un usuario, si no tiene el ID de estudiante se devuelven todos los estudiantes 
					 */
					if(is_null($enlace[$seccion+2])){
						//Se le envía el parámetro 1 = key y el parametro 2 es el id o rut
						$ctrlEstudiante->mostrarEstudianteID($enlace[$seccion+1], 
							$enlace[$seccion+2]);
					}else{
						$ctrlEstudiante->mostrarEstudiantes($enlace[$seccion+1]);
					}
				}else{
					noKey(); //Mensaje de error ()
				}
				break;
			case 'lineas':
				if(isset($enlace[$seccion+1])){
					
					$ctrlLinea->obtenerListaLinea($enlace[$seccion+1]);
				}else{
					noKey(); //Mensaje de error ()
				}
				break;

			case 'linea':
				if(isset($enlace[$seccion+1]) && isset($enlace[$seccion+2])){
					
					$ctrlLinea->obtenerLineaID($enlace[$seccion+1], $enlace[$seccion+2]);
				}else{
					noKey(); //Mensaje de error ()
				}
				break;
			case 'tipouser':
				if(isset($enlace[$seccion+1]) && isset($enlace[$seccion+2])){
					
					$ctrlTipoUser->getTipoUserById($enlace[$seccion+1], $enlace[$seccion+2]);//obtenemos un solo dato por el ID
				}elseif(isset($enlace[$seccion+1])){

					$ctrlTipoUser->getListTipoUser($enlace[$seccion+1]); //Obtenemos la lista completa
				}else{
					noKey(); //Mensaje de error ()
				}
				break;
			case 'profesion':
				if(isset($enlace[$seccion+1]) && isset($enlace[$seccion+2])){
					
					$ctrlProfesion->getProfesionID($enlace[$seccion+1], $enlace[$seccion+2]);//obtenemos un solo dato por el ID
				}elseif(isset($enlace[$seccion+1])){

					$ctrlProfesion->getProfesion($enlace[$seccion+1]); //Obtenemos la lista completa
				}else{
					noKey(); //Mensaje de error ()
				}
				break;
			default:
				noAction();
				break;
		}

	}elseif($ruta->get() == 'POST'){
		/**
		 * No está implementado, pero es similar a los pasos del
		 * Método GET con el switch
		 */
		$enlace = $ruta->enlace();

		switch ($enlace[$seccion]){
			case 'login': $login->login($_POST);
				break;
			case 'linea': $ctrlLinea->crearLinea($_POST);
				break;
			case 'tipouser': $ctrlTipoUser->createTipoUser($_POST);
				break;
			case 'profesion': $ctrlProfesion->createProfesion($_POST);
				break;
			default: noAction();
				break;
		}

	}elseif($ruta->get() == 'PUT'){
		
		$_PUT = $ruta->getDATA(); //Obtenemos los datos enviados mediante el método PUT
		
		$enlace = $ruta->enlace();

		switch ($enlace[$seccion]) {
			case 'linea': $ctrlLinea->actualizarLineaID($_PUT);
				break;
			case 'tipouser': $ctrlTipoUser->updateTipoUser($_PUT);
				break;
			case 'profesion': $ctrlProfesion->updateProfesion($_PUT);
				break;
			default: noAction();
				break;
		}

	}elseif($ruta->get() == 'DELETE'){
		
		$_DELETE = $ruta->getDATA(); //Obtenemos los datos enviados mediante el método DELETE

		$enlace = $ruta->enlace();

		switch ($enlace[$seccion]) {
			case 'linea': $ctrlLinea->eliminarLineaID($_DELETE);
				break;
			case 'tipouser': $ctrlTipoUser->deleteTipoUser($_DELETE);
				break;
			case 'profesion': $ctrlProfesion->deleteProfesion($_DELETE);
				break;
			default: noAction();
				break;
		}

	}else{
		/**
		 * Pueden agregarse más Métodos
		 */
		noAction();
	}

	function noAction(){
		echo json_encode(array('response' => false, 'msgError' => 'No se detectó acción alguna'));
	}

	function noKey(){
		echo json_encode(array('response' => false, 'msgError' => 'No se proporcionó la llave de acceso'));
	}
 ?>