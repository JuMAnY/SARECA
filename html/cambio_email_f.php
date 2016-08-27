<?php require('../php/sesion/valida_sesion.php');?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>SARECA</title>
		<meta name="description" content="SARECA">
		<meta name="keywords" content="inventario, equipos, sareca">
		<meta name="author" content="JuMAnY">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/general.css">
	</head>
	<body>
		<div id="wrap">
			<?php
				include("menu/menu.php");
			?>
			<!-- INICIO DEL CONTENEDOR DE LA PAGINA -->
			<div class="container">
				<div class="bs-docs-section">
					<?php
						include('mensaje/mensaje.php');
					?>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3">
							<div class="page-header">
								<h1><span class="glyphicon glyphicon-envelope"></span> Cambio de Correo</h1>
							</div>
							<div class="well bs-component">
								<form class="form-horizontal" method='post' action='../php/cambio_email.php'>
									<fieldset>
										<legend><span class="glyphicon glyphicon-pencil"> Registro</legend>
										<div class="form-group">
											<label for="correo" class="col-lg-2 control-label">Nuevo</label>
											<div class="col-lg-10">
												<input name="correo" class="form-control" id="correo" placeholder="Correo" type="email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Debe cumplir el formato: ejemplo@ejemplo.com" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-lg-10 col-lg-offset-2">
												<button type="reset" class="btn btn-default">Cancelar</button>
												<button type="submit" class="btn btn-primary" id="cambiar">Enviar</button>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- FIN DEL CONTENEDOR DE LA PAGINA -->
			<!-- DIV para manejar el footer de manera dinamica -->
			<div id="push"></div>
		</div>
		<!-- INICIO DEL PIE DE PAGINA -->
		<div id="footer">
			<div class="container">
				<p class="muted credit">
					Todos los derechos reservados &copy 2015 <br>
					SARECA | <b>JuMAnY</b>
				</p>
			</div>
		</div>
		<!-- FIN DEL PIE DE PAGINA -->

		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/config.js"></script>
	</body>
</html>