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
								<h1><span class="glyphicon glyphicon-facetime-video"></span> Usuarios de Prestamos</h1>
							</div>
							<div class="well bs-component">
								<form class="form-horizontal" method="post" action="../php/usuario_prestamo.php">
									<fieldset>
										<legend><span class="glyphicon glyphicon-pencil"> Registro</legend>
										<div class="form-group">
											<label for="carnet" class="col-lg-2 control-label">Carnet</label>
											<div class="col-lg-10">
												<input name="carnet" class="form-control" id="carnet" placeholder="Carnet" type="number" title="Debe ingresar el número de carnet" required>
											</div>
										</div>
										<div class="form-group">
											<label for="cedula" class="col-lg-2 control-label">Cédula</label>
											<div class="col-lg-10">
												<input name="cedula"class="form-control" id="cedula" placeholder="Cédula" type="number" title="Debe ingresar el número de cédula" required>
											</div>
										</div>
										<div class="form-group">
											<label for="nombre" class="col-lg-2 control-label">Nombre</label>
											<div class="col-lg-10">
												<input name="nombre" class="form-control" id="nombre" placeholder="Nombre y Apellido" type="text" title="Debe ingresar el nombre completo" pattern="[a-zA-Z ]*" required>
											</div>
										</div>
										<div class="form-group">
											<label for="departamento" class="col-lg-2 control-label">Área</label>
											<div class="col-lg-10">
												<input name="departamento" class="form-control" id="departamento" placeholder="Departamento" type="text" title="Debe ingresar el departamento al que pertenece" pattern="[a-zA-Z0-9 ]*" required>
											</div>
										</div>
										<div class="form-group">
											<label for="cargo" class="col-lg-2 control-label">Cargo</label>
											<div class="col-lg-10">
												<input name="cargo" class="form-control" id="cargo" placeholder="Cargo" type="text" title="Debe ingresar el cargo que ocupa" pattern="[a-zA-Z ]*" required>
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
	</body>
</html>