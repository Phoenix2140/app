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