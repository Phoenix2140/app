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
						    <div class="panel-heading" role="tab" id="headingThree">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Collapsible Group Item #3
						        </a>
						      </h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						      <div class="panel-body">
						        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						      </div>
						    </div>
						</div>
					</div>

					
					
					
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
	
</body>
</html>
