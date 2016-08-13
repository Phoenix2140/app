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