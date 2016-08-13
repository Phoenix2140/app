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