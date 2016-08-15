<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="Linearep">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseLinearep" aria-expanded="false" aria-controls="collapseLinearep">
						          10.- Linearep
						        </a>
						      </h4>
						</div>
						<div id="collapseLinearep" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Linearep">
							      <div class="panel-body">
							        <h2>10.- Crud para LineaRep</h2>
									<p>10.1.1.- Para obtener todas las entradas de LineaRep se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/linearep/{keyUsuario}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"linearep"		: <br>
													 &emsp;&emsp;{<br>
																			&emsp;&emsp;&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"fecha_adscripcion": "YYYY-MM-DD",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"rut": "111",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_linea": "1",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_resp": "1"<br>
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
						
																			&emsp;&emsp;&emsp;&emsp;},<br>
																			&emsp;&emsp;&emsp;&emsp;{<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"fecha_adscripcion": "YYYY-MM-DD",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"rut": "N",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_linea": "N",<br>
																				&emsp;&emsp;&emsp;&emsp;&emsp;"cod_resp": "N"<br>
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

							      <p>10.1.2.- Para obtener una sola entrada de LineaRep por su ID se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/linearep/{keyUsuario}/{YYYY-MM-DD}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"linearep"		:&emsp;&emsp;{ <br>
																				&emsp;&emsp;&emsp;"fecha_adscripcion": "YYYY-MM-DD",<br>
																				&emsp;&emsp;&emsp;"rut": "111",<br>
																				&emsp;&emsp;&emsp;"cod_linea": "1",<br>
																				&emsp;&emsp;&emsp;"cod_resp": "1"<br>
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
									<p>10.2.- Para ingresar una nueva entrada a LineaRep, se utiliza el método <span class="text-danger">POST</span>
										a la dirección: <span class="text-primary">/linearep/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"inicio": "YYYY-MM-DD",<br>
													&emsp;"rut": "111",<br>
													&emsp;"linea": "1",<br>
													&emsp;"resp": "1"<br>
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
													&emsp;"linearep"		: <br>
													 &emsp;&emsp;{<br>
														&emsp;&emsp;&emsp;"fecha_adscripcion": "YYYY-MM-DD",<br>
														&emsp;&emsp;&emsp;"cod_resp": "1",<br>
														&emsp;&emsp;&emsp;"cod_linea": "1",<br>
														&emsp;&emsp;&emsp;"rut": "111"<br>
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
									<p>10.3.- Para editar una entrada de LineaRep, se utiliza el método <span class="text-danger">PUT</span>
										a la dirección: <span class="text-primary">/linearep/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"inicio": "YYYY-MM-DD",<br>
													&emsp;"rut": "111",<br>
													&emsp;"linea": "1",<br>
													&emsp;"resp": "1"<br>
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
									<p>10.4.- Para eliminar un entrada de LineaRep, se utiliza el método <span class="text-danger">DELETE</span>
										a la dirección: <span class="text-primary">/linearep/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"fecha": "YYYY-MM-DD"<br>
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