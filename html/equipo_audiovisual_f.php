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
								<h1><span class="glyphicon glyphicon-facetime-video"></span> Equipo Audiovisual</h1>
							</div>
							<div class="well bs-component">
								<form class="form-horizontal" method="post" action="../php/equipo_audiovisual.php">
									<fieldset>
										<legend><span class="glyphicon glyphicon-pencil"> Registro</legend>
										<div class="form-group">
											<label for="tipo" class="col-lg-2 control-label">Tipo Equipo</label>
											<div class="col-lg-10">
												<select name="tipo" class="form-control" id="tipo" title="Debe elegir el tipo de equipo" required>
													<option></option>
													<option value="1">Video Beam</option>
													<option value="2">Retroproyector</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="Serial" class="col-lg-2 control-label">Serial</label>
											<div class="col-lg-10">
												<input name="Serial" class="form-control" id="Serial" placeholder="Codigo del equipo" type="text" title="Debe ingresar el serial del equipo" pattern="[a-zA-Z0-9]*" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-lg-10 col-lg-offset-2">
												<button type="reset" class="btn btn-default">Cancelar</button>
												<button type="submit" class="btn btn-primary">Enviar</button>
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
		<script src="../js/validadores/funciones.js"></script>
		<script src="../js/validadores/valida_equ_audio.js"></script>
	</body>
</html>