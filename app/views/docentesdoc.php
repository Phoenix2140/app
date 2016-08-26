						<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="Docentes">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseDocentes" aria-expanded="false" aria-controls="collapseDocentes">
						          11.- Docentes
						        </a>
						      </h4>
						</div>
						<div id="collapseDocentes" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Docentes">
							      <div class="panel-body">
							        <h2>11.- Crud para Docentes</h2>
									<p>11.1.1.- Para obtener todas las entradas de Docentes se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/docentes/{keyUsuario}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"docentes"		: <br>
													 &emsp;&emsp;{<br>
														&emsp;&emsp;&emsp;&emsp;{ <br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"rut": "111",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"nombre": "Nombre Docente",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"ap_pat": "Apellido1",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"ap_mat": "Apellido2",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"email": "usuario@email.com",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"telefono": "123",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"fecha_contratacion": "2016\/01\/01",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"docentecol": "null",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"extranjero": "0",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"estado": "1",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_postdoc": "1",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_doct": "1",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_mg": "1",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_tipo_profesor": "1",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_jerarquia": "1",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_prof"	: "1"<br>
														&emsp;&emsp;&emsp;&emsp;},<br>
														&emsp;&emsp;&emsp;&emsp;{<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;... <br>
	
														&emsp;&emsp;&emsp;&emsp;},<br>
														&emsp;&emsp;&emsp;&emsp;{<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"rut": "N",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"nombre": "N",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"ap_pat": "N",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"ap_mat": "N",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"email": "n@n.n",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"telefono": "N",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"fecha_contratacion": "NNNN\/NN\/NN",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"docentecol": "null",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"extranjero": "BOOL",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"estado": "BOOL",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_postdoc": "TINYINT",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_doct": "TINYINT",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_mg": "TINYINT",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_tipo_profesor": "TINYINT",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_jerarquia": "TINYINT",<br>
															&emsp;&emsp;&emsp;&emsp;&emsp;"cod_prof"	: "TINYINT"<br>
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

							      <p>11.1.2.- Para obtener una sola entrada de Docentes por su ID se utiliza el método <span class="text-danger">GET</span> a la siguiente dirección: 
										<span class="text-primary">/docentes/{keyUsuario}/{ID}</span></p>
									<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6">
										<p>Si el resultado es afirmativo, retorna el siguiente JSON</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"return" 	: true,<br>
													&emsp;"docente"		:&emsp;&emsp;{ <br>
																			&emsp;&emsp;&emsp;"rut": "111",<br>
																			&emsp;&emsp;&emsp;"nombre": "Nombre Docente",<br>
																			&emsp;&emsp;&emsp;"ap_pat": "Apellido1",<br>
																			&emsp;&emsp;&emsp;"ap_mat": "Apellido2",<br>
																			&emsp;&emsp;&emsp;"email": "usuario@email.com",<br>
																			&emsp;&emsp;&emsp;"telefono": "123",<br>
																			&emsp;&emsp;&emsp;"fecha_contratacion": "2016\/01\/01",<br>
																			&emsp;&emsp;&emsp;"docentecol": "null",<br>
																			&emsp;&emsp;&emsp;"extranjero": "BOOL",<br>
																			&emsp;&emsp;&emsp;"estado": "BOOL",<br>
																			&emsp;&emsp;&emsp;"cod_postdoc": "TINYINT",<br>
																			&emsp;&emsp;&emsp;"cod_doct": "TINYINT",<br>
																			&emsp;&emsp;&emsp;"cod_mg": "TINYINT",<br>
																			&emsp;&emsp;&emsp;"cod_tipo_profesor": "TINYINT",<br>
																			&emsp;&emsp;&emsp;"cod_jerarquia": "TINYINT",<br>
																			&emsp;&emsp;&emsp;"cod_prof"	: "TINYINT"<br>
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
									<p>11.2.- Para ingresar una nueva entrada a Docentes, se utiliza el método <span class="text-danger">POST</span>
										a la dirección: <span class="text-primary">/docentes/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"rut": "rut",<br>
													&emsp;"nombre": "nombre_docente",<br>
													&emsp;"appat": "apellido_paterno",<br>
													&emsp;"apmat": "apellido_materno",<br>
													&emsp;"email": "email@email.com",<br>
													&emsp;"fono": "fono_docente",<br>
													&emsp;"fecha": "YYYY/MM/DD",<br>
													&emsp;"postdoc": "N",<br>
													&emsp;"doct": "N",<br>
													&emsp;"mg": "N",<br>
													&emsp;"profesor": "N",<br>
													&emsp;"jerarquia": "N",<br>
													&emsp;"extranjero": "BOOL",<br>
													&emsp;"prof": "N"<br>
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
													&emsp;"docente"		: <br>
													 &emsp;&emsp;{<br>
														&emsp;&emsp;&emsp;"rut": "111",<br>
															&emsp;&emsp;&emsp;"nombre": "Nombre Docente",<br>
															&emsp;&emsp;&emsp;"ap_pat": "Apellido1",<br>
															&emsp;&emsp;&emsp;"ap_mat": "Apellido2",<br>
															&emsp;&emsp;&emsp;"email": "usuario@email.com",<br>
															&emsp;&emsp;&emsp;"telefono": "123",<br>
															&emsp;&emsp;&emsp;"fecha_contratacion": "2016\/01\/01",<br>
															&emsp;&emsp;&emsp;"docentecol": "null",<br>
															&emsp;&emsp;&emsp;"extranjero": "BOOL",<br>
															&emsp;&emsp;&emsp;"estado": "BOOL",<br>
															&emsp;&emsp;&emsp;"cod_postdoc": "TINYINT",<br>
															&emsp;&emsp;&emsp;"cod_doct": "TINYINT",<br>
															&emsp;&emsp;&emsp;"cod_mg": "TINYINT",<br>
															&emsp;&emsp;&emsp;"cod_tipo_profesor": "TINYINT",<br>
															&emsp;&emsp;&emsp;"cod_jerarquia": "TINYINT",<br>
															&emsp;&emsp;&emsp;"cod_prof"	: "TINYINT"<br>
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
									<p>11.3.- Para editar una entrada de Docentes, se utiliza el método <span class="text-danger">PUT</span>
										a la dirección: <span class="text-primary">/docentes/</span></p>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p>Campos de envío</p>
										<div class="well well-sm">
											<code>
												{<br>
													&emsp;"key": "llave_de_usuario",<br>
													&emsp;"rut": "rut",<br>
													&emsp;"nombre": "nombre_docente",<br>
													&emsp;"appat": "apellido_paterno",<br>
													&emsp;"apmat": "apellido_materno",<br>
													&emsp;"email": "email@email.com",<br>
													&emsp;"fono": "fono_docente",<br>
													&emsp;"fecha": "YYYY/MM/DD",<br>
													&emsp;"postdoc": "N",<br>
													&emsp;"doct": "N",<br>
													&emsp;"mg": "N",<br>
													&emsp;"profesor": "N",<br>
													&emsp;"jerarquia": "N",<br>
													&emsp;"extranjero": "BOOL",<br>
													&emsp;"prof": "N"<br>
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
									<div class="col-xs-12">
										<p>11.4.- Para desactivar un entrada de Docentes, se utiliza el método <span class="text-danger">DELETE</span>
											a la dirección: <span class="text-primary">/docentes/</span></p>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<p>Campos de envío</p>
											<div class="well well-sm">
												<code>
													{<br>
														&emsp;"key": "llave_de_usuario",<br>
														&emsp;"rut": "rut"<br>
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
						</div> <!--Fin Magister-->