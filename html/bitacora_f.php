<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');

	$sql = "SELECT Id, Nombre FROM usuario";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</h1>";
		$conectar->close();
		exit();
	}
?>
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
		<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
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
						<div class="col-lg-8 col-lg-offset-2">
							<div class="page-header">
								<h1><span class="glyphicon glyphicon-cog"></span> Sistema</h1>
							</div>
							<div class="well bs-component">
								<form class="form-horizontal" method="post" action="../php/equipo_danado.php">
									<fieldset>
										<legend><span class="glyphicon glyphicon-book"> Bitácora</legend>
										<div class="form-group">
											<label for="mes" class="col-lg-2 control-label">Mes</label>
											<div class="col-lg-10">
												<select class="form-control" id="mes" name="mes" title="Elija el mes a consultar" required>
													<?php
														$meses = array(
															"",
															"Enero",
															"Febrero",
															"Marzo",
															"Abril",
															"Mayo",
															"Junio",
															"Julio",
															"Agosto",
															"Septiembre",
															"Octubre",
															"Noviembre",
															"Diciembre"
														);

														for($i=0;$i<=12;$i++)
															echo '<option value='.$i.'>'.$meses[$i].'</option>';
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="ano" class="col-lg-2 control-label">Año</label>
											<div class="col-lg-10">
												<select class="form-control" id="ano" name="ano" title="Elija el año a consultar" required>
													<option></option>
													<?php 
														for($i=date('Y'); $i>=2000; $i--)
															echo '<option value='.$i.'>'.$i.'</option>';
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="u" class="col-lg-2 control-label">Usuario</label>
											<div class="col-lg-10">
												<select class="form-control" id="u" name="u" title="Elija el usuario a consultar" required>
													<option value="todos">Todos los usuarios</option>
													<?php
														while ($fila = $res->fetch_object())
															echo '<option value="'.$fila->Id.'">'.$fila->Nombre.'</option>';
														$res->free();
													?>
												</select>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<div id="carga"></div>
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
					Todos los derechos reservados &copy; 2015 <br>
					SARECA | <b>JuMAnY</b>
				</p>
			</div>
		</div>
		<!-- FIN DEL PIE DE PAGINA -->

		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/jquery.dataTables.min.js"></script>
		<script src="../js/dataTables.bootstrap.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/config.js"></script>
		<script src="../js/validadores/funciones.js"></script>
		<script src="../js/validadores/valida_bitacora.js"></script>
	</body>
</html>