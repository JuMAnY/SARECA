<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');
	
	$sql = "SELECT *
			FROM equipo_audiovisual
			JOIN prestamo ON equipo_audiovisual.Serial = prestamo.Serial_equipo
			JOIN persona ON prestamo.Carnet = persona.Carnet
			WHERE equipo_audiovisual.Estado = 2
			AND prestamo.Estado = 2";
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
								<h1><span class="glyphicon glyphicon-facetime-video"></span> Equipos Prestados</h1>
							</div>
							<?php
							if ($res->num_rows == 0) {
							?>
								<div class="alert alert-dismissible alert-info">
									<strong>No hay equipos AudioVisuales en préstamo.</strong>
								</div>
							<?php
							} else {
							?>
								<h3><span class="glyphicon glyphicon-search"></span> Equipos Prestados</h3>
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Carnet</th>
											<th>Nombre</th>
											<th>Serial</th>
											<th>Tipo</th>
											<th>Fecha Prestamo</th>
											<th>Elegir</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($fila = $res->fetch_object()) {
											if ($fila->tipo == 1) $tipo = 'VideoBeam';
											else $tipo = 'Retroproyector';
											list($a,$m,$d) = explode('-',$fila->Fecha_prestamo);
											printf('
												<tr>
													<td>%d</td>
													<td>%s</td>
													<td>%s</td>
													<td>%s</td>
													<td>%d-%d-%d</td>
													<td data-toggle="tooltip" data-placement="right" title="" data-original-title="Devolver"><a href="#" data-href="../php/devolucion.php?s=%s" data-toggle="modal" data-target="#confirm-action" data-msj="¿Desea devolver el prestamo de: %s?" class="btn btn-primary"><span class="glyphicon glyphicon-share-alt"></span></a></td>
												</tr>',
												$fila->Carnet,
												$fila->Nombre,
												$fila->Serial_equipo,
												$tipo,
												$d,
												$m,
												$a,
												$fila->Serial_equipo,
												$fila->Nombre
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
		<script src="../js/validadores/valida_devolucion.js"></script>
	</body>
</html>