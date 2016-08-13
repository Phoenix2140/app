<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="Resp">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseResp" aria-expanded="false" aria-controls="collapseResp">
						          8.- Resp
						        </a>
						      </h4>
						</div>
						<div id="collapseResp" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Resp">
							      <div class="panel-body">
							        <h2>8.- Crud para Resp</h2>
									<p>6.1.1.- Para obtener todas las entradas de Resp se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/resp/{keyUsuario}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"resp"		: <br>
													 &emsp;&emsp;{<br>
																			&emsp;&emsp;&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_resp": "1",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"descripcion_postdoct"	: "Nombre de Descripcion"<br>
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
						
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_resp": "N",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"descripcion_postdoct"	: "N"<br>
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

							      <p>8.1.2.- Para obtener una sola entrada de Resp por su ID se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/resp/{keyUsuario}/{ID}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"resp"		:&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;"cod_resp": "1",<br>
																				&emsp;&emsp;&emsp;"descripcion_resp"	: "Nombre de Descripcion"<br>
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
									<p>8.2.- Para ingresar una nueva entrada a Resp, se utiliza el método <span class="text-danger">POST</span>
										a la dirección: <span class="text-primary">/resp/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"descripcion": "Descripción de resp"<br>
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
													&emsp;"resp"		: <br>
													 &emsp;&emsp;{<br>
														&emsp;&emsp;&emsp;"cod_resp": "1",<br>
														&emsp;&emsp;&emsp;"descripcion_resp"	: "Nombre de Descripcion"<br>
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
									<p>8.3.- Para editar una entrada de Post Doctorado, se utiliza el método <span class="text-danger">PUT</span>
										a la dirección: <span class="text-primary">/resp/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"id": "1",<br>
													&emsp;"descripcion": "Nombre de Resp"<br>
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
									<p>8.4.- Para eliminar un entrada de Resp, se utiliza el método <span class="text-danger">DELETE</span>
										a la dirección: <span class="text-primary">/resp/</span></p>
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