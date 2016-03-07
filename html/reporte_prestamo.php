<?php require('../php/sesion/valida_sesion.php'); ?>
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
		<link rel="stylesheet" href="../css/reporte.css">
	</head>
	<body>
		<div id="wrap">
			<?php
				include("menu/menu.php");
			?>
			<!-- INICIO DEL CONTENEDOR DE LA PAGINA -->
			<div class="container">
				<div class="bs-docs-section">
					<div class="row">
						<div class="col-lg-12">
							<div class="boton">
								<button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Click para imprimir" id="imprimir"><span class="glyphicon glyphicon-print"></span></button>
							</div>
							<div class="marco" id="marco">
								<div class="membrete">
									<div class="logo prestamo"></div>
									<div class="numero">
										<p>N°:</p>
									</div>
								</div>
								<div class="p"><p class="parrafo">Periodo: <?=$_POST['mes']?></p></div>
								<?php
								require('../php/conexion/conexion.php');
								$mes = $_POST['mes'];
								$periodo_ini = $_POST['mes'].'-01';
								$periodo_fin = $_POST['mes'].'-'.date('t',strtotime($_POST['mes']));
								$sql = "SELECT serial_equipo, tipo
										FROM prestamo
											JOIN equipo_audiovisual ON prestamo.serial_equipo = equipo_audiovisual.Serial
										WHERE Fecha_prestamo BETWEEN '$periodo_ini' AND '$periodo_fin'
										GROUP BY serial_equipo";
								$res = $conectar->query($sql);
								if ($res->num_rows == 0) {
								?>
									<div class="col-lg-12">
										<div class="alert alert-dismissible alert-info">
											<strong>No resultaron equipos PRESTADOS para el periodo consultado.</strong>
										</div>
									</div>
								<?php
								}else{
									while ($fila = $res->fetch_object()) {
										if ($fila->tipo == 1) $equipo = 'Video Beam';
										else $equipo = 'Retroproyector';
										$sql = "SELECT Fecha_prestamo, Cedula, Nombre, Departamento
												FROM prestamo
													JOIN persona ON prestamo.Carnet = persona.Carnet
												WHERE Serial_equipo = '$fila->serial_equipo'
												AND Fecha_prestamo BETWEEN '$periodo_ini' AND '$periodo_fin'";
										$res2 = $conectar->query($sql);
								?>
										<div class="descripcion">
											<p class="parrafo">Equipo: <?=$equipo?></p>
											<p class="parrafo">Serial: <?=$fila->serial_equipo?></p>
										</div>
										<table class="tbreporte">
											<thead>
												<tr>
													<th colspan="3" class="threporte b1">INFORMACIÓN DEL USUARIO</th>
													<th colspan="2" class="threporte">INFORMACIÓN DEL PRÉSTAMO</th>
													<th class="threporte b1">INFORMACIÓN DEVOLUCIÓN</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="tdreporte tdsize">Nombre y Apellido</td>
													<td class="tdreporte">Cedula</td>
													<td class="tdreporte">Carrera</td>
													<td class="tdreporte">Fecha</td>
													<td class="tdreporte">Lugar de Uso</td>
													<td class="tdreporte">Fecha</td>
												</tr>
												<?php
												while ($fila2 = $res2->fetch_object()) {
													list($a,$m,$d) = explode('-',$fila2->Fecha_prestamo);
												?>
												<tr>
													<td class="tdreporte"><?=$fila2->Nombre?></td>
													<td class="tdreporte"><?=$fila2->Cedula?></td>
													<td class="tdreporte"><?=$fila2->Departamento?></td>
													<td class="tdreporte"><?=$d.'-'.$m.'-'.$a?></td>
													<td class="tdreporte">&nbsp;</td>
													<td class="tdreporte"><?=$d.'-'.$m.'-'.$a?></td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
										<br>
								<?php
									}
								}
								$conectar->close();
								?>
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
		<script src="../js/validadores/valida_reprt_prestamo.js"></script>
	</body>
</html>