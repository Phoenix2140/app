<?php 
	/**
	 * Se llama a la clase Router para tratar las rutas
	 * y el tipo de Método que utiliza (POST, GET u otro)
	 */
	require_once($config->get('baseDir').'Router.php');
	$ruta = new Router();

	require_once($config->get('controllersDir').'DocumentacionController.php');
	$documetacion = new DocumentacionController($config);

	require_once($config->get('controllersDir').'LoginController.php');
	$login = new LoginController($config);

	require_once($config->get('controllersDir').'EstudiantesController.php');
	$controladorEstudiantes = new EstudiantesController($config);

	
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
		switch ($enlace[$config->get('deep')]){
			case 'doc':
				$documetacion->indexAction();
				break;
			case 'estudiantes':
				/**
				 * Si existe la llave realiza la función, sino devuelve un false
				 */
				if(isset($enlace[$config->get('deep')+1])){
					/**
					 * Si existe el ID de estudiante se realiza la opción única para obtener
					 * un usuario, si no tiene el ID de estudiante se devuelven todos los estudiantes 
					 */
					if(is_null($enlace[$config->get('deep')+2])){
						//Se le envía el parámetro 1 = key y el parametro 2 es el id o rut
						$controladorEstudiantes->mostrarEstudianteID($enlace[$config->get('deep')+1], 
							$enlace[$config->get('deep')+2]);
					}else{
						$controladorEstudiantes->mostrarEstudiantes($enlace[$config->get('deep')+1]);
					}
				}else{

				}
				break;
			default:
				echo json_encode(array('response' => false));
				break;
		}

	}elseif($ruta->get() == 'POST'){
		/**
		 * No está implementado, pero es similar a los pasos del
		 * Método GET con el switch
		 */
		$enlace = $ruta->enlace();

		switch ($enlace[$config->get('deep')]){
			case 'login':
				
				$login->login($_POST);
				break;
			default:
				echo json_encode(array('response' => false));
				break;
		}

	}else{
		/**
		 * Pueden agregarse más Métodos
		 */
		echo "Nothing";
	}
 ?>