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
						<div class="col-lg-12">
							<div class="page-header">
								<h1><span class="glyphicon glyphicon-facetime-video"></span> Equipos Audiovisuales</h1>
							</div>
						</div>
					</div>
					<?php include '../php/lista_eq_audio.php'; ?>
				</div>
				<!-- INICIO DEL MODAL -->
				<div id="form-action" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Inactivar equipo.</h4>
							</div>
							<div class="form-box wow fadeInUp animated">
								<form id="modal-form" role="form" action="../php/estado_audiovisual.php" method="post">
									<div class="modal-body">
										<p>Ingrese la dscripción</p>
										<div class="form-group">
											<label class="sr-only" for="motivo">Motivo</label>
											<input name="motivo" id="motivo" type="text" placeholder="Motivo de inactividad..." class="form-control" title="Ingrese el motivo por el cual inactiva el equipo" required="required" />
											<input name="serial" id="serial" type="hidden" value="" />
											<input name="estado" id="estado" type="hidden" value="" />
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-primary btn-ok">Enviar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- FIN DEL MODAL -->
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
		<script src="../js/validadores/valida_conslt_eq_da.js"></script>
	</body>
</html>