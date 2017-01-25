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
									<div class="logo reparacion"></div>
									<div class="numero">
										<p>N°:</p>
									</div>
								</div>
								<div class="p"><p class="parrafo">Periodo: <?=$_POST['mes']?></p></div>
								<br>
								<?php
								require('../php/conexion/conexion.php');
								$mes = $_POST['mes'];
								$periodo_ini = $_POST['mes'].'-01';
								$periodo_fin = $_POST['mes'].'-'.date('t',strtotime($_POST['mes']));
								$sql = "SELECT Serial_equipo, Nucleo, Departamento, falla, Estado, Fecha_entrada
										FROM reparacion
										WHERE Fecha_entrada BETWEEN '$periodo_ini' AND '$periodo_fin'";
								$res = $conectar->query($sql);
								if ($res->num_rows == 0) {
								?>
									<div class="col-lg-12">
										<div class="alert alert-dismissible alert-info">
											<strong>No ingresaron equipos para reparación en el periodo consultado.</strong>
										</div>
									</div>
								<?php
								}else{
								?>
								<table class="tbreporte">
									<thead>
										<tr>
											<th colspan="6" class="threporte b1">INFORMACIÓN REPARACIÓN</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="tdreporte">Serial Equipo</td>
											<td class="tdreporte">Núcleo</td>
											<td class="tdreporte">Departamento</td>
											<td class="tdreporte">Falla</td>
											<td class="tdreporte">Estado</td>
											<td class="tdreporte">Fecha</td>
										</tr>
										<?php
										while ($fila = $res->fetch_object()) {
											if ($fila->Estado == 1) $estado = 'No Reparado';
											else $estado = 'Reparado';
											list($a,$m,$d) = explode('-',$fila->Fecha_entrada);
										?>
										<tr>
											<td class="tdreporte"><?=$fila->Serial_equipo?></td>
											<td class="tdreporte"><?=$fila->Nucleo?></td>
											<td class="tdreporte"><?=$fila->Departamento?></td>
											<td class="tdreporte"><?=$fila->falla?></td>
											<td class="tdreporte"><?=$estado?></td>
											<td class="tdreporte"><?=$d.'-'.$m.'-'.$a?></td>
										</tr>
										<?php
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
		<script src="../js/validadores/valida_reprt_reparacion.js"></script>
	</body>
</html>