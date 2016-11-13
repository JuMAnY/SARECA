<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');

	$serial = $_GET['s'];
	
	$sql = "SELECT reparacion.*, usuario.Nombre
			FROM reparacion
			JOIN usuario ON usuario.Id = reparacion.responsable
			WHERE Serial_equipo = '$serial'
			AND Estado = 1";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</h1>";
		$conectar->close();
		exit();
	}

	$fila = $res->fetch_object();
	list($a,$m,$d) = explode('-',$fila->Fecha_entrada);
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
					<br>
					<div class="row">
						<div class="page-header col-lg-12">
							<h1><span class="glyphicon glyphicon-facetime-video"></span> Prestamo</h1>
						</div>
						<div class="col-lg-6">
							<div class="well bs-component">
								<form class="form-horizontal">
									<fieldset>
										<legend><span class="glyphicon glyphicon-sunglasses"></span> Datos del Prestamo</legend>
										<div class="form-group">
											<label for="nombre" class="col-lg-2 control-label">Nombre</label>
											<div class="col-lg-10">
												<input class="form-control" id="nombre" type="text" value="<?=$fila->Nucleo?>" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="cedula" class="col-lg-2 control-label">Cédula</label>
											<div class="col-lg-10">
												<input class="form-control" id="cedula" type="text" value="<?=$fila->Serial_equipo?>" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="carrera" class="col-lg-2 control-label">Carrera</label>
											<div class="col-lg-10">
												<input class="form-control" id="carrera" type="text" value="<?=$fila->Departamento?>" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="fecha" class="col-lg-2 control-label">Fecha Hora</label>
											<div class="col-lg-10">
												<input class="form-control" id="fecha" type="text" value="<?=$d.'-'.$m.'-'.$a?>" title="Fecha en la que ingreso al taller el equipo" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="destino" class="col-lg-2 control-label">Destino</label>
											<div class="col-lg-10">
												<input class="form-control" id="destino" type="text" value="<?=$fila->Nombre?>" title="Persona que registró el equipo ó el encargado de repararlo" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="operador" class="col-lg-2 control-label">Operador</label>
											<div class="col-lg-10">
												<input class="form-control" id="operador" type="text" value="<?=$fila->Nombre?>" title="Persona que registró el equipo ó el encargado de repararlo" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="tipo" class="col-lg-2 control-label">Tipo</label>
											<div class="col-lg-10">
												<input class="form-control" id="tipo" type="text" value="<?=$fila->Nombre?>" title="Persona que registró el equipo ó el encargado de repararlo" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="serial" class="col-lg-2 control-label">Serial</label>
											<div class="col-lg-10">
												<input class="form-control" id="serial" type="text" value="<?=$fila->Nombre?>" title="Persona que registró el equipo ó el encargado de repararlo" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="numero" class="col-lg-2 control-label">Número</label>
											<div class="col-lg-10">
												<input class="form-control" id="numero" type="text" value="<?=$fila->Nombre?>" title="Persona que registró el equipo ó el encargado de repararlo" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="marca" class="col-lg-2 control-label">Marca</label>
											<div class="col-lg-10">
												<input class="form-control" id="marca" type="text" value="<?=$fila->Nombre?>" title="Persona que registró el equipo ó el encargado de repararlo" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="modelo" class="col-lg-2 control-label">Modelo</label>
											<div class="col-lg-10">
												<input class="form-control" id="modelo" type="text" value="<?=$fila->Nombre?>" title="Persona que registró el equipo ó el encargado de repararlo" disabled="">
											</div>
										</div>
										<div class="form-group">
											<label for="observacion" class="col-lg-2 control-label">Observación</label>
											<div class="col-lg-10">
												<textarea class="form-control" rows="3" id="observacion" disabled=""><?=$fila->observacion?></textarea>
												<span class="help-block">Observaciones sobre el equipo como: tipo, componentes, etc.</span>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="well bs-component">
								<form class="form-horizontal" method="post" action="../php/devolucion.php">
									<fieldset>
										<legend><span class="glyphicon glyphicon-pencil"></span> Datos de la Devolución</legend>
										<div class="form-group">
											<label for="observacion" class="col-lg-2 control-label">Observación</label>
											<div class="col-lg-10">
												<textarea name="observacion" class="form-control" rows="3" id="observacion" title="En caso que desee hacer alguna acotación, use este campo"></textarea>
												<span class="help-block">En caso que desee hacer alguna acotación, use este campo.</span>
											</div>
										</div>
										<div class="form-group">
											<div class="col-lg-10 col-lg-offset-2">
												<input name="serial" value="<?=$fila->Serial_equipo?>" type="hidden">
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
		<script src="../js/validadores/valida_fin_repr.js"></script>
	</body>
</html>