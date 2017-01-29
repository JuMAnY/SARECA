<?php
	require('conexion/conexion.php');

	$sql = "SELECT * FROM equipo_audiovisual WHERE Estado = 1";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</H1>";
		$conectar->close();
		exit();
	}
	
	if ($res->num_rows == 0) {
?>
		<div class="row">
			<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-ok-circle"></span> Equipos activos</h3>
				<div class="alert alert-dismissible alert-info">
					<strong>No existen equipos ACTIVOS.</strong>
				</div>
			</div>
		</div>
<?php
	} else {
?>
		<div class="row">
			<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-ok-circle"></span> Equipos activos</h3>
				<table id="" class="table table-striped table-hover consulta">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Tipo</th>
							<th>Número</th>
							<th>RBN</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Inf. Adicional</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
					<?php
					while ($fila = $res->fetch_object()) {
						$tipo = ($fila->tipo == 1) ? 'VideoBeam' : 'Retroproyector';
						printf('
							<tr>
								<td>%s</td>
								<td>%s</td>
								<td>%d</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td><a href="../php/estado_audiovisual.php?s=%s&e=%d" class="btn btn-primary">Inactivar</a></td>
							</tr>',
							$fila->Serial,
							$tipo,
							$fila->numero,
							$fila->rbn,
							$fila->marca,
							$fila->modelo,
							$fila->inf_adic,
							$fila->Serial,
							$fila->Estado
						);
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
<?php
	}

	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


	$sql = "SELECT * FROM equipo_audiovisual WHERE Estado = 3";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</H1>";
		$conectar->close();
		exit();
	}
	
	if ($res->num_rows == 0) {
?>
		<div class="row">
			<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-remove-circle"></span> Equipos inactivos</h3>
				<div class="alert alert-dismissible alert-info">
					<strong>No existen equipos INACTIVOS.</strong>
				</div>
			</div>
		</div>
<?php
	} else {
?>
		<div class="row">
			<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-remove-circle"></span> Equipos inactivos</h3>
				<table class="table table-striped table-hover consulta">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Tipo</th>
							<th>Número</th>
							<th>RBN</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Inf. Adicional</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
					<?php
					while ($fila = $res->fetch_object()) {
						$tipo = ($fila->tipo == 1) ? 'VideoBeam' : 'Retroproyector';
						printf('
							<tr>
								<td>%s</td>
								<td>%s</td>
								<td>%d</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td><a href="../php/estado_audiovisual.php?s=%s&e=%d" class="btn btn-primary">Activar</a></td>
							</tr>',
							$fila->Serial,
							$tipo,
							$fila->numero,
							$fila->rbn,
							$fila->marca,
							$fila->modelo,
							$fila->inf_adic,
							$fila->Serial,
							$fila->Estado
						);
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
<?php
	}

	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


	$sql = "SELECT * FROM equipo_audiovisual WHERE Estado = 2";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</H1>";
		$conectar->close();
		exit();
	}
	
	if ($res->num_rows == 0) {
?>
		<div class="row">
			<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-warning-sign"></span> Equipos prestados</h3>
				<div class="alert alert-dismissible alert-info">
					<strong>No existen equipos PRESTADOS.</strong>
				</div>
			</div>
		</div>
<?php
	} else {
?>
		<div class="row">
			<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-warning-sign"></span> Equipos prestados</h3>
				<table class="table table-striped table-hover consulta">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Tipo</th>
							<th>Número</th>
							<th>RBN</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Inf. Adicional</th>
						</tr>
					</thead>
					<tbody>
					<?php
					while ($fila = $res->fetch_object()) {
						$tipo = ($fila->tipo == 1) ? 'VideoBeam' : 'Retroproyector';
						printf('
							<tr>
								<td>%s</td>
								<td>%s</td>
								<td>%d</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
							</tr>',
							$fila->Serial,
							$tipo,
							$fila->numero,
							$fila->rbn,
							$fila->marca,
							$fila->modelo,
							$fila->inf_adic
						);
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
<?php
	}
	$conectar->close();
?>


<!-- INICIO DEL MODAL -->
<div class="modal fade" id="confirm-action" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Confirmar Acción</h4>
			</div>

			<div class="modal-body">
				<div class="alert alert-dismissible alert-warning">
					<h4>¡Advertencia!</h4>
					<p class="debug-url"></p>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-danger btn-ok">Aceptar</a>
			</div>
		</div>
	</div>
</div>
<!-- FIN DEL MODAL -->