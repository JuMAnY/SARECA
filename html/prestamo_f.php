<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');

	$sql = "SELECT Serial, tipo, marca FROM equipo_audiovisual WHERE Estado = 1";
	$res_equi = $conectar->query($sql);
	
	if(!$res_equi){
		echo '<h1>ERROR: </h1>'.$conectar->error;
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
						<div class="col-lg-6 col-lg-offset-3">
							<div class="page-header">
								<h1><span class="glyphicon glyphicon-facetime-video"></span> Prestamo de Equipo</h1>
							</div>
							<div class="well bs-component">
								<?php
								if ($res_equi->num_rows == 0) {
								?>
									<div class="alert alert-dismissible alert-danger">
										<strong>No hay</strong> equipos disponibles. <a href="devolucion_f.php" class="alert-link">Ver lista de prestamos.</a>
									</div>
								<?php
								} else {
								?>
									<form class="form-horizontal" method='post' action='../php/prestamo.php'>
										<fieldset>
											<legend><span class="glyphicon glyphicon-pencil"> Registro</legend>
											<div class="form-group">
												<label for="cedula" class="col-lg-2 control-label">Cédula</label>
												<div class="col-lg-10">
													<input name="cedula" class="form-control" id="cedula" placeholder="Cédula" type="text" title="Ingrese la cédula" required>
													<ul class="lista_prestador datalist"></ul>
												</div>
											</div>
											<div class="form-group">
												<label for="carrera" class="col-lg-2 control-label">Carrera</label>
												<div class="col-lg-10">
													<input name="carrera" class="form-control" id="carrera" placeholder="Carrera" type="text" title="Debe ingresar la carrera" pattern="[a-zA-Z .]*" required>
												</div>
											</div>
											<div class="form-group">
												<label for="Serial_equipo" class="col-lg-2 control-label">Serial</label>
												<div class="col-lg-10">
													<select name="Serial_equipo" class="form-control" id="Serial_equipo" title="Debe elegir el serial del equipo a prestar" required>
														<option></option>
														<?php
														while ($fila_equi = $res_equi->fetch_object()) {
															$tipo = ($fila_equi->tipo == 1) ? 'Video Beam' : 'Retroproyector';
															echo '<option value="'.$fila_equi->Serial.'">'.$fila_equi->Serial.' - '.$tipo.' '.$fila_equi->marca.'</option>';
														}
														$res_equi->free();
														$conectar->close();
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="hora_estimada_devolucion" class="col-lg-2 control-label">Hora Estimada</label>
												<div class="col-lg-10">
													<input name="hora_estimada_devolucion" class="form-control" id="hora_estimada_devolucion" placeholder="Hora estimada de devolución" type="time" title="Indique la hora estimada de devolución" required>
												</div>
											</div>
											<div class="form-group">
												<label for="destino" class="col-lg-2 control-label">Destino</label>
												<div class="col-lg-10">
													<input name="destino" class="form-control" id="destino" placeholder="Lugar donde se usara el equipo" type="text" title="Indique el lugar donde será usado el equipo" required>
												</div>
											</div>
											<div class="form-group">
												<label for="observacion" class="col-lg-2 control-label">Observación</label>
												<div class="col-lg-10">
													<textarea name="observacion" class="form-control" rows="3" id="observacion" title="En caso que desee hacer alguna acotación, use este campo"></textarea>
													<span class="help-block">En caso que desee hacer alguna acotación, use este campo.</span>
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
								<?php }?>
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
		<script src="../js/jquery-ui.min.js"></script>
		<script src="../js/config.js"></script>
		<script src="../js/validadores/funciones.js"></script>
		<script src="../js/validadores/valida_prestamo.js"></script>
	</body>
</html>