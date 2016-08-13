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