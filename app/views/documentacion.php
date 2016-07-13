<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Documentación api</title>
	<link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h1>Documentación de la API</h1>
					<br>
					<h2>1.- Login</h2>
					<p>1.1.-El login se envía mediante el método <span class="text-danger">POST</span> a la URL 
						<span class="text-primary">/login</span>.</p>

					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p>Campos de envío</p>
						<div class="well well-sm">
							<code>
								{<br>
									&emsp;"user": "rut-usuario",<br>
									&emsp;"pass": "su contraseña"<br>
								}
							</code>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p>Retorna (si obtiene respuesta afirmativa)</p>
						<div class="well well-sm">
							<code>
								{<br>&emsp;"return" 	: true,
								<br>&emsp;"user"		: {
									<br>&emsp;&emsp;"nombre": "Juan Nieves",
									<br>&emsp;&emsp;"rol": "Admin",
									<br>&emsp;&emsp;"key"	: "LlaveDeAccesoExtraLarga"<br>
									&emsp;}<br>
								}
							</code>
						</div>
						<p>Si es erronea retorna</p>
						<div class="well well-sm">
							<code>
								{<br>
									&emsp;"return": false,<br>
									&emsp;"msgError": "Mensaje de error"<br>
								}
							</code>
						</div>
					</div>
					
					<!--Sección de usuarios-->
					<!-- <h2>2.- Crud estudiantes</h2>
					<p>2.1.- Para leer los estudiantes existen 2 posibilidades, obtenerlos todos o 
						obtener un estudiante por su ID.</p>
					<p>2.1.1.- Para obtener todos los estudiantes se utiliza el método 
						<span class="text-danger">GET</span> a la siguiente dirección: 
						<span class="text-primary">/estudiantes/{keyUsuario}</span> </p>

					<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
						<p>Retorna (si obtiene respuesta afirmativa)</p>
						<code>
							<div class="well well-sm">
								{<br>
									&emsp;"return" 	: true,<br>
									&emsp;"alumnos"		: <br>
									 &emsp;&emsp;{<br>
															&emsp;&emsp;&emsp;&emsp;{ <br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"rut": "111",<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"nombre"	: "Juan"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"apellido_p"	: "Targaryen"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"apellido_m"	: "Stark"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"fecha_in"	: "05-03-2011"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"domicilio"	: "Winterfell"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"telefono"	: "----"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"profesion"	: "Espadachín"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"t_estudio"	: true/false<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"situacion"	: true/false<br>
															&emsp;&emsp;&emsp;&emsp;},<br>
															&emsp;&emsp;&emsp;&emsp;{<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
		
															&emsp;&emsp;&emsp;&emsp;},<br>
															&emsp;&emsp;&emsp;&emsp;{<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"rut": "N",<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"nombre"	: "N"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"apellido_p"	: "N"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"apellido_m"	: "N"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"fecha_in"	: "N"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"domicilio"	: "N"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"telefono"	: "N"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"profesion"	: "N"<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"t_estudio"	: true/false<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"situacion"	: true/false<br>

															&emsp;&emsp;&emsp;&emsp;} <br>
									&emsp;&emsp;}<br>
								}
							</div>
						</code>
						<p>Si es erronea retorna</p>
						<code>
							<div class="well well-sm">
								{<br>
									&emsp;"return": false<br>
								}
							</div>
						</code>
					</div>
					<p>2.1.2.- Para obtener un único estudiante por su rut se utiliza el método 
						<span class="text-danger">GET</span> a la siguiente dirección: 
						<span class="text-primary">/estudiantes/{keyUsuario}/{id-rut}</span> </p>
					<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
						<p>Retorna (si obtiene respuesta afirmativa)</p>
						<code>
							<div class="well well-sm">
								{<br>
									&emsp;"return" 	: true,<br>
									&emsp;"alumno"		: {<br>
									&emsp;&emsp;{ <br>
																&emsp;&emsp;"rut": "111",<br>
																&emsp;&emsp;"nombre"	: "Juan"<br>
																&emsp;&emsp;"apellido_p"	: "Targaryen"<br>
																&emsp;&emsp;"apellido_m"	: "Stark"<br>
																&emsp;&emsp;"fecha_in"	: "05-03-2011"<br>
																&emsp;&emsp;"domicilio"	: "Winterfell"<br>
																&emsp;&emsp;"telefono"	: "----"<br>
																&emsp;&emsp;"profesion"	: "Espadachín"<br>
																&emsp;&emsp;"t_estudio"	: true/false<br>
																&emsp;&emsp;"situacion"	: true/false<br>
									&emsp;&emsp;} <br>
									&emsp;}<br>
								}
							</div>
						</code>
						<p>Si es erronea retorna</p>
						<code>
							<div class="well well-sm">
								{<br>
									&emsp;"return": false<br>
								}
							</div>
						</code>
					</div> -->
					<h2>2.- Crud para las Líneas de investigación</h2>
					<p>2.1.1.- Para obtener todas las líneas se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
						<span class="text-primary">/lineas/{keyUsuario}</span></p>
					<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
						<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
						<div class="well well-sm">
							<code>
								{<br>
									&emsp;"return" 	: true,<br>
									&emsp;"lineas"		: <br>
									 &emsp;&emsp;{<br>
															&emsp;&emsp;&emsp;&emsp;{ <br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"cod_linea": "1",<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"nom_linea"	: "Juan"<br>
															&emsp;&emsp;&emsp;&emsp;},<br>
															&emsp;&emsp;&emsp;&emsp;{<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
		
															&emsp;&emsp;&emsp;&emsp;},<br>
															&emsp;&emsp;&emsp;&emsp;{<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"cod_linea": "N",<br>
																&emsp;&emsp;&emsp;&emsp;&emsp;"nom_linea"	: "N"<br>
															&emsp;&emsp;&emsp;&emsp;} <br>
									&emsp;&emsp;}<br>
								}
							</code>
						</div>
						<p>Si es erronea retorna</p>
						<div class="well well-sm">
							<code>
								{<br>
									&emsp;"return": false,<br>
									&emsp;"msgError": "Mensaje de error"<br>
								}
							</code>
						</div>
					</div>
					<p>2.1.2.- Para obtener una determinada linea por su ID, usar el método <span class="text-danger">GET</span> a la siguiente dirección: 
						<span class="text-primary">/linea/{keyUsuario}/{cod_linea}</span></p>
					<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
						<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
						<div class="well well-sm">
							<code>
								{<br>
									&emsp;"return" 	: true,<br>
									&emsp;"linea"		: <br>
									 &emsp;&emsp;{<br>
										&emsp;&emsp;&emsp;"cod_linea": "1",<br>
										&emsp;&emsp;&emsp;"nom_linea"	: "Juan"<br>
									&emsp;&emsp;}<br>
								}
							</code>
						</div>
						<p>Si es erronea retorna</p>
						<div class="well well-sm">
							<code>
								{<br>
									&emsp;"return": false,<br>
									&emsp;"msgError": "Mensaje de error"<br>
								}
							</code>
						</div>
					</div>
					<p>2.2.- Para ingresar una nueva línea se utiliza el método <span class="text-danger">POST</span>
						a la dirección: <span class="text-primary">/linea/</span></p>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p>Campos de envío</p>
						<div class="well well-sm">
							<code>
								{<br>
									&emsp;"key": "llave_de_usuario",<br>
									&emsp;"nombre": "Nombre de linea"<br>
								}
							</code>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p>Retorna (si obtiene respuesta afirmativa)</p>
						<div class="well well-sm">
							<code>
								{<br>
									&emsp;"return" 	: true,<br>
									&emsp;"linea"		: <br>
									 &emsp;&emsp;{<br>
										&emsp;&emsp;&emsp;"cod_linea": "1",<br>
										&emsp;&emsp;&emsp;"nom_linea"	: "Juan"<br>
									&emsp;&emsp;}<br>
								}
							</code>
						</div>
						<p>Si es erronea retorna</p>
						<div class="well well-sm">
							<code>
								{<br>
									&emsp;"return" 	: false,<br>
									&emsp;"msgError"		: "Mensaje de error"<br>
								}
							</code>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>
