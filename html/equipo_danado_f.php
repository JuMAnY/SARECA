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
								<h1><span class="glyphicon glyphicon-wrench"></span> Equipos Dañados</h1>
							</div>
							<div class="well bs-component">
								<form class="form-horizontal" method="post" action="../php/equipo_danado.php">
									<fieldset>
										<legend><span class="glyphicon glyphicon-pencil"> Registro</legend>
										<div class="form-group">
											<label for="select" class="col-lg-2 control-label">Núcleo</label>
											<div class="col-lg-10">
												<select class="form-control" id="select" name="Nucleo" title="Debe elegir el núcleo de procedencia" required>
													<option></option>
													<option value="Ejido">Ejido</option>
													<option value="Bailadores">Bailadores</option>
													<option value="Santa Lucia">Santa Lucia</option>
													<option value="Tucani">Tucani</option>
													<option value="Manejo de Emergencias">Manejo de Emergencias</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="serial" class="col-lg-2 control-label">Serial</label>
											<div class="col-lg-10">
												<input name="serial" class="form-control" id="serial" placeholder="Serial" type="text" title="Debe ingresar el serial del equipo" pattern="[a-zA-Z0-9]*" required>
											</div>
										</div>
										<div class="form-group">
											<label for="departamento" class="col-lg-2 control-label">Área</label>
											<div class="col-lg-10">
												<input name="departamento" class="form-control" id="departamento" placeholder="Departamento" type="text" title="Debe ingresar el departamento al que pertenece el equipo" pattern="[a-zA-Z0-9 ]*" required>
											</div>
										</div>
										<div class="form-group">
											<label for="falla" class="col-lg-2 control-label">Falla</label>
											<div class="col-lg-10">
												<textarea name="descripcion" class="form-control" rows="3" id="falla" title="Debe ingresar la descripcion de la falla del equipo" required></textarea>
												<span class="help-block">Describa la falla que presenta el equipo.</span>
											</div>
										</div>
										<div class="form-group">
											<label for="observacion" class="col-lg-2 control-label">Observación</label>
											<div class="col-lg-10">
												<textarea name="Observacion" class="form-control" rows="3" id="observacion" title="Debe ingresar los detalles del equipo" required></textarea>
												<span class="help-block">Realice observaciones sobre el equipo como: tipo, componentes, etc.</span>
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
		<script src="../js/validadores/valida_equip_d.js"></script>
	</body>
</html>