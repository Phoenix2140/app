<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="Laboratorio">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseLaboratorio" aria-expanded="false" aria-controls="collapseLaboratorio">
						          9.- Laboratorio
						        </a>
						      </h4>
						</div>
						<div id="collapseLaboratorio" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Laboratorio">
							      <div class="panel-body">
							        <h2>9.- Crud para Laboratorio</h2>
									<p>9.1.1.- Para obtener todas las entradas de Laboratorio se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/laboratorio/{keyUsuario}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"laboratorio"		: <br>
													 &emsp;&emsp;{<br>
																			&emsp;&emsp;&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_lab": "1",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"des_lab": "descripción",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"nom_encargado"	: "nombre"<br>
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
						
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_lab": "N",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"des_lab": "N",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"nom_encargado"	: "N"<br>
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

							      <p>8.1.2.- Para obtener una sola entrada de Laboratorio por su ID se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/laboratorio/{keyUsuario}/{ID}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"laboratorio"		:&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;"cod_lab": "1",<br>
																				&emsp;&emsp;&emsp;"des_lab": "descripción",<br>
																				&emsp;&emsp;&emsp;"nom_encargado"	: "nombre"<br>
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
									<p>8.2.- Para ingresar una nueva entrada a Laboratorio, se utiliza el método <span class="text-danger">POST</span>
										a la dirección: <span class="text-primary">/laboratorio/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"descripcion": "Descripción de laboratorio",<br>
													&emsp;"encargado": "Encargado de laboratorio"<br>
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
													&emsp;"laboratorio"		: <br>
													 &emsp;&emsp;{<br>
														&emsp;&emsp;&emsp;"cod_lab": "1",<br>
														&emsp;&emsp;&emsp;"des_lab": "descripción",<br>
														&emsp;&emsp;&emsp;"nom_encargado"	: "nombre"<br>
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
									<p>8.3.- Para editar una entrada de Laboratorio, se utiliza el método <span class="text-danger">PUT</span>
										a la dirección: <span class="text-primary">/laboratorio/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1",<br>
													&emsp;"descripcion": "Nombre de Resp",<br>
													&emsp;"encargado": "Encargado de laboratorio"<br>
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
									<p>8.4.- Para eliminar un entrada de Laboratorio, se utiliza el método <span class="text-danger">DELETE</span>
										a la dirección: <span class="text-primary">/laboratorio/</span></p>
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
						</div> <!--Fin Resp-->