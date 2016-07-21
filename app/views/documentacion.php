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
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headLogin">
						      <h4 class="panel-title">
						        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseLogin" aria-expanded="true" aria-controls="collapseLogin">
						          1.- Login
						        </a>
						      </h4>
						    </div>
						    <div id="collapseLogin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headLogin">
						      <div class="panel-body">
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
						      </div>
						    </div>
						</div>
						<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headLinea">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseLinea" aria-expanded="false" aria-controls="collapseLinea">
						          2.- Líneas de Investigación
						        </a>
						      </h4>
						    </div>
						    <div id="collapseLinea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headLinea">
						      <div class="panel-body">
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
								<p>2.3.- Para Modificar una línea se utiliza el método <span class="text-danger">PUT</span>
									a la dirección: <span class="text-primary">/linea/</span></p>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<p>Campos de envío</p>
									<div class="well well-sm">
										<code>
											{<br>
												&emsp;"key": "llave_de_usuario",<br>
												&emsp;"id": "1",<br>
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
												&emsp;"msg"		: "Mensaje satisfactorio"<br>
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
								<p>2.4.- Para eliminar una línea se utiliza el método <span class="text-danger">DELETE</span>
									a la dirección: <span class="text-primary">/linea/</span></p>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<p>Campos de envío</p>
									<div class="well well-sm">
										<code>
											{<br>
												&emsp;"key": "llave_de_usuario",<br>
												&emsp;"id": "1"<br>
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
												&emsp;"msg"		: "Mensaje satisfactorio"<br>
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
						<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="tipoUser">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTipoUser" aria-expanded="false" aria-controls="collapseTipoUser">
						          3.- Tipo User
						        </a>
						      </h4>
						</div>
						<div id="collapseTipoUser" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tipoUser">
							      <div class="panel-body">
							        <h2>3.- Crud para los Tipos de Usuario</h2>
									<p>3.1.1.- Para obtener todos los tipos de usuario se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/tipouser/{keyUsuario}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"tipoUser"		: <br>
													 &emsp;&emsp;{<br>
																			&emsp;&emsp;&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_user": "1",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"desc_user"	: "Estudiante"<br>
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
						
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_user": "N",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"desc_user"	: "N"<br>
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

							      <p>3.1.2.- Para obtener un tipo de usuario por su ID se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/tipouser/{keyUsuario}/{ID}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"tipoUser"		:&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;"cod_user": "1",<br>
																				&emsp;&emsp;&emsp;"desc_user"	: "Estudiante"<br>
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
									<p>3.2.- Para ingresar un nuevo tipo de usuario se utiliza el método <span class="text-danger">POST</span>
										a la dirección: <span class="text-primary">/tipouser/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"descripcion": "Descripción del tipo usuario"<br>
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
													&emsp;"tipoUser"		: <br>
													 &emsp;&emsp;{<br>
														&emsp;&emsp;&emsp;"cod_user": "1",<br>
														&emsp;&emsp;&emsp;"desc_user"	: "descripción"<br>
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
									<p>3.3.- Para editar un tipo de usuario se utiliza el método <span class="text-danger">PUT</span>
										a la dirección: <span class="text-primary">/tipouser/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1",<br>
													&emsp;"descripcion": "Descripción del tipo usuario"<br>
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
													&emsp;"msg"		: "Mensaje satisfactorio"<br>
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
									<p>3.4.- Para eliminar un tipo de usuario se utiliza el método <span class="text-danger">DELETE</span>
										a la dirección: <span class="text-primary">/tipouser/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1"<br>
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
													&emsp;"msg"		: "Mensaje satisfactorio"<br>
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
						<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="Profesion">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseProfesion" aria-expanded="false" aria-controls="collapseProfesion">
						          4.- Profesion
						        </a>
						      </h4>
						</div>
						<div id="collapseProfesion" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Profesion">
							      <div class="panel-body">
							        <h2>4.- Crud para Profesión</h2>
									<p>3.1.1.- Para obtener todas las profesiones se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/profesion/{keyUsuario}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"profesion"		: <br>
													 &emsp;&emsp;{<br>
																			&emsp;&emsp;&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_prof": "1",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"nom_prof"	: "Agronomo"<br>
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
						
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_prof": "N",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"nom_prof"	: "N"<br>
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

							      <p>4.1.2.- Para obtener una sola profesión por su ID se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/profesion/{keyUsuario}/{ID}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"profesion"		:&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;"cod_prof": "1",<br>
																				&emsp;&emsp;&emsp;"nom_prof"	: "Agronomo"<br>
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
									<p>4.2.- Para ingresar una nueva profesión se utiliza el método <span class="text-danger">POST</span>
										a la dirección: <span class="text-primary">/profesion/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"profesion": "Descripción del tipo usuario"<br>
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
													&emsp;"tipprofesionoUser"		: <br>
													 &emsp;&emsp;{<br>
														&emsp;&emsp;&emsp;"cod_prof": "1",<br>
														&emsp;&emsp;&emsp;"nom_prof"	: "nombre_profesión"<br>
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
									<p>4.3.- Para editar una profesión se utiliza el método <span class="text-danger">PUT</span>
										a la dirección: <span class="text-primary">/profesion/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1",<br>
													&emsp;"profesion": "nombre de la profesión"<br>
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
													&emsp;"msg"		: "Mensaje satisfactorio"<br>
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
									<p>4.4.- Para eliminar un tipo de usuario se utiliza el método <span class="text-danger">DELETE</span>
										a la dirección: <span class="text-primary">/profesion/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1"<br>
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
													&emsp;"msg"		: "Mensaje satisfactorio"<br>
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
						</div> <!--Fin Profesión-->

						<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="Magister">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMagister" aria-expanded="false" aria-controls="collapseMagister">
						          5.- Magister
						        </a>
						      </h4>
						</div>
						<div id="collapseMagister" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Magister">
							      <div class="panel-body">
							        <h2>5.- Crud para Magister</h2>
									<p>5.1.1.- Para obtener todas las entradas de magister se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/magister/{keyUsuario}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"magister"		: <br>
													 &emsp;&emsp;{<br>
																			&emsp;&emsp;&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_mg": "1",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"nom_mg"	: "Nombre de magister"<br>
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
						
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_mg": "N",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"nom_mg"	: "N"<br>
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

							      <p>5.1.2.- Para obtener una sola entrada de magister por su ID se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/magister/{keyUsuario}/{ID}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"magister"		:&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;"cod_mg": "1",<br>
																				&emsp;&emsp;&emsp;"nom_mg"	: "Nombre Magister"<br>
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
									<p>5.2.- Para ingresar una nueva entrada a magister, se utiliza el método <span class="text-danger">POST</span>
										a la dirección: <span class="text-primary">/magister/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"nombre": "Nombre de magister"<br>
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
													&emsp;"magister"		: <br>
													 &emsp;&emsp;{<br>
														&emsp;&emsp;&emsp;"cod_mg": "1",<br>
														&emsp;&emsp;&emsp;"nom_mg"	: "Nombre Magister"<br>
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
									<p>5.3.- Para editar una entrada de magister, se utiliza el método <span class="text-danger">PUT</span>
										a la dirección: <span class="text-primary">/magister/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1",<br>
													&emsp;"nombre": "Nombre de magister"<br>
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
													&emsp;"msg"		: "Mensaje satisfactorio"<br>
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
									<p>5.4.- Para eliminar un entrada de magister, se utiliza el método <span class="text-danger">DELETE</span>
										a la dirección: <span class="text-primary">/magister/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1"<br>
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
													&emsp;"msg"		: "Mensaje satisfactorio"<br>
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
						</div> <!--Fin Magister-->

						<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="Doctorado">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseDoctorado" aria-expanded="false" aria-controls="collapseDoctorado">
						          6.- Doctorado
						        </a>
						      </h4>
						</div>
						<div id="collapseDoctorado" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Doctorado">
							      <div class="panel-body">
							        <h2>6.- Crud para Doctorado</h2>
									<p>6.1.1.- Para obtener todas las entradas de Doctorado se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/doctorado/{keyUsuario}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"doctorado"		: <br>
													 &emsp;&emsp;{<br>
																			&emsp;&emsp;&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_doct": "1",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"nom_doct"	: "Nombre de magister"<br>
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
						
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_doct": "N",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"nom_doct"	: "N"<br>
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

							      <p>6.1.2.- Para obtener una sola entrada de Doctorado por su ID se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/doctorado/{keyUsuario}/{ID}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"doct"		:&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;"cod_doct": "1",<br>
																				&emsp;&emsp;&emsp;"nom_doct"	: "Nombre Magister"<br>
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
									<p>6.2.- Para ingresar una nueva entrada a Doctorado, se utiliza el método <span class="text-danger">POST</span>
										a la dirección: <span class="text-primary">/doctorado/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"nombre": "Nombre de doctorado"<br>
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
													&emsp;"doctorado"		: <br>
													 &emsp;&emsp;{<br>
														&emsp;&emsp;&emsp;"cod_doct": "1",<br>
														&emsp;&emsp;&emsp;"nom_doct"	: "Nombre Magister"<br>
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
									<p>6.3.- Para editar una entrada de Doctorado, se utiliza el método <span class="text-danger">PUT</span>
										a la dirección: <span class="text-primary">/doctorado/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1",<br>
													&emsp;"nombre": "Nombre de magister"<br>
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
													&emsp;"msg"		: "Mensaje satisfactorio"<br>
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
									<p>6.4.- Para eliminar un entrada de magister, se utiliza el método <span class="text-danger">DELETE</span>
										a la dirección: <span class="text-primary">/doctorado/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1"<br>
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
													&emsp;"msg"		: "Mensaje satisfactorio"<br>
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
						</div> <!--Fin Magister-->

						
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
	
</body>
</html>
