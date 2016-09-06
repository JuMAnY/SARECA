<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');
	
	$sql = "SELECT reparacion.*, usuario.Nombre
			FROM reparacion
			JOIN usuario ON usuario.Id = reparacion.responsable
			WHERE Estado = 1";
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
						<div class="col-lg-12">
							<div class="page-header">
								<h1><span class="glyphicon glyphicon-wrench"></span> Equipos Dañados</h1>
							</div>
							<?php
							if ($res->num_rows == 0) {
							?>
								<h3><span class="glyphicon glyphicon-search"></span> Equipos en Reparación</h3>
								<div class="alert alert-dismissible alert-info">
									<strong>No hay equipos en reparación.</strong>
								</div>
							<?php	
							} else {
							?>
								<h3><span class="glyphicon glyphicon-search"></span> Equipos en Reparación</h3>
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Serial</th>
											<th>Nucleo</th>
											<th>Departamento</th>
											<th>Falla</th>
											<th>Observacion</th>
											<th>Fecha Entrada</th>
											<th>Responsable</th>
											<th>Elegir</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($fila = $res->fetch_object()) {
											list($a,$m,$d) = explode('-',$fila->Fecha_entrada);
											printf('
												<tr>
													<td>%s</td>
													<td>%s</td>
													<td>%s</td>
													<td>%s</td>
													<td>%s</td>
													<td>%d-%d-%d</td>
													<td>%s</td>
													<td><a href="consulta_reparacion_f.php?s=%s" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Reparar"><span class="glyphicon glyphicon-wrench"></span> </a></td>
												</tr>',
												$fila->Serial_equipo,
												$fila->Nucleo,
												$fila->Departamento,
												$fila->falla,
												$fila->observacion,
												$d,
												$m,
												$a,
												$fila->Nombre,
												$fila->Serial_equipo
											);
										}
										?>
									</tbody>
								</table>
							<?php
							}
							?>
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
					Todos los derechos reservados &copy; 2015 <br>
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