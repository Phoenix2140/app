<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="PostDoctorado">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsePostDoctorado" aria-expanded="false" aria-controls="collapsePostDoctorado">
						          7.- Post Doctorado
						        </a>
						      </h4>
						</div>
						<div id="collapsePostDoctorado" class="panel-collapse collapse" role="tabpanel" aria-labelledby="PostDoctorado">
							      <div class="panel-body">
							        <h2>7.- Crud para Post Doctorado</h2>
									<p>6.1.1.- Para obtener todas las entradas de Post Doctorado se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/postdoc/{keyUsuario}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"postdoctorado"		: <br>
													 &emsp;&emsp;{<br>
																			&emsp;&emsp;&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_postdoct": "1",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"nombre_postdoc"	: "Nombre de post doctorado"<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"origen"	: "Origen postdoctoado"<br>
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
						
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_postdoct": "N",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"nombre_postdoc"	: "N"<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"origen"	: "N"<br>
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

							      <p>7.1.2.- Para obtener una sola entrada de Post Doctorado por su ID se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/postdoc/{keyUsuario}/{ID}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"doct"		:&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;"cod_postdoct": "1",<br>
																				&emsp;&emsp;&emsp;"nombre_postdoc"	: "Nombre de post doctorado"<br>
																				&emsp;&emsp;&emsp;"origen"	: "Origen postdoctoado"<br>
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
									<p>7.2.- Para ingresar una nueva entrada a Post Doctorado, se utiliza el método <span class="text-danger">POST</span>
										a la dirección: <span class="text-primary">/postdoc/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"nombre": "Nombre de post doctorado"<br>
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
													&emsp;"postdoctorado"		: <br>
													 &emsp;&emsp;{<br>
														&emsp;&emsp;&emsp;"cod_postdoct": "1",<br>
														&emsp;&emsp;&emsp;"nombre_postdoc"	: "Nombre de post doctorado"<br>
														&emsp;&emsp;&emsp;"origen"	: "Origen postdoctoado"<br>
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
									<p>7.3.- Para editar una entrada de Post Doctorado, se utiliza el método <span class="text-danger">PUT</span>
										a la dirección: <span class="text-primary">/postdoc/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1",<br>
													&emsp;"nombre": "Nombre de magister"<br>
													&emsp;"origen"	: "Origen postdoctoado"<br>
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
									<p>7.4.- Para eliminar un entrada de Post Doctorado, se utiliza el método <span class="text-danger">DELETE</span>
										a la dirección: <span class="text-primary">/postdoc/</span></p>
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
						</div> <!--Fin PostDoctorado-->