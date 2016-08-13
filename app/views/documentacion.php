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

						<?php echo $logindoc; ?>

						<?php echo $lineasdoc; ?>

						<?php echo $tipouserdoc; ?>
						
						<?php echo $profesiondoc; ?>

						<?php echo $magisterdoc; ?>

						<?php echo $doctoradodoc; ?>

						<?php echo $postdoctoradodoc; ?>

						<?php echo $respdoc; ?>

						<?php echo $laboratoriodoc; ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
	
</body>
</html>
